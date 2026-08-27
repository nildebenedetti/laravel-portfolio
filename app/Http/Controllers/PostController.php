<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) // LA BEST PRACTICE: sostituire la stringa con lístanza post
    // questo fa si che in automatica si vada pescare post con quellíd
    // senza scrivere nulla dentro la funzione
    {
        // se tengo il parametro in entrata come da preimpostato
        // OVVERO => public function show(string $id)
        // questo modo più prolisso
        // $post = Post::where("id", $id)->first();
        // questo pure funziona
        // $post = Post::find($id);

        //LA BEST PRACTICE È CAMBIARE IL PARAMETRO IN INGRESSO
        // CREANDO COSÌ UNA ROTTA DINAMICA

        return view("posts.show", compact("post"));


        dd($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
