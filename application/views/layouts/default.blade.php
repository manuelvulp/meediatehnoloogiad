<input type="hidden" class="urlEvents" value="{{ $links.events }}" />
<input type="hidden" class="urlViewEvent" value="{{ $links.view_event }}" />

@if (isset($css_files))
  @foreach ($css_files as $css_file)
    {{ $css_file }}
  @endforeach
@endif

@if (isset($js_files))
  @foreach ($js_files as $js_file)
    {{ $js_file }}
  @endforeach
@endif

<div class="body">

@if ($is_logged_in)

<div class="wrapper-toolbar">

  <!-- TOOLBAR CONTENT STARTS -->

  <div class="row-fluid">
    <div class="span12">
      
      <div href="#" class="item-toolbar my-venues">
        <div class="row-fluid">
          <div class="span2 item-toolbar-img"> <img src="{{ $images.venue }} " class="image-toolbar"/> </div>
          <div class="span9 item-toolbar-text center"> MY EVENTS </div>
        </div>

        <div class="my-venues-dropdown">

          <a href="{{ $links.add_event }}">
            <div class="row-fluid item-dropdown">
              <div class="span2 item-toolbar-img"> <img src="{{ $images.venue }} " class="image-toolbar"/> </div>
              <div class="span9 item-toolbar-text"> Add event </div>
            </div>
          </a>

          <a href="{{ $links.edit_event }}">
            <div class="row-fluid item-dropdown">
              <div class="span2 item-toolbar-img"> <img src="{{ $images.venue }} " class="image-toolbar"/> </div>
              <div class="span9 item-toolbar-text"> Edit events </div>
            </div>
          </a>

        </div>
      </div>
      
      <div href="#" class="item-toolbar my-profile">
        <div class="span2 item-toolbar-img"> <img src="{{ $images.user }} " class="image-toolbar"/> </div>
        <div class="span9 item-toolbar-text center"> MY PROFILE </div>

        <div class="my-profile-dropdown">

          <a href="{{ $links.view_profile }}{{ $user->user_id }}">
            <div class="row-fluid item-dropdown">
              <div class="span2 item-toolbar-img"> <img src="{{ $images.user }} " class="image-toolbar"/> </div>
              <div class="span9 item-toolbar-text"> View profile </div>
            </div>
          </a>

        </div>
      </div>
      
      <div href="#" class="item-toolbar my-news">
        <div class="span2 item-toolbar-img"> <img src="{{ $images.news }} " class="image-toolbar"/> </div>
        <div class="span9 item-toolbar-text center"> MY NEWS </div>

        <div class="my-news-dropdown">

          <a href="{{ $links.add_news }}">
            <div class="row-fluid item-dropdown">
              <div class="span2 item-toolbar-img"> <img src="{{ $images.news }} " class="image-toolbar"/> </div>
              <div class="span9 item-toolbar-text"> Add news </div>
            </div>
          </a>

          <a href="{{ $links.edit_news }}">
            <div class="row-fluid item-dropdown">
              <div class="span2 item-toolbar-img"> <img src="{{ $images.news }} " class="image-toolbar"/> </div>
              <div class="span9 item-toolbar-text"> Edit news </div>
            </div>
          </a>

        </div>
      </div>

    </div>
  </div>

  <!-- TOOLBAR CONTENT ENDS -->

</div>
<div style="margin-top:30px"></div>

@endif

<!-- LOGIN WRAPPER STARTS -->

