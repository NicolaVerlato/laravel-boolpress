@extends('layouts.dashboard')

@section('content')

    <h1 class="pb-2">Modifica post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', ['post' => $posts->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $posts->title) }}">
        </div>
        <div class="form-floating mb-3">
            <label for="content">Contenuto</label>
            <textarea class="form-control" id="content" name="content" style="height: 100px">{{ old('content', $posts->content) }}</textarea>            
        </div>  

        <div class="mb-3">
            <label for="category_id">Categoria:</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Nessuna</option>
                @foreach ($categories as $category)                                
                    <option value="{{ $category->id }}" {{ old('category_id', $posts->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>    
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Immagine: </label>
            <input type="file" id="image" name="image">

            @if ($posts->cover)
                <div>
                    <div>
                        Immagine presente:
                    </div>
                    <img class="w-50 m-3" src="{{ asset('storage/' . $posts->cover) }}" alt="{{ $posts->title }}">
                </div>
            @endif
        </div>
 
        <div>
            <h5 class="mb-1">
                Tags:
            </h5>
        
            @foreach ($tags as $tag)
                @if ($errors->any())
                    <div class="form-check">            
                        <input class="form-check-input" 
                        type="checkbox" 
                        value="{{ $tag->id }}" 
                        id="tag-{{ $tag->id }}" 
                        name="tags[]"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                        
                        <label class="form-check-label" for="tag-{{ $tag->id }}">
                            {{ $tag->name }}
                        </label> 
                    </div>
                @else
                    <div class="form-check">            
                        <input class="form-check-input" 
                        type="checkbox" 
                        value="{{ $tag->id }}" 
                        id="tag-{{ $tag->id }}" 
                        name="tags[]"
                        {{ $posts->tags->contains($tag) ? 'checked' : '' }}>
                        
                        <label class="form-check-label" for="tag-{{ $tag->id }}">
                            {{ $tag->name }}
                        </label> 
                    </div>
                @endif
        @endforeach
        </div>

        <input type="submit" class="btn btn-primary my-3" value="Salva">
    </form>
@endsection