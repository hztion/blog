@extends('layouts.home')

@section('title', $config['WEB_TITLE'])

@section('keywords', $config['WEB_KEYWORDS'])

@section('description', $config['WEB_DESCRIPTION'])

@section('content')
    <header class="content-header categories-header">
        <div class="container fade-scale in">
            <h1 class="title">Categories</h1>
            <h5 class="subtitle"></h5>
        </div>
    </header>

    <div class="container body-wrap fade in">
        <div class="waterfall in">
            <!-- 循环分类列表开始 -->
            @foreach($data as $k => $v)
            <div class="waterfall-item">
                <article class="article-card archive-article">
                    <div class="post-meta">
                        <time class="post-time" title="{{ $v->created_at }}" datetime="{{ $v->created_at }}" itemprop="datePublished">{{ $v->created_at }}</time>

                        <ul class="article-category-list">
                            <li class="article-category-list-item">
                                <a class="article-category-list-link" href="{{ url('category', [$v->id]) }}">{{ $v->name }}</a>
                            </li>
                        </ul>
                    </div>

                    <h3 class="post-title" itemprop="name">
                        <a class="post-title-link" href="{{ url('category', [$v->id]) }}">{{ $v->description }}</a>
                    </h3>
                </article>
            </div>
            @endforeach
            <!-- 循环分类列表结束 -->
        </div>
    </div>
@endsection