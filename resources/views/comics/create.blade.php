@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('comics.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Titolo</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="thumb" class="form-label">Immagine</label>
              <input type="text" class="form-control" id="thumb" name="thumb" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Prezzo</label>
              <input type="number" step="0.01" class="form-control" id="price" name="price" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="series" class="form-label">Serie</label>
              <input type="text" class="form-control" id="series" name="series" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="sale_date" class="form-label">Data di pubblicazione</label>
              <input type="text" class="form-control" id="sale_date" name="sale_date" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="type" class="form-label">Tipo</label>
              <input type="text" class="form-control" id="type" name="type" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" rows="7" name="description"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection