<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
{
    public function __construct () {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'nume' => 'required|max:255'
        ));

        $tag = new Tag;
        $tag->nume = $request->nume;
        $tag->save();

        Session::flash('succes', 'Un nou tag a fost creat cu succes');

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tags.show')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit')->with('tag', $tag);
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
        $tag = Tag::find($id);
        $this->validate($request, [
            'nume' => 'required|max:100'
        ]);
        $tag->nume = $request->nume;
        $tag->save();
        Session::flash('succes', "Tag-ul a fost modificat cu succes");

        return redirect()->route('tags.show', $tag->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        //Se rupe legatura in tabelul messages_tag
        $tag->messages()->detach();

        $tag->delete();

        Session::flash('Succes', 'Tag-ul a fost sterg cu succes');

        return redirect()->route('tags.index');
    }
}
