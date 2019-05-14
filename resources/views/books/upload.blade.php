@extends('layouts.app')


@section('content')

    <h1> Upload Book </h1>
    {!! Form::open(array('url' => "/books",'method' => 'POST', 'enctype' => 'multipart/form-data')) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        <div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Book Description'])}}
        <div>
            <div class="form-group">
                {{Form::label('price', 'Price')}}
                {{Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Book Price'])}}
            <div>
        <div class="form-group">

            {{Form::file('book_image')}}

        </div>
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
