@extends('layouts.app')

@section('content')
    <div class="container-comics row">
        <div class="col show">
            <div class="card">
                <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                <div class="card-body">
                    <h5 class="card-title">Titolo: {{ $comic->title }}</h5>
                    <div class="card-text">Prezzo: {{ $comic->price }}€</div>
                    <div class="card-text">Serie: {{ $comic->series }}</div>
                    <div class="card-text">Data di vendita: {{ $comic->sale_date }}</div>
                    <div class="card-text">Tipo: {{ $comic->type }}</div>
                    <a href="{{ route('comics.index') }}" class="btn btn-dc">Go back</a>
                    <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-dc">Edit Comic</a>
                </div>
            </div>
        </div>
    </div>
@endsection