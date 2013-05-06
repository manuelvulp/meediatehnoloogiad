<br><br>

<form action="{{ $links.register }}" method="POST" enctype="multipart/form-data">

<div class="wrapper-form">
<div class="content-form">

<br>

<!-- SIXTH ROW -->
<br>

<div class="row-fluid">
  <a class="span2 offset1 text-event right">
    LEFT HEADING
  </a>

  <a class="span3 input left">
    <input type="text" name="customizable_left_title" value="" placeholder="Left content title..." />
  </a>

  <a class="span2 text-event right">
    RIGHT HEADING
  </a>

  <a class="span3 input left">
    <input type="text" name="customizable_right_title" value="" placeholder="Right content title..." />
  </a>
</div>

<div class="row-fluid">
  <a class="span2 offset1 text-event right"></a>

  <a class="span3 text-event left">
    @if (isset($error['customizable_left_title']))
      {{ ucfirst($error['customizable_left_title'][0]) }}
    @endif
  </a>

  <a class="span2 text-event right"></a>

  <a class="span3 text-event left">
    @if (isset($error['customizable_right_title']))
      {{ ucfirst($error['customizable_right_title'][0]) }}
    @endif
  </a>
</div>

</div>
</div>




<!-- EVENT SUBMIT -->
<div class="wrapper-submit">
<div class="content-submit">


<div class="row-fluid">
  <a class="span2 offset1 text-event right"></a>

  <a class="span3 text-event left">
    <input type="submit" class="btn" value="Add event" />
  </a>

  <a class="span2 text-event right"></a>

<br><br>

</div>

<br><br>

</div>
</div>


</form>
