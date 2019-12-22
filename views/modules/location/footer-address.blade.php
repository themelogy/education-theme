                    <div id="address-carousel" class="address carousel vertical slide p-top-30 p-bot-20 address-ticker" data-ride="carousel" data-interval="5000">
                        <div class="carousel-inner">
                            @foreach(app('locations') as $location)
                                <div class="item @if($loop->first)active @endif">
                                    <h6>{{ $location->name }}</h6>
                                    <ul>
                                        @if($location->address)
                                            <li><i class="fa fa-map-marker"></i> {{ $location->present()->address }}</li>
                                        @endif
                                        @if($location->phone1)
                                            <li><i class="fa fa-phone"></i> {{ $location->phone1 }}</li>
                                        @endif
                                        @if($location->phone2)
                                            <li><i class="fa"></i> {{ $location->phone2 }}</li>
                                        @endif
                                        @if($location->email)
                                            <li><i class="fa fa-envelope"></i> {{ $location->email }}</li>
                                        @endif
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                        <!-- Controls -->
                        <a class="up carousel-control" href="#address-carousel" role="button" data-slide="prev">
                            <span class="fa fa-angle-up" aria-hidden="true"></span>
                            <span class="sr-only">Geri</span>
                        </a>
                        <a class="down carousel-control" href="#address-carousel" role="button" data-slide="next">
                            <span class="fa fa-angle-down" aria-hidden="true"></span>
                            <span class="sr-only">İleri</span>
                        </a>
                    </div>