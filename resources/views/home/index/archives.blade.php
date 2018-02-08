@extends('layouts.home')

@section('title', $config['WEB_TITLE'])

@section('keywords', $config['WEB_KEYWORDS'])

@section('description', $config['WEB_DESCRIPTION'])

@section('content')
    <header class="content-header categories-header">
        <div class="container fade-scale in">
            <h1 class="title">Archives</h1>
            <h5 class="subtitle"></h5>
        </div>
    </header>

    <div class="container body-wrap fade in">
        <!-- 循环分类列表开始 -->
        @foreach($data as $k => $v)
            <h3 class="archive-separator">{{ $k }}</h3>
            <div class="waterfall in">
                @foreach($v as $kk => $vv)
                    <div class="waterfall-item">
                        <article class="article-card archive-article">
                            <div class="post-meta">
                                <time class="post-time" title="{{ $vv->created_at }}" datetime="{{ $vv->created_at }}" itemprop="datePublished">{{ $vv->created_at }}</time>
                                <ul class="article-category-list">
                                    <li class="article-category-list-item">
                                        <a class="article-category-list-link" href="{{ url('category', [$vv->category_id]) }}">{{ $vv->category_name }}</a>
                                    </li>
                                </ul>
                            </div>

                            <h3 class="post-title" itemprop="name">
                                <a class="post-title-link" href="{{ url('article', [$vv->id]) }}">{{ $vv->title }}</a>
                            </h3>

                            <div class="post-footer">
                                <ul class="article-tag-list">
                                    @foreach($vv['tag'] as $kkk => $vvv)
                                        <li class="article-tag-list-item">
                                            <a class="article-tag-list-link waves-effect waves-button" href="{{ url('tag', [$vvv->tag_id]) }}">{{ $vvv->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        @endforeach
        <!-- 循环分类列表结束 -->
    </div>
@endsection