<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')@if(request()->path() !== '/') - {{ $config['WEB_TITLE'] }} @endif</title>
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="author" content="baijunyao,{{ htmlspecialchars_decode($config['ADMIN_EMAIL']) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home/style.css') }}">
    @yield('css')
</head>
<body>

<div id="loading" class=""></div>

<!-- 左侧导航开始 -->
<aside id="menu">
    <div class="inner flex-row-vertical">
        <a href="javascript:;" class="header-icon waves-effect waves-circle waves-light" id="menu-off">
            <i class="icon icon-lg icon-close"></i>
        </a>
        <div class="brand-wrap" style="background-image:url({{ asset('images/home/brand.jpg') }})">
            <div class="brand">
                <a href="/" class="avatar waves-effect waves-circle waves-light">
                    <img src="{{ asset('images/home/logo.jpg') }}">
                </a>
                <hgroup class="introduce">
                    <h5 class="nickname">{{ $config['WEB_NAME'] }}</h5>
                    <a href="mailto:{!! $config['ADMIN_EMAIL'] !!}" title="{!! $config['ADMIN_EMAIL'] !!}" class="mail">{!! $config['ADMIN_EMAIL'] !!}</a>
                </hgroup>
            </div>
        </div>
        <div class="scroll-wrap flex-col">
            <ul class="nav">
                <li class="waves-block waves-effect @if($current == 'index') active @endif">
                    <a href="/">
                        <i class="icon icon-lg icon-home"></i>Home
                    </a>
                </li>
            
                <li class="waves-block waves-effect @if($current == 'archives') active @endif">
                    <a href="{{ url('archives') }}">
                        <i class="icon icon-lg icon-archives"></i>Archives
                    </a>
                </li>
            
                <!-- <li class="waves-block waves-effect">
                    <a href="{{ url('catlist') }}">
                        <i class="icon icon-lg icon-th-list"></i>分类
                    </a>
                </li> -->

                <li class="waves-block waves-effect @if($current == 'tags') active @endif">
                    <a href="{{ url('tags') }}">
                        <i class="icon icon-lg icon-tags"></i>Tags
                    </a>
                </li>
            
                <li class="waves-block waves-effect">
                    <a href="https://github.com/hztion" target="_blank">
                        <i class="icon icon-lg icon-github"></i>Github
                    </a>
                </li>
            
                <li class="waves-block waves-effect">
                    <a href="http://weibo.com/u/2656172974" target="_blank">
                        <i class="icon icon-lg icon-weibo"></i>Weibo
                    </a>
                </li>
            
                <li class="waves-block waves-effect">
                    <a href="{{ url('chat') }}" target="_blank">
                        <i class="icon icon-lg icon-link"></i>文档
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
<!-- 左侧导航结束 -->

<!-- 主体部分开始 -->
<main id="main">
    <header class="top-header" id="header">
        <div class="flex-row">
            <a href="javascript:;" class="header-icon waves-effect waves-circle waves-light on" id="menu-toggle">
              <i class="icon icon-lg icon-navicon"></i>
            </a>
            <div class="flex-col header-title ellipsis">{{ $topTitle }}</div>
            
            <div class="search-wrap" id="search-wrap">
                <a href="javascript:;" class="header-icon waves-effect waves-circle waves-light" id="back">
                    <i class="icon icon-lg icon-chevron-left"></i>
                </a>
                <input type="text" id="key" class="search-input" autocomplete="off" placeholder="Search">
                <a href="javascript:;" class="header-icon waves-effect waves-circle waves-light" id="search">
                    <i class="icon icon-lg icon-search"></i>
                </a>
            </div>
            
            <a href="javascript:;" class="header-icon waves-effect waves-circle waves-light" id="menuShare" style="display:none;">
                <i class="icon icon-lg icon-share-alt"></i>
            </a>

            @if(empty(session('user.name')))
                <a href="javascript:;" class="header-icon waves-effect waves-circle waves-light" id="menuLogin">
                    <i class="icon icon-lg icon-sign-in"></i>
                </a>
            @else
                <div class="user-info" id="menuLogin">
                    <span class="waves-effect"><img class="head-img" src="{{ session('user.avatar') }}" alt="{{ session('user.name') }}" title="{{ session('user.name') }}"  /></span>
                    <span class="waves-effect">{{ session('user.name') }}</span>
                    <a href="{{ url('auth/oauth/logout') }}" class="header-icon waves-effect waves-circle waves-light">
                        <i class="icon icon-lg icon-sign-out"></i>
                    </a>
                </div>
            @endif
        </div>
    </header>

    <!-- content start -->
    @yield('content')
    <!-- content end -->

    <!-- 通用底部开始 -->
    <footer class="footer">
        <div class="top">
            <p>
                <span id="busuanzi_container_site_uv" style="display: inline;">
                    站点总访客数：<span id="busuanzi_value_site_uv"></span>
                </span>
                <span id="busuanzi_container_site_pv" style="display: inline;">
                    站点总访问量：<span id="busuanzi_value_site_pv"></span>
                </span>
            </p>
            <p>
                <span><i class="icon icon-lg icon-gittip"></i></span>
                <span>种一棵树最好的时间是十年前，其次是现在。</span>
            </p>
        </div>
        <div class="bottom">
            <p>
                <span>{{ $config['WEB_NAME'] }} © 2017 - 2019</span>
                <span>
                    Power by <a href="http://hexo.io/" target="_blank">Hexo</a> Theme <a href="https://github.com/yscoder/hexo-theme-indigo" target="_blank">indigo</a>
                </span>
            </p>
        </div>
    </footer>
    <!-- 通用底部结束 -->

</main>
<!-- 主体部分结束 -->

