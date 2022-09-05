@extends('layouts.dashboard')

@section('content')
    <h1>{{ $posts->title }}</h1>

    <p>{{ $posts->content }}</p>

    <div>
        Slug: {{ $posts->slug }}
    </div>
@endsection