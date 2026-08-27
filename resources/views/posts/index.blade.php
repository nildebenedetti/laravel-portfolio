@extends("layouts.posts")

@section("title", "All Posts")


@section("content")
<div class="container">
    <ul class="list-unstyled">
        @foreach($posts as $post)
        <li>
            <h2>
                {{ $post->title }}
            </h2>
            <p>
                {{ $post->content }}
            </p>
            <br>
            <p>
                {{ $post->author }}
            </p>
            <p>
                {{ $post->category }}
            </p>
        </li>

        @endforeach
    </ul>
</div>

@endsection