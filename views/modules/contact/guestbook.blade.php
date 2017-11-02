<h2 class="text-medium mb-30">Hakkımızda ne söylediler?</h2>
<div id="client-testimonial" class="carousel slide carousel-testimonial text-center gray-bg" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        @foreach(app('guestbookRepo')->latest(5) as $comment)
            <div class="item {{ $loop->first ? 'active' : '' }}">
                <div class="avatar">
                    @if($image = $comment->present()->firstImage(null,50,'resize',50))
                        <img src="{{ $image }}" alt="{{ $comment->fullname }}" />
                    @else
                        <img src="{{ Theme::url('img/modules/tebrikler.jpg') }}" alt="{{ $comment->fullname }}" height="50" />
                    @endif
                </div>
                <div class="content">
                    <p>{{ Str::words($comment->message, 20) }}</p>

                    <div class="testimonial-meta brand-color">
                        {{ $comment->fullname }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#client-testimonial" role="button" data-slide="prev">
        <span class="material-icons" aria-hidden="true">&#xE5C4;</span>
        <span class="sr-only">Geri</span>
    </a>
    <a class="right carousel-control" href="#client-testimonial" role="button" data-slide="next">
        <span class="material-icons" aria-hidden="true">&#xE5C8;</span>
        <span class="sr-only">İleri</span>
    </a>
</div>