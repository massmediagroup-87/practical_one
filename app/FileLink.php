<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileLink extends Model
{
    public function file()
    {
        return $this->belongsTo('App\UserFile');
    }
}
