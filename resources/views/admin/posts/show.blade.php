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
@endsection