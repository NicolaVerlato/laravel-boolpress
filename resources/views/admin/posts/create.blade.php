@extends('layouts.dashboard')

@section('content')

    <h1 class="pb-2">Crea un nuovo post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"> 
        </div>
        <div class="form-floating mb-3">
            <label for="content">Contenuto</label>
            <textarea class="form-control" id="content" name="content" style="height: 100px">{{ old('content') }}</textarea>            
        </div>  

        <div class="mb-3">
            <label for="category_id">Categoria:</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Nessuna</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-primary my-3" value="Salva">
    </form>
@endsection