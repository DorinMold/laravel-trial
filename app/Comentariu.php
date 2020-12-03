<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentariu extends Model
{
    protected $table = "comentarii";
    public function mesaj () {
        return $this->belongsTo("App\Message", "mesaj_id");
    }
}
