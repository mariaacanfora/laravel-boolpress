@extends('admin.layout')

@section('content')
        <div class="text-start">
            <form action="{{ route('admin.posts.store') }}" method="post">
                @csrf
    
                <div class="text-start mt-5">
                    <div class="mb-3">
                        <label for="field_title" class="form-label">Titolo del post</label>
                        <input type="text" class="form-control" name="title" id="field_title">
                    </div>
        
                    <div class="mb-3">
                        <label for="field_image" class="form-label">Immagine</label>
                        <input type="url" class="form-control" name="image" id="field_image">
                    </div>
                    
                    <div class="mb-3">
                        <label for="field_text" class="form-label">Contenuto</label>
                        <input type="text" class="form-control" name="text" id="field_text">
                    </div>
        
                    
        
                    <button class="btn btn-primary" type="submit">Aggiungi</button>
                </div>
            </form>
        </div>
@endsection