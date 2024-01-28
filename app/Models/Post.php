<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public function __construct(
        public string $title,
        public string $excerpt,
        public string $date,
        public string $body,
        public string $filename
    ) {
    }

    public static function find(string $filename) : Post
    {
        $posts = static::all();
        return $posts->firstWhere('filename', $filename);
    }

    public static function all() : \Illuminate\Support\Collection
    {
        return collect(File::files(resource_path('posts')))
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(fn ($document) => new Post(
                title: $document->title,
                excerpt: $document->excerpt,
                date: $document->date,
                body: $document->body(),
                filename: $document->filename
            ));
    }
}
