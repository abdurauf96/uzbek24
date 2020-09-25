<?php

namespace App;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $translatable=['name'];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function ad()
    {
        return $this->hasOne(Advert::class);
    }
}
