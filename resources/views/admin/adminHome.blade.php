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

                    <a href="/books/create" class="btn btn-primary" > Upload Book </a>
                    <br>
                    <br>
                    <h3> Your Blog Books </h3>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
