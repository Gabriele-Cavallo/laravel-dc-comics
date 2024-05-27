@extends('layouts.app')

@section('content')
    <div class="container-comics row">
        <div class="col">
            @foreach ($comics as $comic)
                <div class="card">
                    <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                    <div class="card-body">
                        <h5 class="card-title">Titolo: {{ $comic->title }}</h5>
                        <div class="card-text">Prezzo: {{ $comic->price }}€</div>
                        <div class="card-text">Serie: {{ $comic->series }}</div>
                        <div class="card-text">Data di vendita: {{ $comic->sale_date }}</div>
                        <div class="card-text">Tipo: {{ $comic->type }}</div>
                        <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-dc">Show Comic</a>
                        <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-dc">Edit Comic</a>
                        <div class="form-delete">
                            <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger js-delete-btn" data-comic-title="{{ $comic->title }}">Delete Comic</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
  
    <!-- Modale eliminazione fumetto -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteConfirmModalLabel">Conferma eliminazione</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sei sicuro di voler cancellare il fumetto:  
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-danger" id="modal-confirm">Elimina</button>
            </div>
        </div>
        </div>
    </div>
@endsection