<div class="wrapper-login">
  <div class="content-login">

    <br><br>

    <!-- LOGIN FORM -->
    <div class="row-fluid form-login">
      <form action="{{ $links.login }}" method="POST">
      
      <div class="row-fluid">
        <div class="span12">

          <div class="row-fluid">
            <div class="span7 offset1">
              <input type="text" class="input-login" name="email" placeholder="Email" />
            </div>
          </div>

        </div>
      </div>

      <div class="row-fluid m5">
        <div class="span12">

          <div class="row-fluid">
            <div class="span7 offset1">
              <input type="password" class="input-login" name="password" placeholder="Password" />
            </div>
            <div class="span2">
              <input type="submit" class="input-login button-login btn" value="Login" />
            </div>
          </div>

        </div>
      </div>

      <!-- TEXT OPTIONS -->
      <div class="row-fluid text-forgotten-password">
        <div class="span10 offset1">
          <a href="#" class="text-login"></a>
        </div>
      </div>
      <!-- TEXT OPTIONS END -->

      </form>
    </div>

    <!-- FORGOTTEN PASSWORD -->
    <div class="row-fluid forgotten-password">
      <form action="#" method="POST">

        <div class="row-fluid">
          <div class="span12">

            <div class="row-fluid">
              <div class="span7 offset1">
                <input type="text" class="input-login" placeholder="Email where to send new password" />
              </div>
              <div class="span2">
                <input type="submit" class="input-login button-login btn" value="Send" />
              </div>
            </div>

          </div>
        </div>

        <!-- TEXT OPTIONS -->
        <div class="row-fluid text-forgotten-password">
          <div class="span10 offset1">
            <a href="#" class="text-login"></a>
          </div>
        </div>
      <!-- TEXT OPTIONS END -->

      </form>
    </div>

  </div>
</div>

<!-- LOGIN WRAPPER ENDS -->

<div class="wrapper-header">
  <div class="content-header">

    <!-- HEADER CONTENT STARTS -->

    <div class="row-fluid">
      <div class="span12">
        <div class="row-fluid">

          <a href="{{ $links.home }}" class="span2 item-menu"> HOME </a>
          <a href="{{ $links.events }}" class="span2 item-menu"> EVENTS </a>

          <div class="span4 item-search">
            <input type="text" class="input-search" placeholder="Search for an event..."/>
          </div>

          <a href="{{ $links.about }}" class="span2 item-menu"> ABOUT US </a>

          @if ($is_logged_in)
            <a href="{{ $links.logout }}" class="span2 item-menu"> LOGOUT </a>
          @else
            <div class="span2 item-menu login"> LOGIN </div>
          @endif

        </div>
      </div>
    </div>

    <!-- HEADER CONTENT ENDS -->

  </div>
</div>

<!-- FLASH NOTICES -->
@if ($show_flash_notices)
  @if (Session::has('flash_notice'))

    <div class="wrapper-flash">
      <div class="content-flash">
          {{ Session::get('flash_notice') }}
      </div>
    </div>

  @endif
@endif

<!-- FLASH NOTICES END -->

<div class="wrapper-search">
  <div class="content-search">

    <!-- EVENTS -->

  </div>
</div>

<!-- LAYOUT CONTENT STARTS -->
{{ $content }}
<!-- LAYOUT CONTENT ENDS -->

<div style="margin-top: 40px"></div>

<div class="wrapper-footer">
  <div class="content-footer">

    <!-- FOOTER CONTENT STARTS -->
    
     <div class="row-fluid">
      <div class="span12">

        <div class="divider-footer"></div>
        <div class="row-fluid item-footer">
          <a href="#"><img src="{{ $images.facebook_white }} " class="image-footer"/></a>
          &nbsp; | &nbsp; 
          <a href="#"><img src="{{ $images.twitter_white }} " class="image-footer"/></a>
          &nbsp; | &nbsp; 

          <a href="#" class="text-footer">
              Chicago 2013 &copy; 
          </a> 

          &nbsp; | &nbsp; 
          <a href="#"><img src="{{ $images.googlep_white }} " class="image-footer"/></a>
          &nbsp; | &nbsp; 
          <a href="#"><img src="{{ $images.skype_white }} " class="image-footer"/></a>
        </div>

      </div>
    </div>

    <!-- FOOTER CONTENT ENDS -->
  </div>
</div>

<div style="margin-top:200px">&nbsp;</div>

</div>

@if (isset($js_post_load_files))
  @foreach ($js_post_load_files as $js_files)
    {{ $js_files }}
  @endforeach
@endif