@extends('layout')

@section('title','create post')


@section('content')

<h2>create post</h2>

<form action="{{ route('posts.store') }}" method="post">
    <label for="">title</label>
    <input type="text" name="title" id="" value="{{ old('title') }}"> 
    @error('title')
        <p class="error">{{ $message }}</p>
    @enderror

    <label for="">description</label>
    <textarea name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea>
    @error('description')
        <p class="error">{{ $message }}</p>
    @enderror

    @csrf
    <button type="submit">save</button>
</form>

@endsection