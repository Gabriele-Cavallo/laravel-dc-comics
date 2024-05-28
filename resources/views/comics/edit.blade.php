@extends('layouts.app')

@section('content')
    <div class="container">
      
      <h1 class="text-center">MODIFICA UN FUMETTO</h1>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- Title input --}}
            <div class="mb-3">
              <label for="title" class="form-label">Titolo</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value="{{ old('title', $comic->title) }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- Title input --}}

            {{-- Thumb input --}}
            <div class="mb-3">
              <label for="thumb" class="form-label">Immagine</label>
              <input type="text" class="form-control" id="thumb" name="thumb" aria-describedby="emailHelp" value="{{ old('thumb', $comic->thumb) }}">
            </div>
            @error('thumb')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- /Thumb input --}}

            {{-- Price input --}}
            <div class="mb-3">
              <label for="price" class="form-label">Prezzo</label>
              <input type="number" step="0.01" class="form-control" id="price" name="price" aria-describedby="emailHelp" value="{{ old('price', $comic->price) }}">
            </div>
            {{-- /Price input --}}

            {{-- Series input --}}
            <div class="mb-3">
              <label for="series" class="form-label">Serie</label>
              <input type="text" class="form-control" id="series" name="series" aria-describedby="emailHelp" value="{{ old('series', $comic->series) }}">
            </div>
            {{-- /Series input --}}

            {{-- Sale date input --}}
            <div class="mb-3">
              <label for="sale_date" class="form-label">Data di vendita</label>
              <input type="date" class="form-control" id="sale_date" name="sale_date" aria-describedby="emailHelp" value="{{ old('sale_date', $comic->sale_date) }}">
            </div>
            {{-- /Sale date input --}}

            {{-- Type input --}}
            <div class="mb-3">
              <label for="type" class="form-label">Tipo</label>
              <select class="form-select" id="type" name="type">
                <option @selected(old('type', $comic->type) === '') value="">Scegli un'opzione</option>
                <option @selected(old('type', $comic->type) === 'comic book') value="comic book">Comic book</option>
                <option @selected(old('type', $comic->type) === 'graphic novel') value="graphic novel">Graphic novel</option>
              </select>
            </div>
            {{-- /Type input --}}

            {{-- Description input --}}
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" rows="7" name="description">{{ old('description', $comic->description) }}</textarea>
            </div>
            {{-- /Description input --}}

            {{-- Submit button --}}
            <button type="submit" class="btn btn-primary">EDIT</button>
            {{-- /Submit button --}}
        </form>
    </div>
@endsection