<!-- <div class="wrapper-gradient"></div> -->

<br>

<div class="wrapper-events">
<div class="content-events">

<!-- EVENTS CONTENT STARTS  -->

<div class="row-fluid">
  <div class="span12">

    <div class="row-fluid header-event">
      <div class="span2 item-event event-title"> DATE </div>
      <div class="span7 item-event event-title"> LOCATION </div>
      <div class="span2 item-event event-title"> USER </div>
      <div class="span1 item-event event-title"> </div>
    </div>

    @if (isset($events))

      @foreach ($events as $event)

        <div class="row-fluid event">
          <a href="{{ $links.view_event }}{{ $event->event_id }}" class="span2 item-event event-listener "> 
            {{ $event->date }} 
          </a>

          <a href="{{ $links.view_event }}{{ $event->event_id }}" class="span7 item-event event-listener "> 
            {{ $event->title }} 
          </a>

          <a href="{{ $links.view_profile }}{{ $event->user_id }}" class="span2 item-event profile-listener "> 
            {{ $event->username }} 
          </a>


          <a href="{{ $event->facebook_url }}" class="span1 item-event event-listener">
            <img src="{{ $images.facebook_black }}" class="event-facebook"/>
          </a>
        </div>

      @endforeach

    @endif

  </div>
</div>

<!-- EVENTS CONTENT ENDS  -->

</div>
</div>