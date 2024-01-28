<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function find(string $name) : bool|string
    {
        if (! file_exists($path = resource_path("posts/{$name}.html"))) {
            throw new ModelNotFoundException;
        }

        return cache()->remember("posts.{$name}", now()->addMinutes(20), fn () => file_get_contents($path));
    }

    public static function all()
    {
        $files = collect(File::files(resource_path('posts/')));

        return $files->map(fn ($f) => $f->getContents());
    }
}
