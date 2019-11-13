<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempLink extends Model
{
    protected $fillable = ['active'];

    public function file()
    {
        return $this->belongsTo(UserFile::class);
    }
}
