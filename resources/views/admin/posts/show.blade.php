@extends('layouts.dashboard')

@section('content')
    <h1>{{ $posts->title }}</h1>

    <p>{{ $posts->content }}</p>

    <div>
        <div>
            Creazione: {{ $posts->created_at }}
        </div>
        <div>
            Ultima modifica: {{ $posts->updated_at }}
        </div>
        <div>
            Slug: {{ $posts->slug }}
        </div>
    </div>

    <a class="btn btn-primary mt-3" href="{{ route('admin.posts.edit', ['post' => $posts->id]) }}">Modifica</a>

    <form action="{{ route('admin.posts.destroy', ['post' => $posts->id]) }}" method="post">
        @csrf
        @method('DELETE')

        <input class="btn btn-danger mt-2" type="submit" value="Elimina">
    </form>
@endsection