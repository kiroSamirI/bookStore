@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h3> Blog Books </h3>
                    @if(count($books) > 0)
                     <table class="table table-stripped">
                         <tr>
                            <th> Title </th>
                            <th></th>
                            <th></th>
                         </tr>

                        @foreach ($books as $book)
                            <tr>
                                <td> {{$book -> title}} </td>
                                <td>
                                    {!!Form::open(['action' => ['booksController@destroy', $book -> id], 'method' => 'Post', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else 
                        <p> You Have no Books</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
