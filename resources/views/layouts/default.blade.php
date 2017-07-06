<?php


$settings = \App\Models\Setting::first();
$staticpages = \App\Models\Static_page::where('lang',Language())->get();
$social_media = \App\Models\Social_media::get();
$navigation = \App\Models\Navigation::where('lang',Language())->get();



$experiences = \App\Models\Experience::where('lang',Language())->where('parent',0)->limit(7)->get();
$towns = \App\Models\Town::where('lang',Language())->limit(7)->get();
//$events = \App\Models\Event::where('lang',Language())->limit(7)->get();
//$articles = \App\Models\Article::where('lang',Language())->limit(7)->get();
$eventCategories = \App\Models\Event_category::where('lang',Language())->get();
$articleCategories = \App\Models\Article_category::where('lang',Language())->get();

if(!isset($translationJson))  $translationJson = translationJson();
$translations = json_decode($translationJson);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MTML9T');</script>
<!-- End Google Tag Manager -->



<!-- Google Analytics -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-93502000-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- End of Google Analytics -->







    <link type="text/css" rel="stylesheet" href="/css/all.css?v=1.31">
    @if(env('APP_ENV')=='local')
    <link type="text/css" rel="stylesheet" href="/css/appstyle.css?v=1.5">
    @endif
    @yield('css')
    <title>@yield('title') | {{ $settings->title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="@yield('description')">
    
    <meta property="og:title" content="@yield('title') | {{ $settings->title }}">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('ogimage')">










</head>

<body>

<script src="/js/all.js?v=1.2"></script>



<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MTML9T"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->




<!-- Google Code for View of a key page Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 857201625;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "QzZaCKb5kHAQ2bffmAM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/857201625/?label=QzZaCKb5kHAQ2bffmAM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>









<nav class="navbar navbar-default nav-new">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>    
      </button>
      <a class="navbar-brand" href="{{ Baseurl("/") }}"><img src="{{ Imagepath($settings->logo) }}" class="logo"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        

    
@foreach($navigation as $navItem) 
        @if($navItem->keyword)
        <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $navItem->title }}</a>
         <ul class="dropdown-menu">

@if($navItem->keyword=='experiences')
@foreach($experiences as $experience)
<li><a href="{{ Baseurl("experience/$experience->slug") }}">{{ $experience->title }}</a></li>
@endforeach
@endif


@if($navItem->keyword=='destinations')
@foreach($towns as $town)
<li><a href="{{ Baseurl($town->parent->slug.'/'.$town->slug) }}">{{ $town->title }}</a></li>
@endforeach
@endif



@if($navItem->keyword=='events')
@foreach($eventCategories as $eventCategory)
<li><a href="{{ Baseurl("events/search?category=$eventCategory->id") }}">{{ $eventCategory->title }}</a></li>
@endforeach
@endif



@if($navItem->keyword=='articles')
@foreach($articleCategories as $articleCategory)
<li><a href="{{ Baseurl("articles/?category=$articleCategory->title") }}">{{ $articleCategory->title }}</a></li>
@endforeach
@endif

<hr>
<li><a href="{{ Baseurl($navItem->href) }}" class="seeall">{{ trans('lang.seeall') }}</a></li>
 </ul>
       </li>
       @else
               <li><a href="{{ Baseurl($navItem->href) }}">{{ $navItem->title }}</a></li>
               @endif
@endforeach        



<li> <a class="small" href="#" data-toggle="modal" data-target=".bs-example-modal-lg">{{ trans('lang.search') }} <span class="glyphicon glyphicon-search searchIconLnk" aria-hidden="true"></span></a></li>



@if(Auth::check()) 
   
                 <li class="dropdown dropdown-lg">
                     		
                     				<a class="layout-profile" href="" class="dropdown-toggle" data-toggle="dropdown">
                  					<img src='https://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}'>
                  					</a>
        
                  <ul class="dropdown-menu" role="menu" style="padding: 10px 30px !important;">
						<li>
							<a href="{{ Baseurl("/user/profile") }}">
							<i class="glyphicon glyphicon-user"></i>
							{{ trans('lang.profile') }}</a>
						</li>

						<li>
							<a href="/logout">
							<i class="glyphicon glyphicon-log-out"></i> 
														{{ trans('lang.logout') }}
														</a>
						</li>             
              </ul>                
            </li>
   
   @else 
