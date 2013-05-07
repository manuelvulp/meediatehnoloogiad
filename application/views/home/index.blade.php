<br><br>

@if (isset($news)):

@foreach ($news as $entry):

<div class="wrapper-form">
<div class="content-form">

<div class="row-fluid">
  <a class="span3 text-event left">
    {{ $entry->username }}
  </a>
  <a class="span6 text-event center">
    {{ $entry->title }}
  </a>
  <a class="span3 text-event right">
    {{ $entry->created }}
  </a>
</div>

<br>

<div class="row-fluid">
  <a class="span12 text-event left">
    <pre>{{ $entry->content }}</pre>
  </a>

</div>

</div>
</div>

<br>

@endforeach
@endif



</div>
</div>

