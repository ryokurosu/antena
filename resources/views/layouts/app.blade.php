@if(url()->current() == url('/'))
@section('title',config('app.name'))
@section('description'){{config('app.name')}}では @php echo \App\Word::where('id','>',0)->take(20)->get()->implode('text',','); @endphp についての情報がまとめられてます。@stop
@else
@section('title')-{{config('app.name')}}@append
@section('description')。{{config('app.name')}}では @php echo \App\Word::where('id','>',0)->take(20)->get()->implode('text',','); @endphp についての情報がまとめられてます。@append
@endif



<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>

	<style>
	html{font-family:arial,sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background-color:transparent}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:700}dfn{font-style:italic}h1{font-size:2em;margin:.67em 0}mark{background:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-.5em}sub{bottom:-.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}hr{-webkit-box-sizing:content-box;box-sizing:content-box;height:0}pre{overflow:auto}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type=button],input[type=reset],input[type=submit]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type=checkbox],input[type=radio]{-webkit-box-sizing:border-box;box-sizing:border-box;padding:0}input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{height:auto}input[type=search]{-webkit-appearance:textfield;-webkit-box-sizing:content-box;box-sizing:content-box}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}textarea{overflow:auto}optgroup{font-weight:700}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}@media print{*,:after,:before{background:transparent!important;color:#000!important;-webkit-box-shadow:none!important;box-shadow:none!important;text-shadow:none!important}a,a:visited{text-decoration:underline}a[href]:after{content:" (" attr(href) ")"}abbr[title]:after{content:" (" attr(title) ")"}a[href^="#"]:after,a[href^="javascript:"]:after{content:""}blockquote,pre{border:1px solid #999;page-break-inside:avoid}thead{display:table-header-group}img,tr{page-break-inside:avoid}img{max-width:100%!important}h2,h3,p{orphans:3;widows:3}h2,h3{page-break-after:avoid}.navbar{display:none}.btn>.caret,.dropup>.btn>.caret{border-top-color:#000!important}.label{border:1px solid #000}}*,:after,:before{-webkit-box-sizing:border-box;box-sizing:border-box}html{font-size:10px;-webkit-tap-highlight-color:transparent}body{font-family:arial,sans-serif;font-size:16px;line-height:1.6;color:#636b6f;background-color:#f5f8fa}button,input,select,textarea{font-family:inherit;font-size:inherit;line-height:inherit}a{color:#3097d1;text-decoration:none}a:focus,a:hover{color:#216a94;text-decoration:underline}a:focus{outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}figure{margin:0}img{vertical-align:middle;max-width:100%;height:auto}.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6{font-family:inherit;font-weight:500;line-height:1.4;color:inherit}.h1,.h2,.h3,h1,h2,h3{margin-top:22px;margin-bottom:11px}.h4,.h5,.h6,h4,h5,h6{margin-top:11px;margin-bottom:11px}.h1,h1{font-size:24px}.h2,h2{font-size:30px}.h3,h3{font-size:24px}.h4,h4{font-size:18px}.h5,h5{font-size:14px}.h6,h6{font-size:12px}p{margin:0 0 11px}.lead{margin-bottom:22px;font-size:16px;font-weight:300;line-height:1.4}@media (min-width:768px){.lead{font-size:21px}}.small,small{font-size:85%}.mark,mark{background-color:#fcf8e3;padding:.2em}.text-left{text-align:left}.text-right{text-align:right}.text-center{text-align:center}.text-justify{text-align:justify}.text-nowrap{white-space:nowrap}.text-lowercase{text-transform:lowercase}.initialism,.text-uppercase{text-transform:uppercase}.text-capitalize{text-transform:capitalize}.text-muted{color:#888}.page-header{padding-bottom:10px;margin:44px 0 22px;border-bottom:1px solid #eee}ol,ul{margin-top:0;margin-bottom:11px}ol ol,ol ul,ul ol,ul ul{margin-bottom:0}.container{margin-right:auto;margin-left:auto;padding-left:15px;padding-right:15px}.container:after,.container:before{content:" ";display:table}.container:after{clear:both}@media (min-width:768px){.container{width:750px}}@media (min-width:992px){.container{width:970px}}@media (min-width:1200px){.container{width:1170px}}.row{margin-left:-15px;margin-right:-15px}.row:after,.row:before{content:" ";display:table}.row:after{clear:both}.col-lg-1,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-lg-10,.col-lg-11,.col-lg-12,.col-md-1,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-10,.col-md-11,.col-md-12,.col-sm-1,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-10,.col-sm-11,.col-sm-12,.col-xs-1,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9,.col-xs-10,.col-xs-11,.col-xs-12{position:relative;min-height:1px;padding-left:15px;padding-right:15px}.col-xs-1,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9,.col-xs-10,.col-xs-11,.col-xs-12{display:inline-block;vertical-align:top}.col-xs-1{width:8%}.col-xs-2{width:16.66666667%}.col-xs-3{width:22.5%}.col-xs-4{width:33.33333333%}.col-xs-5{width:41.66666667%}.col-xs-6{width:50%}.col-xs-7{width:58.33333333%}.col-xs-8{width:66.66666667%}.col-xs-9{width:74%}.col-xs-10{width:83%}.col-xs-11{width:88%}.col-xs-12{width:100%}.col-xs-offset-0{margin-left:0}.col-xs-offset-1{margin-left:8.33333333%}.col-xs-offset-2{margin-left:16.66666667%}.col-xs-offset-3{margin-left:25%}.col-xs-offset-4{margin-left:33.33333333%}.col-xs-offset-5{margin-left:41.66666667%}.col-xs-offset-6{margin-left:50%}.col-xs-offset-7{margin-left:58.33333333%}.col-xs-offset-8{margin-left:66.66666667%}.col-xs-offset-9{margin-left:75%}.col-xs-offset-10{margin-left:83.33333333%}.col-xs-offset-11{margin-left:91.66666667%}.col-xs-offset-12{margin-left:100%}@media (min-width:768px){.col-sm-1,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-10,.col-sm-11,.col-sm-12{float:left}.col-sm-1{width:8.33333333%}.col-sm-2{width:16.66666667%}.col-sm-3{width:25%}.col-sm-4{width:33.33333333%}.col-sm-5{width:41.66666667%}.col-sm-6{width:50%}.col-sm-7{width:58.33333333%}.col-sm-8{width:66.66666667%}.col-sm-9{width:75%}.col-sm-10{width:83.33333333%}.col-sm-11{width:91.66666667%}.col-sm-12{width:100%}.col-sm-offset-0{margin-left:0}.col-sm-offset-1{margin-left:8.33333333%}.col-sm-offset-2{margin-left:16.66666667%}.col-sm-offset-3{margin-left:25%}.col-sm-offset-4{margin-left:33.33333333%}.col-sm-offset-5{margin-left:41.66666667%}.col-sm-offset-6{margin-left:50%}.col-sm-offset-7{margin-left:58.33333333%}.col-sm-offset-8{margin-left:66.66666667%}.col-sm-offset-9{margin-left:75%}.col-sm-offset-10{margin-left:83.33333333%}.col-sm-offset-11{margin-left:91.66666667%}.col-sm-offset-12{margin-left:100%}}@media (min-width:992px){.col-md-1,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-10,.col-md-11,.col-md-12{display:inline-block}.col-md-1{width:8.33333333%}.col-md-2{width:16.66666667%}.col-md-3{width:25%}.col-md-4{width:32.4%}.col-md-5{width:41.66666667%}.col-md-6{width:49%}.col-md-7{width:58.33333333%}.col-md-8{width:66.66666667%}.col-md-9{width:75%}.col-md-10{width:83.33333333%}.col-md-11{width:91.66666667%}.col-md-12{width:100%}.col-md-offset-0{margin-left:0}.col-md-offset-1{margin-left:8.33333333%}.col-md-offset-2{margin-left:16.66666667%}.col-md-offset-3{margin-left:25%}.col-md-offset-4{margin-left:33.33333333%}.col-md-offset-5{margin-left:41.66666667%}.col-md-offset-6{margin-left:50%}.col-md-offset-7{margin-left:58.33333333%}.col-md-offset-8{margin-left:66.66666667%}.col-md-offset-9{margin-left:75%}.col-md-offset-10{margin-left:83.33333333%}.col-md-offset-11{margin-left:91.66666667%}.col-md-offset-12{margin-left:100%}}.btn{display:inline-block;margin-bottom:0;font-weight:400;text-align:center;vertical-align:middle;-ms-touch-action:manipulation;touch-action:manipulation;cursor:pointer;background-image:none;border:1px solid transparent;white-space:nowrap;padding:6px 12px;font-size:14px;line-height:1.6;border-radius:4px;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.btn.active.focus,.btn.active:focus,.btn.focus,.btn:active.focus,.btn:active:focus,.btn:focus{outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}.btn.focus,.btn:focus,.btn:hover{color:#636b6f;text-decoration:none}.btn.active,.btn:active{outline:0;background-image:none;-webkit-box-shadow:inset 0 3px 5px rgba(0,0,0,.125);box-shadow:inset 0 3px 5px rgba(0,0,0,.125)}.btn.disabled,.btn[disabled],fieldset[disabled] .btn{cursor:not-allowed;opacity:.65;filter:alpha(opacity=65);-webkit-box-shadow:none;box-shadow:none}a.btn.disabled,fieldset[disabled] a.btn{pointer-events:none}.btn-default{color:#636b6f;background-color:#fff;border-color:#ccc}.btn-default.focus,.btn-default:focus{color:#636b6f;background-color:#e6e5e5;border-color:#8c8c8c}.btn-default.active,.btn-default:active,.btn-default:hover,.open>.btn-default.dropdown-toggle{color:#636b6f;background-color:#e6e5e5;border-color:#adadad}.btn-default.active.focus,.btn-default.active:focus,.btn-default.active:hover,.btn-default:active.focus,.btn-default:active:focus,.btn-default:active:hover,.open>.btn-default.dropdown-toggle.focus,.open>.btn-default.dropdown-toggle:focus,.open>.btn-default.dropdown-toggle:hover{color:#636b6f;background-color:#d4d4d4;border-color:#8c8c8c}.btn-default.active,.btn-default:active,.open>.btn-default.dropdown-toggle{background-image:none}.btn-default.disabled.focus,.btn-default.disabled:focus,.btn-default.disabled:hover,.btn-default[disabled].focus,.btn-default[disabled]:focus,.btn-default[disabled]:hover,fieldset[disabled] .btn-default.focus,fieldset[disabled] .btn-default:focus,fieldset[disabled] .btn-default:hover{background-color:#fff;border-color:#ccc}.btn-default .badge{color:#fff;background-color:#636b6f}.btn-primary{color:#fff;background-color:#3097d1;border-color:#2a88bd}.btn-primary.focus,.btn-primary:focus{color:#fff;background-color:#2579a9;border-color:#133d55}.btn-primary.active,.btn-primary:active,.btn-primary:hover,.open>.btn-primary.dropdown-toggle{color:#fff;background-color:#2579a9;border-color:#1f648b}.btn-primary.active.focus,.btn-primary.active:focus,.btn-primary.active:hover,.btn-primary:active.focus,.btn-primary:active:focus,.btn-primary:active:hover,.open>.btn-primary.dropdown-toggle.focus,.open>.btn-primary.dropdown-toggle:focus,.open>.btn-primary.dropdown-toggle:hover{color:#fff;background-color:#1f648b;border-color:#133d55}.btn-primary.active,.btn-primary:active,.open>.btn-primary.dropdown-toggle{background-image:none}.btn-primary.disabled.focus,.btn-primary.disabled:focus,.btn-primary.disabled:hover,.btn-primary[disabled].focus,.btn-primary[disabled]:focus,.btn-primary[disabled]:hover,fieldset[disabled] .btn-primary.focus,fieldset[disabled] .btn-primary:focus,fieldset[disabled] .btn-primary:hover{background-color:#3097d1;border-color:#2a88bd}.btn-primary .badge{color:#3097d1;background-color:#fff}.btn-block{display:block;width:100%}.btn-block+.btn-block{margin-top:5px}input[type=button].btn-block,input[type=reset].btn-block,input[type=submit].btn-block{width:100%}.caret{display:inline-block;width:0;height:0;margin-left:2px;vertical-align:middle;border-top:4px dashed;border-top:4px solid\9;border-right:4px solid transparent;border-left:4px solid transparent}.navbar-right .dropdown-menu-left{left:0;right:auto}.btn .caret{margin-left:0}.input-group{position:relative;display:table;border-collapse:separate}.input-group[class*=col-]{float:none;padding-left:0;padding-right:0}.input-group .form-control{position:relative;z-index:2;float:left;width:100%;margin-bottom:0}.input-group .form-control:focus{z-index:3}.nav{margin-bottom:0;padding-left:0;list-style:none}.nav:after,.nav:before{content:" ";display:table}.nav:after{clear:both}.nav>li,.nav>li>a{position:relative;display:block}.nav>li>a{padding:10px 15px}.nav>li>a:focus,.nav>li>a:hover{text-decoration:none;background-color:#eee}.nav>li.disabled>a{color:#777}.nav>li.disabled>a:focus,.nav>li.disabled>a:hover{color:#777;text-decoration:none;background-color:transparent;cursor:not-allowed}.nav .open>a,.nav .open>a:focus,.nav .open>a:hover{background-color:#eee;border-color:#3097d1}.nav .nav-divider{height:1px;margin:10px 0;overflow:hidden;background-color:#e5e5e5}.nav>li>a>img{max-width:none}.tab-content>.tab-pane{display:none}.tab-content>.active{display:block}.nav-tabs .dropdown-menu{margin-top:-1px;border-top-right-radius:0;border-top-left-radius:0}.navbar{position:relative;min-height:50px;margin-bottom:22px;border:1px solid transparent}.navbar:after,.navbar:before{content:" ";display:table}.navbar:after{clear:both}@media (min-width:768px){.navbar{border-radius:4px}}.navbar-header:after,.navbar-header:before{content:" ";display:table}.navbar-header:after{clear:both}@media (min-width:768px){.navbar-header{float:left}}.navbar-collapse{overflow-x:visible;padding-right:15px;padding-left:15px;border-top:1px solid transparent;-webkit-box-shadow:inset 0 1px 0 hsla(0,0%,100%,.1);box-shadow:inset 0 1px 0 hsla(0,0%,100%,.1);-webkit-overflow-scrolling:touch}.navbar-collapse:after,.navbar-collapse:before{content:" ";display:table}.navbar-collapse:after{clear:both}.navbar-collapse.in{overflow-y:auto}@media (min-width:768px){.navbar-collapse{width:auto;border-top:0;-webkit-box-shadow:none;box-shadow:none}.navbar-collapse.collapse{display:block!important;height:auto!important;padding-bottom:0;overflow:visible!important}.navbar-collapse.in{overflow-y:visible}.navbar-fixed-bottom .navbar-collapse,.navbar-fixed-top .navbar-collapse,.navbar-static-top .navbar-collapse{padding-left:0;padding-right:0}}.navbar-fixed-bottom .navbar-collapse,.navbar-fixed-top .navbar-collapse{max-height:340px}@media (max-device-width:480px) and (orientation:landscape){.navbar-fixed-bottom .navbar-collapse,.navbar-fixed-top .navbar-collapse{max-height:200px}}.container-fluid>.navbar-collapse,.container-fluid>.navbar-header,.container>.navbar-collapse,.container>.navbar-header{margin-right:-15px;margin-left:-15px}@media (min-width:768px){.container-fluid>.navbar-collapse,.container-fluid>.navbar-header,.container>.navbar-collapse,.container>.navbar-header{margin-right:0;margin-left:0}}.navbar-static-top{z-index:1000;border-width:0 0 1px}@media (min-width:768px){.navbar-static-top{border-radius:0}}.navbar-fixed-bottom,.navbar-fixed-top{position:fixed;right:0;left:0;z-index:1030}@media (min-width:768px){.navbar-fixed-bottom,.navbar-fixed-top{border-radius:0}}.navbar-fixed-top{top:0;border-width:0 0 1px}.navbar-fixed-bottom{bottom:0;margin-bottom:0;border-width:1px 0 0}.navbar-brand{float:left;padding:14px 15px;font-size:18px;line-height:22px;height:50px}.navbar-brand:focus,.navbar-brand:hover{text-decoration:none}.navbar-brand>img{display:block}@media (min-width:768px){.navbar>.container-fluid .navbar-brand,.navbar>.container .navbar-brand{margin-left:-15px}}.navbar-toggle{position:relative;float:right;margin-right:15px;padding:9px 10px;margin-top:8px;margin-bottom:8px;background-color:transparent;background-image:none;border:1px solid transparent;border-radius:4px}.navbar-toggle:focus{outline:0}.navbar-toggle .icon-bar{display:block;width:22px;height:2px;border-radius:1px}.navbar-toggle .icon-bar+.icon-bar{margin-top:4px}@media (min-width:768px){.navbar-toggle{display:none}}.navbar-nav{margin:7px -15px}.navbar-nav>li>a{padding-top:10px;padding-bottom:10px;line-height:22px}@media (max-width:767px){.navbar-nav .open .dropdown-menu{position:static;float:none;width:auto;margin-top:0;background-color:transparent;border:0;-webkit-box-shadow:none;box-shadow:none}.navbar-nav .open .dropdown-menu .dropdown-header,.navbar-nav .open .dropdown-menu>li>a{padding:5px 15px 5px 25px}.navbar-nav .open .dropdown-menu>li>a{line-height:22px}.navbar-nav .open .dropdown-menu>li>a:focus,.navbar-nav .open .dropdown-menu>li>a:hover{background-image:none}}@media (min-width:768px){.navbar-nav{float:left;margin:0}.navbar-nav>li{float:left}.navbar-nav>li>a{padding-top:14px;padding-bottom:14px}}.navbar-nav>li>.dropdown-menu{margin-top:0;border-top-right-radius:0;border-top-left-radius:0}.navbar-fixed-bottom .navbar-nav>li>.dropdown-menu{margin-bottom:0;border-top-right-radius:4px;border-top-left-radius:4px;border-bottom-right-radius:0;border-bottom-left-radius:0}.navbar-btn{margin-top:7px;margin-bottom:7px}.navbar-right{float:right!important;margin-right:-15px}.navbar-right~.navbar-right{margin-right:0}.navbar-default{background-color:#fff;border-color:#d3e0e9}.navbar-default .navbar-brand{color:#777}.navbar-default .navbar-brand:focus,.navbar-default .navbar-brand:hover{color:#5e5d5d;background-color:transparent}.navbar-default .navbar-nav>li>a,.navbar-default .navbar-text{color:#777}.navbar-default .navbar-nav>li>a:focus,.navbar-default .navbar-nav>li>a:hover{color:#333;background-color:transparent}.navbar-default .navbar-nav>.active>a,.navbar-default .navbar-nav>.active>a:focus,.navbar-default .navbar-nav>.active>a:hover{color:#555;background-color:#eee}.navbar-default .navbar-nav>.disabled>a,.navbar-default .navbar-nav>.disabled>a:focus,.navbar-default .navbar-nav>.disabled>a:hover{color:#ccc;background-color:transparent}.navbar-default .navbar-toggle{border-color:#ddd}.navbar-default .navbar-toggle:focus,.navbar-default .navbar-toggle:hover{background-color:#ddd}.navbar-default .navbar-toggle .icon-bar{background-color:#888}.navbar-default .navbar-nav>.open>a,.navbar-default .navbar-nav>.open>a:focus,.navbar-default .navbar-nav>.open>a:hover{background-color:#eee;color:#555}@media (max-width:767px){.navbar-default .navbar-nav .open .dropdown-menu>li>a{color:#777}.navbar-default .navbar-nav .open .dropdown-menu>li>a:focus,.navbar-default .navbar-nav .open .dropdown-menu>li>a:hover{color:#333;background-color:transparent}.navbar-default .navbar-nav .open .dropdown-menu>.active>a,.navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus,.navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover{color:#555;background-color:#eee}.navbar-default .navbar-nav .open .dropdown-menu>.disabled>a,.navbar-default .navbar-nav .open .dropdown-menu>.disabled>a:focus,.navbar-default .navbar-nav .open .dropdown-menu>.disabled>a:hover{color:#ccc;background-color:transparent}}.navbar-default .navbar-link{color:#777}.navbar-default .navbar-link:hover{color:#333}.navbar-default .btn-link{color:#777}.navbar-default .btn-link:focus,.navbar-default .btn-link:hover{color:#333}.navbar-default .btn-link[disabled]:focus,.navbar-default .btn-link[disabled]:hover,fieldset[disabled] .navbar-default .btn-link:focus,fieldset[disabled] .navbar-default .btn-link:hover{color:#ccc}.breadcrumb{padding:8px 15px;margin-bottom:22px;list-style:none;background-color:#f5f5f5;border-radius:4px}.breadcrumb>li{display:inline-block}.breadcrumb>li+li:before{content:"/\A0";padding:0 5px;color:#ccc}.breadcrumb>.active{color:#777}.pagination{display:inline-block;padding-left:0;margin:22px 0;border-radius:4px}.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;line-height:1.6;text-decoration:none;color:#3097d1;background-color:#fff;border:1px solid #ddd;margin-left:-1px}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-bottom-left-radius:4px;border-top-left-radius:4px}.pagination>li:last-child>a,.pagination>li:last-child>span{border-bottom-right-radius:4px;border-top-right-radius:4px}.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:2;color:#216a94;background-color:#eee;border-color:#ddd}.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:3;color:#fff;background-color:#3097d1;border-color:#3097d1;cursor:default}.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{color:#777;background-color:#fff;border-color:#ddd;cursor:not-allowed}.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px;line-height:1.3333333}.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-bottom-left-radius:6px;border-top-left-radius:6px}.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-bottom-right-radius:6px;border-top-right-radius:6px}.pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px;line-height:1.5}.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-bottom-left-radius:3px;border-top-left-radius:3px}.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-bottom-right-radius:3px;border-top-right-radius:3px}.pager{padding-left:0;margin:22px 0;list-style:none;text-align:center}.pager:after,.pager:before{content:" ";display:table}.pager:after{clear:both}.pager li{display:inline}.pager li>a,.pager li>span{display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px}.pager li>a:focus,.pager li>a:hover{text-decoration:none;background-color:#eee}.pager .next>a,.pager .next>span{float:right}.pager .previous>a,.pager .previous>span{float:left}.pager .disabled>a,.pager .disabled>a:focus,.pager .disabled>a:hover,.pager .disabled>span{color:#777;background-color:#fff;cursor:not-allowed}.label{display:inline;padding:.2em .6em .3em;font-size:75%;font-weight:700;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:.25em}.label:empty{display:none}.btn .label{position:relative;top:-1px}a.label:focus,a.label:hover{color:#fff;text-decoration:none;cursor:pointer}.label-default{background-color:#777}.label-default[href]:focus,.label-default[href]:hover{background-color:#5e5e5e}.label-primary{background-color:#3097d1}.label-primary[href]:focus,.label-primary[href]:hover{background-color:#2579a9}.label-success{background-color:#2ab27b}.label-success[href]:focus,.label-success[href]:hover{background-color:#20895e}.label-info{background-color:#8eb4cb}.label-info[href]:focus,.label-info[href]:hover{background-color:#6b9dbb}.label-danger{background-color:#bf5329}.label-danger[href]:focus,.label-danger[href]:hover{background-color:#954120}.badge{display:inline-block;min-width:10px;padding:3px 7px;font-size:12px;font-weight:700;color:#fff;line-height:1;vertical-align:middle;white-space:nowrap;text-align:center;background-color:#777;border-radius:10px}.badge:empty{display:none}.btn .badge{position:relative;top:-1px}.list-group-item.active>.badge,.nav-pills>.active>a>.badge{color:#3097d1;background-color:#fff}.list-group-item>.badge{float:right}.list-group-item>.badge+.badge{margin-right:5px}.nav-pills>li>a>.badge{margin-left:3px}a.badge:focus,a.badge:hover{color:#fff;text-decoration:none;cursor:pointer}.thumbnail{padding:0!important;padding-right:15px!important;padding-bottom:5px!important}.thumbnail>img,.thumbnail a>img{display:block;max-width:100%;height:auto;margin-left:auto;margin-right:auto;max-height:80px}.thumbnail .caption{padding:9px;color:#636b6f}a.thumbnail.active,a.thumbnail:focus,a.thumbnail:hover{border-color:#3097d1}.list-group{margin-bottom:20px;padding-left:0}.list-group-item{position:relative;display:block;padding:12px 15px 16px;background:#fff;border-bottom:1px solid #eee}.list-group-item:first-child{border-top-right-radius:4px;border-top-left-radius:4px}.list-group-item:last-child{margin-bottom:0;border-bottom-right-radius:4px;border-bottom-left-radius:4px;border:none}a.list-group-item,button.list-group-item{color:#555}a.list-group-item .list-group-item-heading,button.list-group-item .list-group-item-heading{color:#333}a.list-group-item:focus,a.list-group-item:hover,button.list-group-item:focus,button.list-group-item:hover{text-decoration:none;color:#555;background-color:#f5f5f5}button.list-group-item{width:100%;text-align:left}.list-group-item.disabled,.list-group-item.disabled:focus,.list-group-item.disabled:hover{background-color:#eee;color:#777;cursor:not-allowed}.list-group-item.disabled .list-group-item-heading,.list-group-item.disabled:focus .list-group-item-heading,.list-group-item.disabled:hover .list-group-item-heading{color:inherit}.list-group-item.disabled .list-group-item-text,.list-group-item.disabled:focus .list-group-item-text,.list-group-item.disabled:hover .list-group-item-text{color:#777}.list-group-item.active,.list-group-item.active:focus,.list-group-item.active:hover{z-index:2;color:#777;text-align:center;background:transparent;letter-spacing:2px;font-weight:700;padding:32px 15px;font-size:1.3em;font-weight:400}.list-group-item.active .list-group-item-heading,.list-group-item.active .list-group-item-heading>.small,.list-group-item.active .list-group-item-heading>small,.list-group-item.active:focus .list-group-item-heading,.list-group-item.active:focus .list-group-item-heading>.small,.list-group-item.active:focus .list-group-item-heading>small,.list-group-item.active:hover .list-group-item-heading,.list-group-item.active:hover .list-group-item-heading>.small,.list-group-item.active:hover .list-group-item-heading>small{color:inherit}.list-group-item.active .list-group-item-text,.list-group-item.active:focus .list-group-item-text,.list-group-item.active:hover .list-group-item-text{color:#d7ebf6}.list-group-item-success{color:#3c763d;background-color:#dff0d8}a.list-group-item-success,button.list-group-item-success{color:#3c763d}a.list-group-item-success .list-group-item-heading,button.list-group-item-success .list-group-item-heading{color:inherit}a.list-group-item-success:focus,a.list-group-item-success:hover,button.list-group-item-success:focus,button.list-group-item-success:hover{color:#3c763d;background-color:#d0e9c6}a.list-group-item-success.active,a.list-group-item-success.active:focus,a.list-group-item-success.active:hover,button.list-group-item-success.active,button.list-group-item-success.active:focus,button.list-group-item-success.active:hover{color:#fff;background-color:#3c763d;border-color:#3c763d}.list-group-item-info{color:#31708f;background-color:#d9edf7}a.list-group-item-info,button.list-group-item-info{color:#31708f}a.list-group-item-info .list-group-item-heading,button.list-group-item-info .list-group-item-heading{color:inherit}a.list-group-item-info:focus,a.list-group-item-info:hover,button.list-group-item-info:focus,button.list-group-item-info:hover{color:#31708f;background-color:#c4e3f3}a.list-group-item-info.active,a.list-group-item-info.active:focus,a.list-group-item-info.active:hover,button.list-group-item-info.active,button.list-group-item-info.active:focus,button.list-group-item-info.active:hover{color:#fff;background-color:#31708f;border-color:#31708f}.list-group-item-danger{color:#a94442;background-color:#f2dede}a.list-group-item-danger,button.list-group-item-danger{color:#a94442}a.list-group-item-danger .list-group-item-heading,button.list-group-item-danger .list-group-item-heading{color:inherit}a.list-group-item-danger:focus,a.list-group-item-danger:hover,button.list-group-item-danger:focus,button.list-group-item-danger:hover{color:#a94442;background-color:#ebcccc}a.list-group-item-danger.active,a.list-group-item-danger.active:focus,a.list-group-item-danger.active:hover,button.list-group-item-danger.active,button.list-group-item-danger.active:focus,button.list-group-item-danger.active:hover{color:#fff;background-color:#a94442;border-color:#a94442}.list-group-item-heading{margin-top:0;margin-bottom:5px}.list-group-item-text{margin-bottom:0;line-height:1.3}.panel{margin-bottom:22px;background-color:#fff;border-radius:4px;-webkit-box-shadow:0 1px 1px rgba(0,0,0,.05);box-shadow:0 1px 1px rgba(0,0,0,.05)}.panel-body{padding:15px}.panel-body:after,.panel-body:before{content:" ";display:table}.panel-body:after{clear:both}.panel-heading{padding:10px 15px;border-top-right-radius:3px;border-top-left-radius:3px}.panel-heading>.dropdown .dropdown-toggle,.panel-title{color:inherit}.panel-title{margin-top:0;margin-bottom:0;font-size:16px}.panel-title>.small,.panel-title>.small>a,.panel-title>a,.panel-title>small,.panel-title>small>a{color:inherit}.panel-footer{padding:10px 15px;background-color:#f5f5f5;border-top:1px solid #d3e0e9;border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.list-group,.panel>.panel-collapse>.list-group{margin-bottom:0}.panel>.list-group .list-group-item,.panel>.panel-collapse>.list-group .list-group-item{border-width:1px 0;border-radius:0}.panel>.list-group:first-child .list-group-item:first-child,.panel>.panel-collapse>.list-group:first-child .list-group-item:first-child{border-top:0;border-top-right-radius:3px;border-top-left-radius:3px}.panel>.list-group:last-child .list-group-item:last-child,.panel>.panel-collapse>.list-group:last-child .list-group-item:last-child{border-bottom:0;border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.panel-heading+.panel-collapse>.list-group .list-group-item:first-child{border-top-right-radius:0;border-top-left-radius:0}.list-group+.panel-footer,.panel-heading+.list-group .list-group-item:first-child{border-top-width:0}.panel>.panel-collapse>.table,.panel>.table,.panel>.table-responsive>.table{margin-bottom:0}.panel>.panel-collapse>.table caption,.panel>.table-responsive>.table caption,.panel>.table caption{padding-left:15px;padding-right:15px}.panel>.table-responsive:first-child>.table:first-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child,.panel>.table:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child,.panel>.table:first-child>thead:first-child>tr:first-child{border-top-right-radius:3px;border-top-left-radius:3px}.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:first-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child td:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child th:first-child,.panel>.table:first-child>thead:first-child>tr:first-child td:first-child,.panel>.table:first-child>thead:first-child>tr:first-child th:first-child{border-top-left-radius:3px}.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:last-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:last-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:last-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:last-child,.panel>.table:first-child>tbody:first-child>tr:first-child td:last-child,.panel>.table:first-child>tbody:first-child>tr:first-child th:last-child,.panel>.table:first-child>thead:first-child>tr:first-child td:last-child,.panel>.table:first-child>thead:first-child>tr:first-child th:last-child{border-top-right-radius:3px}.panel>.table-responsive:last-child>.table:last-child,.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child,.panel>.table:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child{border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:first-child,.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:first-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:first-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:first-child,.panel>.table:last-child>tbody:last-child>tr:last-child td:first-child,.panel>.table:last-child>tbody:last-child>tr:last-child th:first-child,.panel>.table:last-child>tfoot:last-child>tr:last-child td:first-child,.panel>.table:last-child>tfoot:last-child>tr:last-child th:first-child{border-bottom-left-radius:3px}.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:last-child,.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child td:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child th:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child td:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child th:last-child{border-bottom-right-radius:3px}.panel>.panel-body+.table,.panel>.panel-body+.table-responsive,.panel>.table+.panel-body,.panel>.table-responsive+.panel-body{border-top:1px solid #ddd}.panel>.table>tbody:first-child>tr:first-child td,.panel>.table>tbody:first-child>tr:first-child th{border-top:0}.panel>.table-bordered,.panel>.table-responsive>.table-bordered{border:0}.panel>.table-bordered>tbody>tr>td:first-child,.panel>.table-bordered>tbody>tr>th:first-child,.panel>.table-bordered>tfoot>tr>td:first-child,.panel>.table-bordered>tfoot>tr>th:first-child,.panel>.table-bordered>thead>tr>td:first-child,.panel>.table-bordered>thead>tr>th:first-child,.panel>.table-responsive>.table-bordered>tbody>tr>td:first-child,.panel>.table-responsive>.table-bordered>tbody>tr>th:first-child,.panel>.table-responsive>.table-bordered>tfoot>tr>td:first-child,.panel>.table-responsive>.table-bordered>tfoot>tr>th:first-child,.panel>.table-responsive>.table-bordered>thead>tr>td:first-child,.panel>.table-responsive>.table-bordered>thead>tr>th:first-child{border-left:0}.panel>.table-bordered>tbody>tr>td:last-child,.panel>.table-bordered>tbody>tr>th:last-child,.panel>.table-bordered>tfoot>tr>td:last-child,.panel>.table-bordered>tfoot>tr>th:last-child,.panel>.table-bordered>thead>tr>td:last-child,.panel>.table-bordered>thead>tr>th:last-child,.panel>.table-responsive>.table-bordered>tbody>tr>td:last-child,.panel>.table-responsive>.table-bordered>tbody>tr>th:last-child,.panel>.table-responsive>.table-bordered>tfoot>tr>td:last-child,.panel>.table-responsive>.table-bordered>tfoot>tr>th:last-child,.panel>.table-responsive>.table-bordered>thead>tr>td:last-child,.panel>.table-responsive>.table-bordered>thead>tr>th:last-child{border-right:0}.panel>.table-bordered>tbody>tr:first-child>td,.panel>.table-bordered>tbody>tr:first-child>th,.panel>.table-bordered>tbody>tr:last-child>td,.panel>.table-bordered>tbody>tr:last-child>th,.panel>.table-bordered>tfoot>tr:last-child>td,.panel>.table-bordered>tfoot>tr:last-child>th,.panel>.table-bordered>thead>tr:first-child>td,.panel>.table-bordered>thead>tr:first-child>th,.panel>.table-responsive>.table-bordered>tbody>tr:first-child>td,.panel>.table-responsive>.table-bordered>tbody>tr:first-child>th,.panel>.table-responsive>.table-bordered>tbody>tr:last-child>td,.panel>.table-responsive>.table-bordered>tbody>tr:last-child>th,.panel>.table-responsive>.table-bordered>tfoot>tr:last-child>td,.panel>.table-responsive>.table-bordered>tfoot>tr:last-child>th,.panel>.table-responsive>.table-bordered>thead>tr:first-child>td,.panel>.table-responsive>.table-bordered>thead>tr:first-child>th{border-bottom:0}.panel>.table-responsive{border:0;margin-bottom:0}.panel-group{margin-bottom:22px}.panel-group .panel{margin-bottom:0;border-radius:4px}.panel-group .panel+.panel{margin-top:5px}.panel-group .panel-heading{border-bottom:0}.panel-group .panel-heading+.panel-collapse>.list-group,.panel-group .panel-heading+.panel-collapse>.panel-body{border-top:1px solid #d3e0e9}.panel-group .panel-footer{border-top:0}.panel-group .panel-footer+.panel-collapse .panel-body{border-bottom:1px solid #d3e0e9}.panel-default>.panel-heading{color:#333;background-color:#fff}.panel-default>.panel-heading+.panel-collapse>.panel-body{border-top-color:#d3e0e9}.panel-default>.panel-heading .badge{color:#fff;background-color:#333}.panel-default>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#d3e0e9}.close{float:right;font-size:21px;font-weight:700;line-height:1;color:#000;text-shadow:0 1px 0 #fff;opacity:.2;filter:alpha(opacity=20)}.close:focus,.close:hover{color:#000;text-decoration:none;cursor:pointer;opacity:.5;filter:alpha(opacity=50)}button.close{padding:0;cursor:pointer;background:transparent;border:0;-webkit-appearance:none}.clearfix:after,.clearfix:before{content:" ";display:table}.clearfix:after{clear:both}.center-block{display:block;margin-left:auto;margin-right:auto}.pull-right{float:right!important}.pull-left{float:left!important}.list-group-item a{color:#555;text-decoration:none}.view{position:absolute;right:12px;bottom:3px;font-size:10px}a.red{color:#f56161}.meta-wrap{line-height:2;padding-top:20px}.meta-wrap p{margin-top:20px}a.b{font-weight:700}.time a{font-size:10px;color:#aaa}div#tweet-list p{margin-bottom:4px;line-height:1.3;font-size:12px}.title{padding:0!important}.padding-wrap{padding:16px 4px 4px}.clear{clear:both}.cat-item{background-color:#57956A;border-radius:2px;color:#fff;display:inline-block;font-family:arial;font-size:10px;font-weight:400;height:13px;line-height:13px;overflow:hidden;padding:0 3px 0 2px;white-space:nowrap}.list-group-item .col-xs-3,.list-group-item .col-xs-9{padding:0!important}.cat-domain{color:#8c8c8c;display:inline-block;font-family:Arial,arial,sans-serif;font-size:11px;font-weight:400;line-height:13px;overflow:hidden;padding:0 0 0 3px}.cat{padding:6px 0 8px!important}.link-btn{background:#fff;-webkit-border-radius:0;border-radius:0;border-width:1px;height:28px;min-width:94px;max-width:349px;border-color:#777;border-style:solid;color:#757575;position:absolute;right:0;line-height:28px;text-align:center}.list-group-item:first-child{border-top:none}#tweet-list .list-group-item{border:1px solid #eee;padding:8px;margin-bottom:8px}.tag{text-decoration:none;font-size:16px;color:#636363}.ad{vertical-align:top;display:inline-block;width:49%}.block{margin:16px 0}.copy{margin:0;padding:16px 0;color:#aaa;text-align:right;font-size:.8rem;"}
</style>
<style type="text/css" media="screen and (max-width:767px)">
	.description{display:none}.thumbnail > img,.thumbnail a>img{max-height:60px}.ad{width:100%;display:block;text-align:center;margin:16px 0}
</style>
<meta property="og:title" content="@yield('title')">
<meta name="twitter:title" content="@yield('title')">
<meta property="og:description" content="@yield('description')">
<meta name="twitter:description" content="@yield('description')">
<meta name="description" content="@yield('description')">
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{config('app.name', 'Laravel')}}">
<meta property="og:locale" content="ja_JP">
<meta name="twitter:card" content="summary_large_image">
<meta property="og:image" content="@yield('image',url('/thumbnail.jpg'))">
<meta name="twitter:url" content="{{url()->current()}}">
<meta name="twitter:image" content="@yield('image',url('/thumbnail.jpg'))">
<meta name="theme-color" content="#166fff">
<link rel="amphtml" href="@yield('amp',url()->current().'.amp')">
<link rel="canonical" href="{{url()->current()}}">
<link rel="alternate" hreflang="ja" href="{{url()->current()}}">
<link rel="alternate" type="application/atom+xml" title="News" href="{{url('/feed')}}">

<link rel="icon" href="{{url('/favicon.ico')}}" type="image/x-icon">
<link rel="apple-touch-icon" href="{{url('/apple-touch-icon.png')}}" sizes="180x180">
<link rel="icon" href="{{url('/favicon.png')}}" sizes="192x192">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{env('GA_TAG')}}"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', '{{env("GA_TAG")}}');
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
	(adsbygoogle = window.adsbygoogle || []).push({
		google_ad_client: "ca-pub-5105681373982866",
		enable_page_level_ads: true
	});
