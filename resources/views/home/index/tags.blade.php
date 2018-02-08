@extends('layouts.home')

@section('title', $config['WEB_TITLE'])

@section('keywords', $config['WEB_KEYWORDS'])

@section('description', $config['WEB_DESCRIPTION'])

@section('content')
    <header class="content-header categories-header">
        <div class="container fade-scale in">
            <h1 class="title">Tags</h1>
            <h5 class="subtitle"></h5>
        </div>

        <div class="tabs-bar container">
            <nav class="tags-list">
                <a href="{{ url('tags') }}" style="-webkit-order:-1;order:-1" class="tags-list-item waves-effect waves-button waves-light active">全部</a> 
                @foreach($tags as $val)
                <a href="{{ url('tag', [$val->id]) }}" style="-webkit-order:0;order:0" class="tags-list-item waves-effect waves-button waves-light">{{ $val['name'] }}</a> 
                @endforeach
            </nav>
            <!-- PC show more-->
            <div class="tags-list-more">
                <a href="javascript:;" onclick="BLOG.tabBar(this)" class="action tags-list-item waves-effect waves-circle waves-light">
                    <i class="icon icon-ellipsis-h"></i>
                </a>
            </div>
        </div>
    </header>

    <div class="container body-wrap fade in">
        <!-- 循环分类列表开始 -->
        @foreach($data as $k => $v)
            <h3 class="archive-separator">{{ $k }}</h3>
            <div class="waterfall in">
                @foreach($v as $vv)
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