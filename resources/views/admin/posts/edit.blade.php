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

    <form action="{{ route('admin.posts.update', ['post' => $posts->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $posts->title) }}">
        </div>
        <div class="form-floating">
            <label for="content">Contenuto</label>
            <textarea class="form-control" id="content" name="content" style="height: 100px">{{ old('content', $posts->content) }}</textarea>            
        </div>  
        <input type="submit" class="btn btn-primary my-3" value="Salva">
    </form>
@endsection