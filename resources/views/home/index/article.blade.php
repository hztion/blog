@extends('layouts.home')

@section('title', $data->title)

@section('keywords', $data->keywords)

@section('description', $data->description)

@section('content')
    <header class="content-header post-header">
        <div class="container fade-scale in">
            <h1 class="title">{{ $data->title }}</h1>
            <h5 class="subtitle">
                <time datetime="{{ $data->created_at }}" itemprop="datePublished" class="page-time">{{ $data->created_at }}</time>
                <ul class="article-category-list">
                    <li class="article-category-list-item">
                        <a class="article-category-list-link" href="{{ url('category', [$data->category_id]) }}">
                            {{ $data->category_name }}
                        </a>
                    </li>
                </ul>
            </h5>
        </div>
    </header>

    <div class="container body-wrap">
        <article class="post-article article-type-post fade in" itemprop="blogPost">
            <div class="post-card" style="padding-bottom:15px;">
                <h1 class="post-card-title">{{ $data->title }}</h1>
                <div class="post-meta">
                    <time class="post-time" title="{{ $data->created_at }}" datetime="{{ $data->created_at }}" itemprop="datePublished">{{ $data->created_at }}</time>

                    <ul class="article-category-list">
                        <li class="article-category-list-item">
                            <a class="article-category-list-link" href="{{ url('category', [$data->category_id]) }}">{{ $data->category_name }}</a>
                        </li>
                    </ul>

                    <span id="busuanzi_container_page_pv" title="文章总阅读量" style="display: inline;">
                        <i class="icon icon-eye icon-pr"></i><span id="busuanzi_value_page_pv"></span>
                    </span>
                </div>

                <div class="post-content" id="post-content" itemprop="postContent">
                    {!! $data->html !!}
                </div>

                <blockquote class="post-copyright">
                    <div class="content">
                        <span class="post-time">
                            最后更新时间：<time datetime="{{ $data->updated_at }}" itemprop="dateUpdated">{{ $data->updated_at }}</time>
                        </span><br>
                        声明：{{ $config['COPYRIGHT_WORD'] }} <a href="http://www.hztion.com" target="_blank">{{ $config['WEB_NAME'] }}</a> 的博客
                    </div>
                    <footer>
                        <a href="/">
                            <img src="https://ww2.sinaimg.cn/large/0060lm7Tly1flwround5lj30dw0dwq31.jpg" alt="{{ $config['WEB_NAME'] }}">
                            {{ $config['WEB_NAME'] }}
                        </a>
                    </footer>
                </blockquote>

                <div class="post-footer">
                    <ul class="article-tag-list">
                        @foreach($data->tag as $val)
                            <li class="article-tag-list-item">
                                <a class="article-tag-list-link waves-effect waves-button" href="{{ url('tag', [$val->tag_id]) }}">{{ $val->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="page-share-wrap">
                        <div class="page-share" id="pageShare">
                            <ul class="reset share-icons">
                                <li>
                                    <a class="weibo share-sns" target="_blank" href="http://service.weibo.com/share/share.php?url={{ url()->current() }}&amp;title=@yield('title')@if(isset($data->cover))&amp;pic=http://www.hztion.com/{{ $data->cover }}@endif" data-title="微博">
                                        <i class="icon icon-weibo"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="weixin share-sns wxFab" href="javascript:;" data-title="微信"><i class="icon icon-weixin"></i></a>
                                </li>
                                <li>
                                    <a class="qq share-sns" target="_blank" href="http://connect.qq.com/widget/shareqq/index.html?url={{ url()->current() }}&amp;title=@yield('title')&amp;source=@yield('title')" data-title=" QQ">
                                        <i class="icon icon-qq"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="facebook share-sns" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" data-title=" Facebook">
                                        <i class="icon icon-facebook"></i>
                                    </a>
                                </li>
                                <li>   
                                    <a class="twitter share-sns" target="_blank" href="https://twitter.com/intent/tweet?text=@yield('title')&amp;url={{ url()->current() }}&amp;via={{ url()->current() }}" data-title=" Twitter">
                                        <i class="icon icon-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="google share-sns" target="_blank" href="https://plus.google.com/share?url={{ url()->current() }}" data-title=" Google+">
                                        <i class="icon icon-google-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <a href="javascript:;" id="shareFab" class="page-share-fab waves-effect waves-circle">
                            <i class="icon icon-share-alt icon-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <nav class="post-nav flex-row flex-justify-between">
                <div class="waves-block waves-effect prev">
                    @if(!is_null($prev))
                        <a href="{{ url('article', [$prev->id]) }}" id="post-prev" class="post-nav-link">
                            <div class="tips"><i class="icon icon-angle-left icon-lg icon-pr"></i> Prev</div>
                            <h4 class="title">{{ $prev->title }}</h4>
                        </a>
                    @endif
                </div>
                <div class="waves-block waves-effect next">
                    @if(!is_null($next))
                        <a href="{{ url('article', [$next->id]) }}" id="post-next" class="post-nav-link">
                            <div class="tips">Next <i class="icon icon-angle-right icon-lg icon-pl"></i></div>
                            <h4 class="title">{{ $next->title }}</h4>
                        </a>
                    @endif
                </div>
            </nav>
        </article>
    </div>
@endsection

@section('js')
    <script src="{{ asset('statics/prism/prism.min.js') }}"></script>
    <script>
        // 添加行数
        $('pre').addClass('line-numbers');

        // 定义评论url
        ajaxCommentUrl = "{{ url('comment') }}";
        checkLogin = "{{ url('checkLogin') }}";
        titleName = '{{ $config['WEB_NAME'] }}';
    </script>
    <script src="{{ asset('statics/layer-2.4/layer.js') }}"></script>
    <script src="{{ asset('js/home/comment.js') }}"></script>
@endsection