<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

        //extracto del texto content
    public function getExcerptAttribute(){
        return substr($this->content,0,150);
    }

    //mostrar le fecha de publicacion
    public function getPublishedAttribute(){
        return $this->create_at->format('d/m/Y');
    }

    //el usario del post
    public function user(){
        return $this->belongsTo(User::class);
    }

}
