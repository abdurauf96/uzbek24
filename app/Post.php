<?php

namespace App;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
class Post extends Model
{
    use Translatable;
    use Resizable;
    protected $translatable=['title', 'body', 'excerpt'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
