@extends('layouts.dashboard')

@section('content')
    <h1>Tutti i post</h1>

    <div class="row row-cols-3">
        @foreach ($posts as $post)
            <div class="col">
                <div class="card mt-4">
                    <div class="card-body">
                        <h3 class="card-title">{{ $post->title }}</h3>
                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Dettagli</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection