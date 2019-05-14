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
                    
                    <h3> Site Users </h3>
                    @if(count($users) > 0)
                     <table class="table table-stripped">
                         <tr>
                            <th> Name </th>
                            <th> Email </th>
                            <th></th>
                         </tr>

                        @foreach ($users as $user)
                            <tr>
                                <td> {{$user -> name}} </td>
                                <td> {{$user -> email}} </td>
                                <td>
                                    {!!Form::open(['action' => ['userController@destroy', $user -> id], 'method' => 'Post', 'class' => 'pull-right'])!!}
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
