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
                        <label for="field_imgPath" class="form-label">Immagine</label>
                        <input type="text" class="form-control @error('imgPath') is-invalid @enderror" name="imgPath"
                        value="{{ old("imgPath") }}" name="imgPath" id="field_imgPath" >
                    </div>
                    
                    <div class="mb-3">
                        <label for="field_text" class="form-label">Contenuto</label>
                        <textarea type="text" class="form-control" name="text" id="field_text"></textarea>
                    </div>
        
                    <div class="mb-3">
                        <label class="form-label">Categoria</label>
                        <select name="category" id="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tag</label>
                        <select name="tag[]" id="tag_field" class="form-control" multiple>
                            @foreach($tagsList as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>


        
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Aggiungi</button>
                    </div>
                </div>
            </form>
            <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
            <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
        </div>
@endsection