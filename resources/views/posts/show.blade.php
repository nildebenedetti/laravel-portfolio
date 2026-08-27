@extends("layouts.posts")

@section("title", $post->title )

@section("content")

<h2>
    - {{ $post->author }}
</h2>
<small>
    {{ $post->category }}
</small>

<section>
    <p>
        {{ $post->content }}
    </p>
</section>

@endsection