@extends('layout.header')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/showcareer.css') }}">
@endsection

@section('content')
<div class="article-container">

    <div class="article-main">
        <h1>{{ $post->title }}</h1>

        <div class="article-meta">
            <span class="category">{{ $post->category->name }}</span>
            <span class="date">
                <i class="fa-regular fa-calendar"></i> 
                {{ optional($post->created_at)->format('d/m/Y') }}
            </span>
        </div>

        <img src="{{ $post->thumbnail }}" class="main-thumbnail">

        <div class="article-summary">
            {{ $post->summary }}
        </div>

        {{-- CONTENT --}}
        <div class="article-content">
            @foreach($post->sections as $sec)
                <h2>{{ $sec->title }}</h2>
                <div>{!! $sec->content !!}</div>
            @endforeach
        </div>

        {{-- TAG --}}
        <div class="article-tags">
            @foreach($post->tags as $tag)
                <a href="#" class="tag-item">#{{ $tag->name }}</a>
            @endforeach
        </div>
    </div>

    <div class="article-sidebar">
        <h3 class="sidebar-title">Bài viết liên quan</h3>
        
        <div class="related-list">
            @foreach($related as $item)
                <a href="{{ route('career.show', $item->id) }}" class="related-post-item">
                    <p>{{ $item->title }}</p>
                </a>
            @endforeach
        </div>
    </div>

</div>
<script>
document.addEventListener("scroll", function () {
    const elements = document.querySelectorAll(".article-content h2");

    elements.forEach(el => {
        const top = el.getBoundingClientRect().top;

        if (top < window.innerHeight - 50) {
            el.style.opacity = "1";
            el.style.transform = "translateY(0)";
        }
    });
});
</script>
@endsection