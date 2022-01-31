@extends('admin.layout')

@section('content')
    <div class="pt-5">
        
        <h1>{{$post->title}}</h1>
        <div>
            @foreach($post->tags as $tag)
                <h5 class="d-inline-block text-light">
                    <span class="badge bg-primary">{{$tag->name}}</span>
                </h5>
            @endforeach
        </div>
        @if($post->imgPath)
            <img src="{{asset('storage/' . $post->imgPath)}}" class="w-25" alt="posts image">
        @endif
        <p>{!!$post->text!!}</p>

        <span>Categoria: {{$post->category->name}}</span>

        <div class="mt-5">
            <a class="btn btn-success" href="{{route('admin.posts.index', $post->slug)}}">Torna alla home</a>

            <a class="btn btn-primary" href="{{route('admin.posts.edit', $post->slug)}}">Modifica</a>

            <form action="{{route('admin.posts.destroy', $post->slug)}}" method="POST" class="d-inline-block">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit">Elimina post</button>
            </form>
        </div>
    </div>
@endsection