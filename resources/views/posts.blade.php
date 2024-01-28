<!DOCTYPE html>

<title>My blog</title>
<link rel="stylesheet" href="/app.css">

<body>
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{ $post->filename }}">
                    {{ $post->title }}
                </a>
            </h1>
        </article>

        <div>
            {{ $post->excerpt }}
        </div>
    @endforeach
</body>
