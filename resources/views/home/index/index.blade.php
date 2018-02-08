@extends('layouts.home')

@section('title', $config['WEB_TITLE'])

@section('keywords', $config['WEB_KEYWORDS'])

@section('description', $config['WEB_DESCRIPTION'])

@section('content')
    <header class="content-header index-header">
        <div class="container fade-scale in">
            <h1 class="title">{{ $topTitle }}</h1>
            <h5 class="subtitle">学习弯道超车的技巧！</h5>
        </div>
    </header>

    <div class="container body-wrap">
        <ul class="post-list">
            <!-- 循环文章列表开始 -->
            @foreach($article as $k => $v)
                <li class="post-list-item fade in">
                    <article id="post-{{ $v->created_at }}" class="article-card article-type-post" itemprop="blogPost">

                        <div class="post-meta">
                            <time class="post-time" title="{{ $v->created_at }}" datetime="{{ $v->created_at }}" itemprop="datePublished">{{ $v->created_at }}</time>
                            <ul class="article-category-list">
                                <li class="article-category-list-item">
                                    <a class="article-category-list-link" href="{{ url('category', [$v->category_id]) }}">{{ $v->category_name }}</a>
                                </li>
                            </ul>
                        </div>
                        
                        <h3 class="post-title" itemprop="name">
                          <a class="post-title-link" href="{{ url('article', $v->id) }}">{{ $v->title }}</a>
                        </h3>
          
                        <div class="post-content" id="post-content" itemprop="postContent">
                            {{ $v->description }}

                            <a href="{{ url('article', $v->id) }}" class="post-more waves-effect waves-button">
                                阅读全文...
                            </a>
                        </div>

                        <div class="post-footer">
                            <ul class="article-tag-list">
                                @foreach($v['tag'] as $kk => $vv)
                                    <li class="article-tag-list-item">
                                        <a class="article-tag-list-link waves-effect waves-button" href="{{ url('tag', [$vv->tag_id]) }}">{{ $vv->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
            
                    </article>
                </li>
            @endforeach
            <!-- 循环文章列表结束 -->
        </ul>

        <nav id="page-nav">{{ $article->links() }}</nav>
    </div>

    <!-- 左侧列表开始 -->
    <div class="col-xs-12 col-md-12 col-lg-8" style="display: none;">
        @if(!empty($tagName))
            <div class="row b-tag-title">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <h2>拥有<span class="b-highlight">{{ $tagName }}</span>标签的文章</h2>
                </div>
            </div>
        @endif
        @if(request()->has('wd'))
            <div class="row b-tag-title">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <h2>搜索到的与<span class="b-highlight">{{ request()->input('wd') }}</span>相关的文章</h2>
                </div>
            </div>
        @endif

        <!-- 列表分页开始 -->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 b-page text-center">
                {{ $article->appends(['wd' => request()->input('wd')])->links('vendor.pagination.bjypage') }}
            </div>
        </div>
        <!-- 列表分页结束 -->
    </div>
    <!-- 左侧列表结束 -->
@endsection