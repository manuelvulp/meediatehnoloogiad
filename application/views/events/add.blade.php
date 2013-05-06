<br><br>

<form action="{{ $links.add_event }}" method="POST" enctype="multipart/form-data">

<div class="wrapper-form">
<div class="content-form">

<br>


<!-- FIRST ROW -->

<div class="row-fluid">

  <a class="span2 offset1 text-event right">
    BACKGROUND IMAGE
  </a>

  <div class="span3 left">
    <div class="fileupload fileupload-new" data-provides="fileupload">
      
      <div>
        <span class="btn btn-file">
          <span class="fileupload-new">
            Select image
          </span>
          <span class="fileupload-exists">
            Change
          </span>
          <input type="file" name="background_image" /></span>
        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">
          Remove
        </a>
      </div>

      <div class="fileupload-preview thumbnail"></div>
    </div>
  </div>

  <a class="span2 text-event right">
    HEADER IMAGE
  </a>

  <div class="span3 left">
    <div class="fileupload fileupload-new" data-provides="fileupload">
      
      <div>
        <span class="btn btn-file">
          <span class="fileupload-new">
            Select image
          </span>
          <span class="fileupload-exists">
            Change
          </span>
          <input type="file" name="image" /></span>
        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">
          Remove
        </a>
      </div>

      <div class="fileupload-preview thumbnail"></div>
    </div>
  </div>

</div>

<div class="row-fluid">
  <a class="span2 offset1 text-event right"></a>

  <a class="span3 text-event left">
    @if (isset($error['background_image']))
      {{ ucfirst($error['background_image'][0]) }}
    @endif
  </a>
</div>

<!-- SECOND ROW -->
<br>

<div class="row-fluid">
  <a class="span2 offset1 text-event right">
    TITLE
  </a>

  <a class="span3 input left">
    <input type="text" name="title" class="" value="" placeholder="Title..." />
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
      @if (isset($error['title']))
        {{ ucfirst($error['title'][0]) }}
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
    DESCRIPTION
  </a>

  <a class="span8 input left">
    <textarea name="description" rows="3" class="input-description" placeholder="Event description..."></textarea>
  </a>

</div>

<div class="row-fluid">
  <a class="span2 offset1 text-event right"></a>

  <a class="span3 text-event left error-description">
    @if (isset($error['description']))
      {{ ucfirst($error['description'][0]) }}
    @endif
  </a>

  <a class="span2 text-event right"></a>
  <a class="span3 text-event left"></a>
</div>


<!-- FOURTH ROW -->
<br>

<div class="row-fluid">
  <a class="span2 offset1 text-event right">
    VENUE DATE
  </a>

  <a class="span3 input left">
    <!-- <p><input type="text" id="datepicker" /></p> -->
    <input type="text" name="date" value="" placeholder="YYYY/MM/DD" />
  </a>

  <a class="span2 text-event right">
    
  </a>

  <a class="span3 text-event left">
  </a>
</div>

<div class="row-fluid">
  <a class="span2 offset1 text-event right"></a>

  <a class="span3 text-event left">
    @if (isset($error['date']))
      {{ ucfirst($error['date'][0]) }}
    @endif
  </a>

  <a class="span2 text-event right"></a>
  <a class="span3 text-event left"></a>
</div>


<!-- FIFTH ROW -->
<br>

<div class="row-fluid">
  <a class="span2 offset1 text-event right">
    EVENT VIDEO URL
  </a>

  <a class="span3 input left">
    <input type="text" name="video_url" value="" placeholder="Video url..." />
  </a>

  <a class="span2 text-event right">
    EVENT FACEBOOK URL
  </a>

  <a class="span3 input left">
    <input type="text" name="facebook_url" value="" placeholder="Facebook url..." />
  </a>
</div>

<div class="row-fluid">
  <a class="span2 offset1 text-event right"></a>

  <a class="span3 text-event left">
    @if (isset($error['video_url']))
      {{ ucfirst($error['video_url'][0]) }}
    @endif
  </a>

  <a class="span2 text-event right"></a>

  <a class="span3 text-event left">
    @if (isset($error['facebook_url']))
      {{ ucfirst($error['facebook_url'][0]) }}
    @endif
  </a>
</div>


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


<!-- SEVENTH ROW -->
<br>

<div class="row-fluid">
  <a class="span2 offset1 text-event right">
    LEFT CONTENT
  </a>

  <a class="span3 input left">
    <textarea type="text" name="customizable_left_content" class="textarea" placeholder="Left customizable content..."></textarea>
  </a>

  <a class="span2 text-event right">
    RIGHT CONTENT
  </a>

  <a class="span3 input left">
    <textarea type="text" name="customizable_right_content" class="textarea" placeholder="Right customizable content..." ></textarea>
  </a>
</div>

<div class="row-fluid">
  <a class="span2 offset1 text-event right"></a>

  <a class="span3 text-event left">
    @if (isset($error['customizable_left_content']))
      {{ ucfirst($error['customizable_left_content'][0]) }}
    @endif
  </a>

  <a class="span2 text-event right"></a>

  <a class="span3 text-event left">
    @if (isset($error['customizable_right_content']))
      {{ ucfirst($error['customizable_right_content'][0]) }}
    @endif
  </a>
</div>





<!-- WRAPPER||CONTENT ENDS -->
</div>
</div>

<!-- DATES CONTENT -->
<!-- <div class="wrapper-venues">
<div class="content-venues">

<div class="row-fluid event">
  <a class="span2 text-venue"> 
    <input type="text" name="venue_date"     class="venue-date"     placeholder="Venue date..." /> 
  </a>

  <a class="span2 text-venue"> 
    <input type="text" name="venue_location" class="venue-location" placeholder="Venue location..." /> 
  </a>

  <a class="span4 text-venue"> 
    <input type="text" name="venue_place"    class="venue-place"    placeholder="Venue place..." /> 
  </a>

  <a class="span2 text-venue"> 
    <input type="text" name="venue_ticket"   class="venue-ticket"   placeholder="Venue ticket URL..." />
  </a>

  <a class="span2 text-venue"> 
    <input type="text" name="venue_facebook" class="venue-facebook" placeholder="Venue facebook URL..." />
  </a>
</div>

  
</div>
</div> -->


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
