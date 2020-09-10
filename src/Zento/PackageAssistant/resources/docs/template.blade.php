<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{$page['title']}}</title>

    <link rel="stylesheet" href="css/style.css" />
    <script src="js/all.js"></script>


    @if(isset($page['language_tabs']))
      <script>
        $(function() {
            setupLanguages({!! json_encode($page['language_tabs']) !!});
        });
      </script>
    @endif
  </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <a href="https://www.alphazento.com">
            <img src="images/logo.png" style="padding-left:10px" width="32px">
            <span style="color: white;font-size: 1.8em;">ALPHAZENTO</span>
        </a>
        @if(isset($page['language_tabs']))
            <div class="lang-selector">
                @foreach($page['language_tabs'] as $lang)
                  <a href="#" data-language-name="{{$lang}}">{{$lang}}</a>
                @endforeach
            </div>
        @endif
        @if(isset($page['search']))
            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
        @endif
      <div id="toc">
      </div>
        @if(isset($page['toc_footers']))
            <ul class="toc-footer">
                @foreach($page['toc_footers'] as $link)
                  <li>{!! $link !!}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          {!! $content !!}
      </div>
      <div class="dark-box">
          @if(isset($page['language_tabs']))
              <div class="lang-selector">
                @foreach($page['language_tabs'] as $lang)
                    <a href="#" data-language-name="{{$lang}}">{{$lang}}</a>
                @endforeach
              </div>
          @endif
      </div>
    </div>
  </body>
</html>

<script>
  // setTimeout(function() {
  //   var e = $.Event( "keyup", { which: 13 } );
  //   $("#input-search").val('catalog').trigger(e);
  // }, 1000);
</script>
