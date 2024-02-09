@extends('layout')

@section('title','my home')


@section('content')

@foreach($posts as $post)
<div class="post-item">
    <h2 class="title">{{ $post->title }}</h2>
    <p>{{ $post->description }}</p>
</div>
@endforeach

@endsection