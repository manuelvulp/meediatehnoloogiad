<br><br>

<form action="{{ $links.add_news }}" method="POST" enctype="multipart/form-data">

<div class="wrapper-form">
<div class="content-form">

<br>




<!-- SECOND ROW -->
<br>

<div class="row-fluid">
  <a class="span2 offset1 text-event right">
    TITLE
  </a>

  <a class="span3 input left">
    <input type="text" name="news_title" class="" value="" placeholder="News title..." />
  </a>

  <a class="span2 text-event class="title" right">
    
  </a>

  <a class="span3 text-event left">
  </a>
</div>

<div class="row-fluid">
  <a class="span2 offset1 text-event right"></a>

  <a class="span3 left error-title">
    <span class="error-title-text">
      @if (isset($error['news_title']))
        {{ ucfirst($error['news_title'][0]) }}
      @endif
    </span>
    <img src="{{ $images.checkmark }} " class="checkmark"/>
  </a>

  <a class="span2 text-event right"></a>
  <a class="span3 text-event left"></a>
</div>


<!-- THIRD ROW -->
<br>

<div class="row-fluid">
  <a class="span2 offset1 text-event right">
    CONTENT
  </a>

  <a class="span8 input left">
    <textarea name="news_content" rows="3" class="input-description" placeholder="News content..."></textarea>
  </a>

</div>

<div class="row-fluid">
  <a class="span2 offset1 text-event right"></a>

  <a class="span3 text-event left error-description">
    @if (isset($error['news_content']))
      {{ ucfirst($error['news_content'][0]) }}
    @endif
  </a>

  <a class="span2 text-event right"></a>
  <a class="span3 text-event left"></a>
</div>


</div>
</div>


<!-- EVENT SUBMIT -->
<div class="wrapper-submit">
<div class="content-submit">


<div class="row-fluid">
  <a class="span2 offset1 text-event right"></a>

  <a class="span3 text-event left">
    <input type="submit" class="btn" value="Add entry" />
  </a>

  <a class="span2 text-event right"></a>

<br><br>

</div>

<br><br>

</div>
</div>


</form>
