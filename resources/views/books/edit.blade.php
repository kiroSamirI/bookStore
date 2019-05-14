@extends('layouts.app')


@section('content')

    <h1> Edit Book </h1>
    {!! Form::open(array('url' => ["/books", $book->id],'method' => 'POST' )) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $book -> title , ['class' => 'form-control', 'placeholder' => 'Title'])}}
        <div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $book -> description , ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Book Description'])}}
        </div>
        <div class="form-group">
                {{Form::label('price', 'Price')}}
                {{Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Book Price'])}}
            <div>           
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