@include('sections.authModals')
   @endif
   

      </ul>
    </div>
  </div>
</nav>



@yield('content')



   
   <footer>
       <div class="container">
<div class="row footer-largelist">
<div class="col-md-2 col-xs-6">
    <h5>{{ trans('lang.experiences') }}</h5>
    <ul>
    @foreach($experiences as $experience)
    <li><a href="{{ Baseurl("experience/$experience->slug") }}">{{ $experience->title }}</a></li>
    @endforeach
    </ul>
</div>  

<div class="col-md-2 col-xs-6 col-md-offset-1">
    <h5>{{ trans('lang.events') }}</h5>
    <ul>
    @foreach($eventCategories as $eventCategory)
    <li><a href="{{ Baseurl("events?category=$eventCategory->title") }}">{{ $eventCategory->title }}</a></li>
    @endforeach
    </ul>
</div> 

<div class="col-md-2 col-xs-6 col-md-offset-1">
    <h5>{{ trans('lang.destinations') }}</h5>
    <ul>
    @foreach($towns as $town)
    <li><a href="{{ Baseurl($town->parent->slug.'/'.$town->slug) }}">{{ $town->title }}</a></li>
    @endforeach
    </ul>
</div> 

<div class="col-md-2 col-xs-6 col-md-offset-1">
    <h5>{{ trans('lang.articles') }}</h5>
    <ul>
    @foreach($articleCategories as $articleCategory)
    <li><a href="{{ Baseurl("articles?category=$articleCategory->title") }}">{{ $articleCategory->title }}</a></li>
    @endforeach
    </ul>
</div> 
</div>



<div class="row bottom-links hr_line">
<div class="col-md-6 staticpage-links">
        © 2017. Georgian National Tourism Administration<br>
        All rights reserved<br>
        <a href="{{ Baseurl('/feedback') }}">{{ trans('lang.contact') }}</a>
     @foreach($staticpages as $staticpage)
    <a href="{{ Baseurl("/static/$staticpage->slug") }}">{{ $staticpage->title }}</a>
    @endforeach
</div>

<div class="col-md-3 col-sm-12">
     <ul type="none" id="media-links" class="">
@foreach($social_media as $media)
<li><a href="{{ $media->href }}" target="_blank"><i class="{{ $media->icon ? $media->icon : $media->media}}"></i></a>
@endforeach
</ul>
  </div>
  
  <div class="col-md-3" id="languages">



  
  <div class="dropup">
  <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="bfh-languages" data-language="{{ \App::getLocale() }}" data-flags="true"></span>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
<li><a href="{{ $translations->en_US }}"><i class="glyphicon bfh-flag-US"></i> English</a></li>
<li><a href="{{ $translations->ru_RU }}"><i class="glyphicon bfh-flag-RU"></i> Русский</a></li>
<li><a href="{{ $translations->ka_GE }}"><i class="glyphicon bfh-flag-GE"></i> ქართული</a></li>
  </ul>
</div>



</div>



<hr>

   </footer>




@yield('js')  


<style>



@if(\App::getLocale()=='ka_GE')
body, a, input, textarea, select {
    font-family: "Helvetica Neue", Helvetica, sans-serif, 'BPG Nateli' !important 
}
h1, h2, h3, h4, h5, h6, .navbar-left a  { 
    font-family:'BPG Nateli Mtavruli';
}
@endif
</style>





</div>











<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/54eedf48a99f20ee677a6f9d/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter43679164 = new Ya.Metrika({
                    id:43679164,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/43679164" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->



















<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

    

      <div class="modal-body">

     <div class="search">

     {{ Form::open(array('url' => App::getLocale().'/search', 'method' => 'get')) }}

      <input name='s' autocomplete="off" class="search-bar" placeholder="{{ trans('lang.search') }}">

      <button type="submit" class="btn btn-link"><span class="glyphicon glyphicon-search search-button" aria-hidden="true"></span></button>

      {{ Form::close() }}

     </div>

      </div>

    </div>

  </div>










</body>

</html>
