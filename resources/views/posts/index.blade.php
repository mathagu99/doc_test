@extends('layout.app')

@section('content')
<h2>posts</h2>
@if(count($posts) > 0)
  @foreach ($posts as $post)
    <div class="well">
      <h3><a href="/test/public/showPosts/{{$post->id}}">{{$post->title}}</a></h3>
      <small>Written on {{$post->created_at}}</small>
    </div>
  @endforeach
    {{$posts->links()}}
@else
  <p>No posts found</p>
@endif
@endsection