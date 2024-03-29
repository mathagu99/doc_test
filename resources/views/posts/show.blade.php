@extends('layout.app')

@section('content')
<a href="/test/public/readPosts" class ="btn btn-default">Go Back</a>
<h1>{{$post->title}}</h1>
<div>
    {{$post->body}}
</div>
<hr>
<small>Written on {{$post->created_at}}</small>
<hr>
<a href="/readPosts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endsection
 