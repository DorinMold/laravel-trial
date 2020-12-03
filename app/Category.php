<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function messages () {
        $this->hasMany("App\Message");
    }
}
