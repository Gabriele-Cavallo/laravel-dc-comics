@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center">AGGIUNGI UN FUMETTO</h1>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('comics.store') }}" method="POST">
            @csrf
            {{-- Title input --}}
            <div class="mb-3">
              <label for="title" class="form-label">Titolo</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value="{{ old('title')}}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- /Title input --}}

            {{-- Thumb input --}}
            <div class="mb-3">
              <label for="thumb" class="form-label">Immagine</label>
              <input type="text" class="form-control" id="thumb" name="thumb" aria-describedby="emailHelp" value="{{ old('thumb')}}">
            </div>
            @error('thumb')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- /Thumb input --}}

            {{-- Price input --}}
            <div class="mb-3">
              <label for="price" class="form-label">Prezzo</label>
              <input type="number" step="0.01" class="form-control" id="price" name="price" aria-describedby="emailHelp" value="{{ old('price')}}">
            </div>
            {{-- /Price input --}}

            {{-- Series input --}}
            <div class="mb-3">
              <label for="series" class="form-label">Serie</label>
              <input type="text" class="form-control" id="series" name="series" aria-describedby="emailHelp" value="{{ old('series')}}">
            </div>
            {{-- /Series input --}}

            {{-- Sale date input --}}
            <div class="mb-3">
              <label for="sale_date" class="form-label">Data di vendita</label>
              <input type="date" class="form-control" id="sale_date" name="sale_date" aria-describedby="emailHelp" value="{{ old('sale_date')}}">
            </div>
            {{-- /Sale date input --}}

            {{-- Type input --}}
            <div class="mb-3">
              <label for="type" class="form-label">Tipo</label>
              <select class="form-select" id="type" name="type">
                <option @selected(old('type') === '') value="" selected>Scegli un'opzione</option>
                <option @selected(old('type') === 'comic book') value="comic book">Comic book</option>
                <option @selected(old('type') === 'graphic novel') value="graphic novel">Graphic novel</option>
              </select>
            </div>
            {{-- /Type input --}}

            {{-- Description input --}}
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" rows="7" name="description">{{ old('description' )}}</textarea>
            </div>
            {{-- /Description input --}}

            {{-- Submit button --}}
            <button type="submit" class="btn btn-primary">ADD</button>
            {{-- /Submit button --}}
        </form>
    </div>
@endsection