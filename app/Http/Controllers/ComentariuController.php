<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentariu;
use App\Message;
use Session;

class ComentariuController extends Controller
{
    public function __construct () {
        $this->middleware('auth', ['except' => 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)  //e trimis ca $mess->id din blog.single.blade.php
    {
        $this->validate($request, [
            'nume'       => 'required|max:255',
            'email'      => 'required|email|max:255',
            'comentariu' => 'required|min:5|max:2000'
        ]);

        $mes = Message::find($id);

        $comentariu = new Comentariu;
        $comentariu->name = $request->nume; // SAU $comentariu->nume = $request->input['nume']
        $comentariu->email = $request->email;
        $comentariu->comentariu = $request->comentariu;
        $comentariu->aprobat = true;
        $comentariu->mesaj()->associate($mes); //ASSOCIATE .... ASSOCIATE .... ASSOCIATE

        $comentariu->save();

        Session::flash('succes', 'Comentariul a fost adaugat cu succes');

        return redirect()->route('blog.single', [$mes->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comentariu = Comentariu::find($id);
        return view('comentarii.edit')->withComentariu($comentariu);
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
        $comentariu = Comentariu::find($id);
        $this->validate($request, array(
            'comentariu' => 'required'
        ));
        $comentariu->comentariu = $request->comentariu;
        $comentariu->save();
        Session::flash('succes', 'Ai actualizat cu succes');
        return redirect()->route('colectii');
    }

    public function sterge($id) {
        $comentariu = Comentariu::find($id);
        return view('comentarii.stergere')->withComentariu($comentariu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        $comentariu = Comentariu::find($id);
        dd($comentariu);
        $comentariu->delete();
        Session::flash('succes', 'Comentriul a fost sters');
        return redirect()->route('posts.salvare');
    }
}
