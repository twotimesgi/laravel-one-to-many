<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Post extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $fillable = ['title', 'image', 'content', 'slug'];

    public static function generateSlug($title)
    {
        $baseSlug = Str::of($title)->slug('-')->__tostring();
        $slug = $baseSlug;
        $count = 1;

        while(static::where('slug', $slug)->exists()) {
            $slug = "$baseSlug-$count";
            $count++;
        }
        return $slug;
    }
}
