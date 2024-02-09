@extends('layout')

@section('title','my home')


@section('content')

@forelse($posts as $post)
<div class="post-item">
    <h2 class="title">
        <a href="{{ route('posts.show',['post'=>$post->id]) }}">{{ $post->title }}</a>
    </h2>
    <p>{{ $post->description }}</p>
    <a  class="btn" href="{{ route('posts.edit', ['post' => $post->id]) }}">edit</a>
    <form action="{{ route('posts.destroy', [$post]) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn" >Delete</button>
    </form>
</div>
@empty
<div class="post-item">
    <h2>No posts to show.</h2>
</div>
@endforelse

@endsection