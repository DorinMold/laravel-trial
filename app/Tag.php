<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function messages () {
        // return $this->belongsToMany("App\Message", 'message_tag', 'tag_id', 'message_id');
        return $this->belongsToMany("App\Message");
    }
}
