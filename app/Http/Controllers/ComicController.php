<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        $data = [
            'comics' => $comics,
        ];

        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->all();
        $this->validationParams($form);
        $newComic = new Comic();
        // $newComic->title = $form['title'];
        // $newComic->description = $form['description'];
        // $newComic->thumb = $form['thumb'];
        // $newComic->price = $form['price'];
        // $newComic->series = $form['series'];
        // $newComic->sale_date = $form['sale_date'];
        // $newComic->type = $form['type'];
        $newComic->fill($form);
        $newComic->save();

        return redirect()->route('comics.show', ['comic' => $newComic->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        // $comic = Comic::findOrFail($id);

        $data = [
            'comic' => $comic,
        ];

        return view('comics.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);

        $data = [
            'comic' => $comic,
        ];

        return view('comics.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = $request->all();
        $this->validationParams($form);
        $comic = Comic::findOrFail($id);
        $comic->update($form);

        return redirect()->route('comics.show', ['comic' => $comic->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();

        return redirect()->route('comics.index');
    }

    private function validationParams($data) {
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|max:100',
                'description' => 'nullable|min:100|max:3000',
                'thumb' => 'required',
                'price' => 'required|decimal:2|numeric',
                'series' => 'required|max:50',
                'sale_date' => 'required|date',
                'type' => 'required|max:50',
            ],
            [
                'title.required' => 'Il titolo è obbligatorio',
                'title.max' => 'Il titolo non può avere più di 100 caratteri',
                'description.min' => 'La descrizione deve avere minimo 100 caratteri o essere vuota',
                'description.max' => 'La descrizione può avere massimo 3000 caratteri o essere vuota',
                'thumb.required' => 'L\'immagine è obbligatoria',
                'price.required' => 'Il prezzo è obbligatorio, deve avere due cifre decimali',
                'price.numeric' => 'Il prezzo non può essere un testo',
                'price.decimal' => 'Il prezzo può avere solo due cifre dopo la virgola',
                'series.required' => 'La serie è obbligatoria',
                'sale_date.required' => 'La data di vendita è obbligatoria',
                'sale_date.date' => 'La data di vendita è obbligatoria in formato data gg/mm/yy',
                'type.required' => 'Il tipo è obbligatorio',
            ]
        )->validate();
        return $validator;
    }
}
