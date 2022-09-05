@extends('layouts.dashboard')

@section('content')

    <h1>Crea un nuovo post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-floating">
            <label for="content">Contenuto</label>
            <textarea class="form-control" id="content" style="height: 100px"></textarea>            
        </div>  
        <input type="submit" class="btn btn-primary my-3" value="Salva">
    </form>
@endsection