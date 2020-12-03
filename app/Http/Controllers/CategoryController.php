<?php

//php artisan make:controller CategoryController --resource


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
{

    public function __contruct () {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //display a view of all categories and will have a form to create a new category....that's why
        //we delete the create functionality below
         $categories = Category::all();
         return view('categories.index')->withCategories($categories);
        //return 'VVV';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function create()
    {
        //
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nume' => 'required|max:255'
        ]);

        $category = new Category;

        $category->nume = $request->nume; //$request->input('nume')
        $category->save();

        Session::flash('mesaj', 'S-a salvat categoria ta');

       // return redirect()->route('categories.index');
       return redirect()->back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
