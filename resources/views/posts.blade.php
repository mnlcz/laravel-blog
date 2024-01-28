<!DOCTYPE html>

<title>My blog</title>
<link rel="stylesheet" href="/app.css">

<body>
    @foreach ($posts as $post)
        <article>
            {{ $post }}
        </article>
    @endforeach
</body>
