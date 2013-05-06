<br><br>

@if (!empty($event->background_image))

<style> 
  body { 
    background: url(../../img/venue_images/{{ $event->background_image }}) no-repeat fixed;
    background-size: cover;
  }
</style>

@endif

<!-- TITLE CONTENT -->
<div class="wrapper-title">
<div class="content-title">

@if (!empty($event->image))
<div class="row-fluid">
  <a class="span12 title-image center">
    <img src="{{ $image }}{{ $event->image }}"/>
  </a>
</div>
@endif

<div class="row-fluid">
  <a class="span12 title-event">
    {{ $event->title }}
  </a>
</div>
  
</div>
</div>

<!-- <br> -->

<!-- VIDEO CONTENT -->
@if (!empty($event->video_url))
<div class="wrapper-video">
<div class="content-video">

<div class="row-fluid">
  <div class="span10 offset1 video center padding10">
    <iframe class="video-size" src="{{ $event->video_url }}" frameborder="0" allowfullscreen></iframe>
  </div>
</div>
  
</div>
</div>
@endif
<!-- <br> -->

<!-- TOOLBAR CONTENT -->
<div class="wrapper-eventbar">
<div class="content-eventbar">

<div class="row-fluid">
  <a class="span3 text-eventbar left">
    Next event : 2 May 2013
  </a>

  <a class="span6 text-eventbar center">
    <!-- DESCRIPTION -->
  </a>

  <a href="{{ $links.view_profile }}{{ $event->user_id }}" class="span2 offset1 text-eventbar right">
    by <span class="username"> {{ $event->username }} </span>
  </a>
</div>
  
</div>
</div>

<!-- <br> -->

<!-- IMAGE AND DESCRIPTION CONTENT -->
@if (empty($event->description_img))

<div class="wrapper-imgdesc">
<div class="content-imgdesc">

<div class="row-fluid">
<!--   <a class="span6 text-imgdesc">

  </a> -->
  <a class="span12 text-imgdesc">
    {{ $event->description }}
  </a>
</div>
  
</div>
</div>

<div class="wrapper-imgdesc">
<div class="content-imgdesc">

<div class="row-fluid">
  <!-- <div class="span4 customizable">
    <div class="title-customizable">
      LINKS
    </div>

    <div class="text-customizable center">
      <a href="https://soundcloud.com/camokrooked"> Soundcloud </a>|
      
      <a href="http://www.youtube.com/user/HospitalRecords?feature=">  Youtube </a>|
      
      <a href="www.facebook.com/CamoKrooked">  Facebook </a>|
      
      <a href="https://twitter.com/CamoKrooked">  Twitter </a>
      
    </div>

  </div> -->
  @if (!empty($event->customizable_left_title))
  <div class="span6 customizable">
    <div class="title-customizable">
      {{ $event->customizable_left_title }}
    </div>

    <div class="text-customizable">
      {{ $event->customizable_left_content }}
    </div>

  </div>
  @endif

  @if (!empty($event->customizable_right_title))
  <div class="span6 customizable">
    <div class="title-customizable">
      {{ $event->customizable_right_title }}
    </div>

    <div class="text-customizable">
      {{ $event->customizable_right_content }}
    </div>

  </div>
  @endif
</div>
  
</div>
</div>

@else

<div class="wrapper-imgdesc">
<div class="content-imgdesc">

<div class="row-fluid">
  <a class="span3 text-imgdesc">
    <img src="{{ $image }}{{ $event->description_img }}"/>
  </a>

  <a class="span9 text-imgdesc">
    {{ $event->description }}
  </a>
</div>
  
</div>
</div>

@endif
<br>

@if (isset($event_venues) AND !empty($event_venues))
<!-- DATES HEADER CONTENT -->
<div class="wrapper-dates-header">
<div class="content-dates-header">

<div class="row-fluid">
  <div class="span2 title-venue"> DATE </div>
  <div class="span3 title-venue"> LOCATION </div>
  <div class="span5 title-venue"> VENUE </div>
  <div class="span1 title-venue"> </div>
  <div class="span1 title-venue"> </div>
</div>
  
</div>
</div>
<!-- DATES CONTENT -->
<div class="wrapper-dates">
<div class="content-dates">
@foreach ($event_venues as $venue)

<div class="row-fluid event">
  <a class="span2 text-venue"> {{ $venue->date }} </a>
  <a class="span3 text-venue"> {{ $venue->location }} </a>
  <a class="span5 text-venue"> {{ $venue->venue }} </a>
  <a class="span1 text-venue" href="{{ $venue->ticket }}" > TICKETS </a>
  <a class="span1 padding12" href="{{ $venue->facebook }}">
    <img src="{{ $images.facebook_black }}" class="venue-facebook"/>
  </a>
</div>
@endforeach
  
</div>
</div>
@endif

