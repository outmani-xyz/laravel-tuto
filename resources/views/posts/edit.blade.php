@extends('layout')

@section('title','edit post')


@section('content')

<h2>edit post</h2>

<form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post">
    <label for="">title</label>
    <input type="text" name="title" id="" value="{{ old('title', $post->title) }}"> 
    @error('title')
        <p class="error">{{ $message }}</p>
    @enderror

    <label for="">description</label>
    <textarea name="description" id="" cols="30" rows="10">{{ old('description', $post->description) }}</textarea>
    @error('description')
        <p class="error">{{ $message }}</p>
    @enderror

    @csrf
    @method('PUT')
    <button type="submit">save</button>
</form>

@endsection