@extends('admin.layout')

@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
        @foreach($postList as $post)
            <div class="col">
            <div class="card m-2">
               {{--  <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{!!$post->text!!}</p>
                    <p>Categoria: {{$post->category->name}}</p>
                    <a href="{{route('admin.posts.show', $post->id)}}" class="btn-link">Visualizza post</a>
                    
                </div>
            </div>
        </div>
        
        @endforeach
    </div>    
@endsection