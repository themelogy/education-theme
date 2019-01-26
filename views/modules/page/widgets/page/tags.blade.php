<div class="post-tags">
  <span class="tags-links">
    <i class="fa fa-tags"></i>
      @foreach($tags as $tag)
          <a href="{{ route('page.tag', [$tag->slug]) }}">{{ $tag->name }}
              @if(!$loop->last),@endif</a>
      @endforeach
  </span>
</div>
<br/>
<hr class="p-top-bot-10"/>
