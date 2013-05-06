<!-- <div class="wrapper-gradient"></div> -->

<br>

<div class="wrapper-events">
<div class="content-events">

<!-- EVENTS CONTENT STARTS  -->

<div class="row-fluid">
  <div class="span12">

    <div class="row-fluid header-event">
      <div class="span2 item-event event-title"> DATE </div>
      <div class="span8 item-event event-title"> LOCATION </div>
      <div class="span2 item-event event-title"> DELETE </div>
    </div>

    @if (isset($events))

      @foreach ($events as $event)

        <div class="row-fluid event">
          <a href="{{ $links.edit_event }}{{ $event->event_id }}" class="span2 item-event event-listener "> 
            {{ $event->date }} 
          </a>

          <a href="{{ $links.edit_event }}{{ $event->event_id }}" class="span8 item-event event-listener "> 
            {{ $event->title }} 
          </a>

          <a href="{{ $links.delete_event }}{{ $event->event_id }}" class="span2 item-event event-listener "> 
            X
          </a>
        </div>

      @endforeach

    @endif

  </div>
</div>

<!-- EVENTS CONTENT ENDS  -->

</div>
</div>