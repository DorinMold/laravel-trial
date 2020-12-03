<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class BlogController extends Controller
{
    public function getSingle($slug) {   //denumirea de $(slug) corespunde cu cea a paramentrului "slug" din ruta (web.php) 
                                         // Route::get('blog/{slug}', ['as'=>'blog.single', 'uses' => 'BlogController@getSingle']);
        //$mes = Message::where('slug', '=', $slug)->get();  DACA s-ar folosi get in loc de first ar trebui sa facem loop chiar daca e un singur element
    
        $mess = Message::where('slug', '=', $slug)->first();
        return view('blog.single')->withMess($mess);
    }
}
