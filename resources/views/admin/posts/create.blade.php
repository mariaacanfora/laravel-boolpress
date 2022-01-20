@extends('admin.layout')

@section('content')
        <div class="text-start">
            <form action="{{ route('admin.posts.store')}}" method="post">
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
                        <textarea type="text" class="form-control" name="text" id="field_text"></textarea>
                    </div>
        
                    <div class="mb-3">
                        <label for="field_text" class="form-label">Categoria</label>
                        <select name="category" id="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
        
                    <button class="btn btn-primary" type="submit">Aggiungi</button>
                </div>
            </form>
            <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
            <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
        </div>
@endsection