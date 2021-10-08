<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Writer extends Model
{
    
    protected $guarded = [];
    
    public function books()
    {
        return $this->hasMany(Book::class);
    }

}
