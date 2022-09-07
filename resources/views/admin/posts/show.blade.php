@extends('layouts.dashboard')

@section('content')
    <h1>{{ $posts->title }}</h1>

    <p>{{ $posts->content }}</p>
    {{-- {{ dd($posts) }} --}}
    <div>
        <div>
            Creazione: {{ $posts->created_at->format('j F Y, G:i') }}
        </div>
        <div>
            Ultima modifica: {{ $posts->updated_at->format('l j F Y, G:i') }}
        </div>
        <div>
            Slug: {{ $posts->slug }}
        </div>
        <div>
            Categoria: {{ $posts->category ? $posts->category->name : 'Nessuna' }}
        </div>
    </div>

    <a class="btn btn-primary mt-3" href="{{ route('admin.posts.edit', ['post' => $posts->id]) }}">Modifica</a>

    <form action="{{ route('admin.posts.destroy', ['post' => $posts->id]) }}" method="post">
        @csrf
        @method('DELETE')

        <input class="btn btn-danger mt-2" type="submit" value="Elimina" onClick="return confirm('Sei sicuro di volerlo eliminare?')">
    </form>
@endsection