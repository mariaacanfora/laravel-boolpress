@extends('admin.layout')

@section('content')
    <div class="pt-5">
        <h1>{{$post->title}}</h1>
        {{-- @if($post->imgPath)
            <img src="{{$post->imgPath}}" alt="posts image">
        @endif --}}
        <p>{{$post->text}}</p>

        <div class="mt-5">
            <a class="btn btn-success" href="{{route('admin.posts.index', $post->id)}}">Torna alla home</a>

            <a class="btn btn-primary" href="{{route('admin.posts.edit', $post->id)}}">Modifica</a>

            <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="d-inline-block">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit">Elimina post</button>
            </form>
        </div>
    </div>
@endsection