<!-- 分享搜索结束 -->
<div class="mask" id="mask"></div>

<a href="javascript:;" id="gotop" class="waves-effect waves-circle waves-light">
    <span class="icon icon-lg icon-chevron-up"></span>
</a>

<div class="global-share" id="globalShare">
    <ul class="reset share-icons">
        <li class=" waves-effect waves-block">
            <a class="weibo share-sns" target="_blank" href="http://service.weibo.com/share/share.php?url={{ url()->current() }}&amp;title=@yield('title')@if(isset($data->cover))&amp;pic=http://www.hztion.com/{{ $data->cover }}@endif" data-title="微博">
                <i class="icon icon-weibo"></i>
            </a>
        </li>
        <li class=" waves-effect waves-block">
            <a class="weixin share-sns wxFab" href="javascript:;" data-title="微信">
                <i class="icon icon-weixin"></i>
            </a>
        </li>
        <li class=" waves-effect waves-block">
            <a class="qq share-sns" target="_blank" href="http://connect.qq.com/widget/shareqq/index.html?url={{ url()->current() }}&amp;title=@yield('title')&amp;source=@yield('title')" data-title=" QQ">
                <i class="icon icon-qq"></i>
            </a>
        </li>
        <li class=" waves-effect waves-block">
            <a class="facebook share-sns" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" data-title=" Facebook">
                <i class="icon icon-facebook"></i>
            </a>
        </li>
        <li class=" waves-effect waves-block">
            <a class="twitter share-sns" target="_blank" href="https://twitter.com/intent/tweet?text=@yield('title')&amp;url={{ url()->current() }}&amp;via={{ url()->current() }}" data-title=" Twitter">
                <i class="icon icon-twitter"></i>
            </a>
        </li>
        <li class=" waves-effect waves-block">
            <a class="google share-sns" target="_blank" href="https://plus.google.com/share?url={{ url()->current() }}" data-title=" Google+">
                <i class="icon icon-google-plus"></i>
            </a>
        </li>
    </ul>
</div>


<div class="page-modal wx-share" id="wxShare">
    <a class="close" href="javascript:;"><i class="icon icon-close"></i></a>
    <p>扫一扫，分享到微信</p>   
    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(240)->margin(0)->errorCorrection('H')->merge(asset('images/home/logo1.jpg'), .2, true)->generate(url()->current())) !!}" alt="微信分享二维码">     
</div>

<div class="search-panel" id="search-panel">
    <ul class="search-result" id="search-result"></ul>
</div>

<template id="search-tpl"></template>
<!-- 分享搜索结束 -->

<!-- 登录模态框开始 -->
<div class="global-share" id="globalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-title">———&emsp;登录方式&emsp;———</div>
    <ul class="reset share-icons">
        <li class=" waves-effect waves-block">
            <a class="qq share-sns" href="{{ url('auth/oauth/redirectToProvider/qq') }}" alt="QQ登录" data-title="QQ">
                <i class="icon icon-qq"></i>
            </a>
        </li>
        <li class=" waves-effect waves-block">
            <a class="weibo share-sns" href="{{ url('auth/oauth/redirectToProvider/weibo') }}" alt="微博登录" data-title="微博">
                <i class="icon icon-weibo"></i>
            </a>
        </li>
        <li class=" waves-effect waves-block">
            <a class="github share-sns" href="{{ url('auth/oauth/redirectToProvider/github') }}" alt="github登录" data-title="github">
                <i class="icon icon-github"></i>
            </a>
        </li>
    </ul>
</div>
<!-- 登录模态框结束 -->

<!-- 点击特效开始 -->
<canvas class="fireworks" style="position: fixed; left: 0px; top: 0px; z-index: 99999999; pointer-events: none; width: 1600px; height: 481px;" width="3200" height="962">
</canvas>
<!-- 点击特效结束 -->

<script src="{{ asset('statics/js/jquery-2.0.0.min.js') }}"></script>
<script>
    var BLOG = { ROOT: '/', SHARE: true, REWARD: false, LOGIN: true };

    logoutUrl="{:U('Home/User/logout')}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{ asset('statics/bootstrap-3.3.5/js/bootstrap.min.js') }}"></script>
<!--[if lt IE 9]>
<script src="{{ asset('statics/js/html5shiv.min.js') }}"></script>
<script src="{{ asset('statics/js/respond.min.js') }}"></script>
<![endif]-->
<script src="{{ asset('statics/pace/pace.min.js') }}"></script>
<script src="{{ asset('js/home/index.js') }}"></script>
<script src="{{ asset('js/home/waves.min.js') }}"></script>
<script src="{{ asset('js/home/main.min.js') }}"></script>
<script src="{{ asset('js/home/search.min.js') }}"></script>
<script src="{{ asset('js/home/busuanzi.pure.mini.js') }}"></script>
<script src="{{ asset('js/home/anime.min.js') }}"></script>
<script src="{{ asset('js/home/fireworks.js') }}"></script>

<!-- 百度页面自动提交开始 -->
<script>
    (function(){
         
    })();

    (function() {
        var OriginTitile = document.title, titleTime;
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                document.title = '(꒪Д꒪)ノ崩溃辣！';
                clearTimeout(titleTime);
            } else {
                document.title = '(つェ⊂)咦!又好了!';
                titleTime = setTimeout(function() {
                    document.title = OriginTitile;
                },2000);
            }
        });
    })();
</script>
<!-- 百度页面自动提交结束 -->

<!-- 百度统计开始 -->
{!! htmlspecialchars_decode($config['WEB_STATISTICS']) !!}
<!-- 百度统计结束 -->
@yield('js')
</body>
</html>
