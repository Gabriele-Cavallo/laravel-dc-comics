@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="title" class="form-label">Titolo</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value="{{ $comic->title }}">
            </div>
            <div class="mb-3">
              <label for="thumb" class="form-label">Immagine</label>
              <input type="text" class="form-control" id="thumb" name="thumb" aria-describedby="emailHelp" value="{{ $comic->thumb }}">
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Prezzo</label>
              <input type="number" step="0.01" class="form-control" id="price" name="price" aria-describedby="emailHelp" value="{{ $comic->price }}">
            </div>
            <div class="mb-3">
              <label for="series" class="form-label">Serie</label>
              <input type="text" class="form-control" id="series" name="series" aria-describedby="emailHelp" value="{{ $comic->series }}">
            </div>
            <div class="mb-3">
              <label for="sale_date" class="form-label">Data di vendita</label>
              <input type="date" class="form-control" id="sale_date" name="sale_date" aria-describedby="emailHelp" value="{{ $comic->sale_date }}">
            </div>
            <div class="mb-3">
              <label for="type" class="form-label">Tipo</label>
              <input type="text" class="form-control" id="type" name="type" aria-describedby="emailHelp" value="{{ $comic->type }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" rows="7" name="description">{{ $comic->description }}"</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">EDIT</button>
        </form>
    </div>
@endsection