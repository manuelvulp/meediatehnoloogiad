<br>

<style>

.item-news {
  color: white !important;
  padding: 10px;
}

</style>

<div class="wrapper-form">
<div class="content-form">


<div class="row-fluid">
  <div class="span12">

    @if (isset($news))

      @foreach ($news as $entry)

        <div class="row-fluid news">
          <a href="{{ $links.edit_news }}{{ $entry->news_id }}" class="span6 item-news center"> 
            {{ $entry->title }} 
          </a>

          <a href="{{ $links.delete_news }}{{ $entry->news_id }}" class="span6 item-news center"> 
            X
          </a>

        </div>

      @endforeach

    @endif

  </div>
</div>


</div>
</div>