</script>


</head>
<body>
	<div id="app">
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">

					<!-- Collapsed Hamburger -->
                    <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> -->

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                    	{{ config('app.name', 'Laravel') }}
                    </a>
                </div>
            </div>
        </nav>
        <div class="container">
        	@yield('breadcrumbs')
        	<div class="row">
        		<div class="col-xs-12 col-md-6">
        			@yield('content')
        		</div>
        		<div class="col-xs-12 col-md-6" id="sidebar">
                    <!-- <div class="block">
                      <center>
                        <a href="https://px.a8.net/svt/ejp?a8mat=2ZGWQL+C213V6+CO4+ZYSNL" target="_blank" rel="nofollow">
                          <img border="0" width="336" height="280" alt="" src="https://www24.a8.net/svt/bgt?aid=180507837729&wid=005&eno=01&mid=s00000001642006041000&mc=1"></a>
                          <img border="0" width="1" height="1" src="https://www15.a8.net/0.gif?a8mat=2ZGWQL+C213V6+CO4+ZYSNL" alt="">
                        </center>
                      </div>
                      <div class="block">
                        <center>
                          <a href="http://bit.ly/2qB2KIe" target="_blank" rel="nofollow">
                            <img border="0" width="320" height="50" alt="" src="https://cdn-ak.f.st-hatena.com/images/fotolife/Y/YukaYuka-atopy/20170809/20170809043340.jpg"></a>
                          </center>
                      </div> -->
                      <ul class="list-group">
                      	<li class="list-group-item active">人気記事</li>
                      	@foreach(\App\Article::popular()->take(5)->cursor() as $article)
                      	@if($loop->iteration == 1)
                      	<li class="list-group-item">
                      		<div class="col-xs-3 thumbnail">
                      			<a href="https://lim-jp.com/archives/449">
                      				<img src="{{url('/uydagfea.jpg')}}" alt="【悲報】ローラ、ガチ乳首ポロリ動画をインスタグラムにアップしてしまう...">
                      			</a>
                      		</div>
                      		<div class="col-xs-9 title">
                      			<a href="https://lim-jp.com/archives/449">
                      				【悲報】ローラ、ガチ乳首ポロリ動画をインスタグラムにアップしてしまう...
                      			</a>
                      			<p class="text-muted description">
                      				@php
                      				echo mb_strimwidth("ローラのインスタグラムは「写真が素敵」「服が可愛い」と何かと話題です。最近でもニュースになった「バギー」や「ジム」の画像から、ローラの写真加工に関する情報もまとめてみました。", 0, 120, '', 'utf8');
                      				@endphp
                      			</p>
                      		</div>
                      		<div class="clear"></div>
                      		<div class="col-xs-12 cat">
                      			<span class="cat-item">
                      				芸能
                      			</span>
                      			<span class="cat-domain">
                      				@php
                      				echo parse_url("https://lim-jp.com/archives/449", PHP_URL_HOST);
                      				@endphp
                      			</span>
                      			<a href="https://lim-jp.com/archives/449" class="link-btn">サイトへ</a>
                      		</div>
                      		<span class="view">{{$article->view * 2 + 32}} view</span>
                      	</li>
                      	@elseif($loop->iteration == 4)
                      	<li class="list-group-item">
                      		<div class="col-xs-3 thumbnail">
                      			<a href="https://masakuraudo2.com/archives/2051">
                      				<img src="{{url('/ufahefiah.jpg')}}" alt="看護師・介護士のセクハラ被害の実態...。実際に体を触られた例も...">
                      			</a>
                      		</div>
                      		<div class="col-xs-9 title">
                      			<a href="https://masakuraudo2.com/archives/2051">
                      				看護師・介護士のセクハラ被害の実態...。実際に体を触られた例も...
                      			</a>
                      			<p class="text-muted description">
                      				@php
                      				echo mb_strimwidth("私も急に抱きつかれたことがあって。しかも夜中だったからめっちゃ怖かったです。。手のひらにキスされたのはほんと嫌でした。速攻手指消毒しました", 0, 120, '', 'utf8');
                      				@endphp
                      			</a>
                      		</div>
                      		<div class="clear"></div>
                      		<div class="col-xs-12 cat">
                      			<span class="cat-item">
                      				医療
                      			</span>
                      			<span class="cat-domain">
                      				@php
                      				echo parse_url("https://masakuraudo2.com/archives/2051", PHP_URL_HOST);
                      				@endphp
                      			</span>
                      			<a href="https://masakuraudo2.com/archives/2051" class="link-btn">サイトへ</a>
                      		</div>
                      		<span class="view">{{$article->view}} view</span>
                      	</li>
                      	@endif
                      	<li class="list-group-item"  itemscope itemtype="http://schema.org/Article">
                      		<div class="col-xs-3 thumbnail">
                      			<a href="{{$article->path()}}">
                      				<img src="{{$article->thumbnailPath()}}" alt="{{$article->title}}">
                      			</a>
                      		</div>
                      		<div class="col-xs-9 title">
                      			<a href="{{$article->path()}}" itemprop="name">
                      				{{$article->title}}
                      			</a>
                      			<p class="text-muted description">
                      				@php
                      				echo mb_strimwidth($article->description, 0, 120, '', 'utf8');
                      				@endphp
                      			</p>
                      		</div>
                      		<div class="clear"></div>
                      		<div class="col-xs-12 cat">
                      			<span class="cat-item">
                      				{{$article->word->text}}
                      			</span>
                      			<span class="cat-domain" itemprop="author">
                      				@php
                      				echo parse_url($article->url, PHP_URL_HOST);
                      				@endphp
                      			</span>
                      			<a href="{{$article->path()}}" class="link-btn">サイトへ</a>
                      		</div>
                      		<span class="view">{{$article->view}} view</span>
                      	</li>
                      	@endforeach

                      </ul>
                      <ul class="list-group">

                      <!-- <div class="block">
                        <center>
                         <a href="https://px.a8.net/svt/ejp?a8mat=2ZGWQL+CCQWR6+50+4T650H" target="_blank" rel="nofollow">
                          <img border="0" width="300" height="250" alt="" src="https://www21.a8.net/svt/bgt?aid=180507837747&wid=005&eno=01&mid=s00000000018029086000&mc=1"></a>
                          <img border="0" width="1" height="1" src="https://www12.a8.net/0.gif?a8mat=2ZGWQL+CCQWR6+50+4T650H" alt="">
                        </center>
                      </div>
                      <div class="block">
                        <center>
                          <a href="https://px.a8.net/svt/ejp?a8mat=2ZF26E+E4GAHE+348+1U1TUP" target="_blank" rel="nofollow">
                            <img border="0" width="728" height="90" alt="" src="https://www23.a8.net/svt/bgt?aid=180421574854&wid=005&eno=01&mid=s00000000404011094000&mc=1"></a>
                            <img border="0" width="1" height="1" src="https://www17.a8.net/0.gif?a8mat=2ZF26E+E4GAHE+348+1U1TUP" alt="">
                          </center>
                        </div>
                    -->
                    <li class="list-group-item active">新着記事</li>
                    @foreach(\App\Article::latest()->take(5)->cursor() as $article)
                    <li class="list-group-item" itemscope itemtype="http://schema.org/Article">
                    	<div class="padding-wrap">
                    		<div class="col-xs-3 thumbnail">
                    			<a href="{{$article->path()}}">
                    				<img src="{{$article->thumbnailPath()}}" alt="{{$article->title}}">
                    			</a>
                    		</div>
                    		<div class="col-xs-9 title">
                    			<a href="{{$article->path()}}" itemprop="name">
                    				{{$article->title}}
                    			</a>
                    			<p class="text-muted description">
                    				@php
                    				echo mb_strimwidth($article->description, 0, 120, '', 'utf8');
                    				@endphp
                    			</p>
                    		</div>
                    		<div class="clear"></div>
                    		<div class="col-xs-12 cat">
                    			<span class="cat-item">
                    				{{$article->word->text}}
                    			</span>
                    			<span class="cat-domain" itemprop="author">
                    				@php
                    				echo parse_url($article->url, PHP_URL_HOST);
                    				@endphp
                    			</span>
                    			<a href="{{$article->path()}}" class="link-btn">サイトへ</a>
                    		</div>
                    		<span class="view">{{$article->view}} view</span>
                    	</div>
                    </li>
                    @endforeach
                </ul>

                    <!-- <center>
                     <a href="https://px.a8.net/svt/ejp?a8mat=2TCFED+6WVAQA+50+2HX3HT" target="_blank" rel="nofollow">
                      <img border="0" width="300" height="250" alt="" src="https://www28.a8.net/svt/bgt?aid=170221045418&wid=005&eno=01&mid=s00000000018015103000&mc=1"></a>
                      <img border="0" width="1" height="1" src="https://www10.a8.net/0.gif?a8mat=2TCFED+6WVAQA+50+2HX3HT" alt="">
                    </center>
                -->

                <ul class="list-group">
                	<li class="list-group-item active">タグ</li>
                </ul>
                <div id="tag-area">
                	@foreach(\App\Word::inRandomOrder()->take(50)->cursor() as $word)
                	<a class="tag" href="{{$word->path()}}">{{$word->text}}</a>
                	@endforeach
                </div>

                   <!--  <div class="block">
                      <center>
                       <a href="https://px.a8.net/svt/ejp?a8mat=2ZGWQL+C2MJGY+CO4+NU729" target="_blank" rel="nofollow">
                        <img border="0" width="468" height="60" alt="" src="https://www20.a8.net/svt/bgt?aid=180507837730&wid=005&eno=01&mid=s00000001642004004000&mc=1"></a>
                        <img border="0" width="1" height="1" src="https://www10.a8.net/0.gif?a8mat=2ZGWQL+C2MJGY+CO4+NU729" alt="">
                      </center>
                  </div> -->

              </div>
          </div>
          @yield('breadcrumbs')
          <footer>
          	<p class="copy">© 2018 {{config('app.name')}}</p>
          </footer>
          <!-- <script src="{{ asset('js/app.js') }}"></script> -->
      </body>
      </html>
