<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Category;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content'
    ];

    protected $table = 'messages';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function category () {
        //return $this->belongsTo("App\Category"); MERGE si asta
        return $this->belongsTo(Category::class);
    }

    public function tags () {
        return $this->belongsToMany("App\Tag");
    }

    public function comentarii () {
        return $this->hasMany("App\Comentariu", 'mesaj_id', 'id');
    }
}
