<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Category;
use App\Tag;    
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Mail\mailtest;
use App\Events\Eveniment;
use Illuminate\Database\Eloquent\Collection;
//use Illuminate\Support\Facades\Input;
use Purifier;
use Image;
use Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['resetEmail']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $messages = Message::all();
       //return view('home');
       return view('pagini.acasa')->with('messages', $messages);
      // return 'gg';
       //dd($messages);
    }

    public function update () {

    }

    public function despre ($h = 'nimic') {

		return view('pagini.despre')->with('hhh', $h);
        
       // return response('AAA'); - aici se afiseaza pur si simplu mesajul

    }

    public function colectii () {
       // return 'Acesta este colectii';
       $message = collect([
           'id' => '4',
           'title' => 'Titlul de mesaj',
           'content' => 'Continut de mesaj',
           'created_at' => 'Ora 3 noaptea'
       ]); //pentru ca deasupra e ASSOCIATIVE array atunci si in blade avem o colectie ASSOCIATIVA
       return view('pagini.devmarkerall')->withMessage($message);
    }

    public function createnew() {

        $categories = Category::all();
        $tags = Tag::all();

        return view('pagini.creare')->withCategories($categories)->with('tags', $tags);
    }

    public function vizualizeaza () {
        
        $messages = Message::paginate(20);

        $message = event(new Eveniment('Mesaj din eveniment')); //vine din listener

        $categories = Category::all();
        $catgs = [];
        foreach ( $categories as $category ) {
            $catgs[$category->id] = $category->nume;
        }
        
        $taguri = Tag::all();
	    //print_r($message);
		
        return view('pagini.editare')->withMessage($message[0])->withPost($messages[0])->withCatgs($catgs )
                                     ->withTaguri($taguri);

      //  Mail::to('moldovandorinv@gmail.com')->send(new mailtest());

     ///   return view('pagini.posts', ['messages' => $messages]);

    }

    // public function editare (Message $post) {
    //     return view('pagini.editare')->withPost($post);
    // }

    public function editare ($id) {
        $post = Message::find($id);
        $categories = Category::all();
        $catgs = [];
        foreach ( $categories as $category ) {
            $catgs[$category->id] = $category->nume;
        }

        $taguri = Tag::all();
        $tags = array();

        foreach($taguri as $tag) {
            $tags[$tag->id] = $tag->nume;
        }

        return view('pagini.editare', compact(['post', 'catgs', 'taguri']));  //mai sus este alt exemplu
        // $catgs este o pereche de key si val injectata in blade care se imparte in value <option value>
        // si ceea ce apare (se afiseaza) in cadrul <select/> la fiecare <option>
    }

    public function actualizare (Request $request, $show) {

        $this->validate($request, [
            'title' => 'required|min:6|max:20', //Daca conditiile nu sunt indeplinite nu iti dai seama din rularea paginii...scriptul se opreste pur si simplu
            'slug' => "required|min:4|unique:messages,slug,$show", //Daca conditiile nu sunt indeplinite nu iti dai seama din rularea paginii...scriptul se opreste pur si simplu
            'content' => 'required|min:10',    //Daca conditiile nu sunt indeplinite nu iti dai seama din rularea paginii...scriptul se opreste pur si simplu
            'category_id' => 'required|integer',
            'imagine_prim' => 'image'
            ]);

        $mes = Message::find($show);

        if ( $request->hasFile("imagine_prim") ) {
            $imagine = $request->file("imagine_prim");  //AIIICIICICICI
            $nume_doc = time() . '.' . $imagine->getClientOriginalExtension();  //$imagine->encode(png) daca vrem sa o transformam in png
            //$locatie = storage_path('/app/posts');
            $locatie = public_path("imagini\\" . $nume_doc); //asset() creaza un url nu un path
            Image::make($imagine)->resize(800, 400)->save($locatie);
            $imagine_veche = $mes->imagine;
            $mes->imagine = $locatie;
            //Storage::disk('public')->delete(basename($imagine_veche));  // am facut modificare in config/filesystems.php
            unlink(public_path('imagini/' . basename($imagine_veche) ));
        }
      
        $mes->nume = $request->input('title');
        $mes->slug = $request->input('slug');
        $mes->content = Purifier::clean($request['content']);
        $mes->category_id = $request['category_id'];
        $mes->save();
        if ( isset( $request->taguri ) ) {
            $mes->tags()->sync($request->taguri, true); // true pesntru ca vrem sa suprascriem
        } else {
            $mes->tags()->sync(array() );
        }
            
        
        Session::flash('succes','Modificarea s-a salvat cu succes');

        return view('pagini.actualizare');
    }

    public function arata (Message $show) { //in route $show...$show de tipul Message va gasi modelul in functie de id
        $tags = Tag::all();
        return view('pagini.arata')->with('id', $show->id)
                   ->withContent($show->content)->with('slug', $show->slug)->withTags($tags);
    }
	
	public function resetEmail() {
		echo "eeee";
    }
    
    public function contact() {
        return view('pagini.contact');
    }

    public function destroy ($id) {
        $mesaj = Message::find($id);

        unlink(public_path('imagini/' . basename($mesaj->imagine) ));
        $mesaj->tags()->detach();

        $mesaj->delete();

        Session::flash('succes', 'Mesajul a fost sters cu succes');

        return redirect()->route('posts.index');
    }

    public function salvare (Request $req ) {

        $salvari = $this->validate($req, [
            'title'     => 'required|min:3',
            'slug'      => 'required|min:3',
            'category_id' => 'required|integer',
            'content' => 'required|min:3',
            'imagine_prim' => 'sometimes|image'  //sometimes inseamna ca nu e necesar sa existe (adica nu-i required)
        ]);

       // Message::create(Input::except('_token')); ASTA MERGE doar daca numele din form 
       //corespund cu numele coloanelor din tabel (use Illuminate\Support\Facades\Input)

       $mesaj = new Message();
        
        $mesaj->nume = $salvari['title'];
        $mesaj->slug = $salvari['slug'];
        $mesaj->category_id = $salvari['category_id'];
        $mesaj->content = Purifier::clean($salvari['content']); 

        if ( $req->hasFile("imagine_prim")) {
            $imagine = $req->file("imagine_prim");  //AIIICIICICICI
            $nume_doc = time() . '.' . $imagine->getClientOriginalExtension();  //$imagine->encode(png) daca vrem sa o transformam in png
            //$locatie = storage_path('/app/posts');
            $locatie = public_path("imagini\\" . $nume_doc); //asset() creaza un url nu un path
            Image::make($imagine)->resize(800, 400)->save($locatie);
            $mesaj->imagine = $locatie;
        }

        $mesaj->save();

        $mesaj->tags()->sync($req->taguri, false); // fara false o sa stearga si inlocuiasca ce gaseste in tabel
                                                   // noi vrem sa adaugam nu sa inlocuim

        // $messages = Message::paginate(2);

        // $someUsers = User::where('votes', '>', 100)->paginate(15);

        return view('pagini.arata')->with('id', $mesaj->id)->withContent($mesaj->content)
               ->with('slug', $mesaj->slug)->with('tags', $mesaj->tags);

        // json_encode($post->tags()->allRelatedIds())
    }

    public function postContact (Request $request) {
        $this->validate($request, ['email' => 'required|email', 
                                   'tema' => 'min:3',
                                   'mesaj' => 'min:10']);
        $data = array( 'email' => $request->email, 
                       'tema' => $request->subiect, 
                       'mesaj' => $request->mesaj);

        Mail::send('email.contact', $data, function ($message) use ($data) { 
            $message->from($data['email']);
            $message->to('mdorinv@yahoo.com');
            $message->subject($data['tema']);
         });

         Session::flash('succes', 'Mail-ul a fost trimis');

         //return redirect()->url('/');
         return redirect('/');
    }

}
