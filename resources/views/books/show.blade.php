@extends('layouts.app')


@section('content')
    <a href="/books" class="btn btn-primary"> Go Back</a>
    <br>
    <br>
    <h1> {{$book -> title}} </h1>


    <div> <img src="/storage/book_images/{{$book->book_image}}" height="400" width="300"/> </div>
    
    
    <div> 
        <h4> Discription : {!!$book -> description!!} </h4>
   </div>
   <hr>
   <small> uploaded at {{$book -> created_at}}  </small>
   <hr>

   @if(!Auth::guest())
     @if(Auth::user() -> id == $book -> user_id)
          <a href="/books/{{$book -> id}}/edit" class="btn btn-primary"> Edit </a>
          
          <br>
          <br>

          {!!Form::open(['action' => ['booksController@destroy', $book -> id], 'method' => 'Post', 'class' => 'pull-right'])!!}
               {{Form::hidden('_method', 'DELETE')}}
               {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
          {!!Form::close()!!}
     @endif
   @endif
@endsection
