
<section class="rev_slider_wrapper m-bot-5 xs-m-top-70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="rev-slider" class="rev_slider materialize-slider z-depth-4" style="position: relative !important;">
                    <ul>
                        @foreach($slides as $slider)
                            <li data-transition="fade" data-slotamount="default" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-thumb="{{ $slider->present()->firstImage(60,60,'fit',70) }}" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="<span style='font-size:12px;'>{{ ucfirst(mb_strtolower($slider->sub_title)) }}</span>" data-param1="{{ $slider->start_at->formatLocalized('%d %B %Y') }}" data-description="" data-delay="{{ $slider->settings->delay*1000 }}"{!! $slider->link_type != 'none' ? ' data-link="'.$slider->link->url.'" data-target="'.$slider->link->target.'"' : '' !!}>
                                <!-- MAIN IMAGE -->
                                <img data-lazyload="{{ $slider->present()->firstImage(1140,500,'fit',70) }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-no-retina style="z-index: 0;">

                                @if(!empty($slider->video))
                                    <div class="rs-background-video-layer"
                                         data-forcerewind="on"
                                         data-volume="{{ $slider->settings->video_sound == 'on' ? 70 : 'mute' }}"
                                         data-{{ $slider->settings->video_type }}="{{ $slider->video }}"
                                         @if($slider->settings->video_type=='ytid')
                                         data-videoattributes="version=3&enablejsapi=1&html5=1&hd=1&wmode=opaque&showinfo=0&rel=0&origin={{ url('/') }};"
                                         @else
                                         data-videoattributes="background=1&title=0&byline=0&portrait=0&api=1"
                                         @endif
                                         data-videorate="1.0"
                                         data-videowidth="100%"
                                         data-videoheight="100%"
                                         data-videocontrols="none"
                                         data-videostartat="{{ $slider->settings->video_startat ?? '00:00' }}"
                                         data-videoendat="{{ $slider->settings->video_endat ?? '00:10' }}"
                                         data-videoloop="{{ $slider->settings->video_loop ?? 'loopandnoslidestop' }}"
                                         data-forceCover="1"
                                         data-aspectratio="16:9"
                                         data-autoplay="true"
                                         data-nextslideatend="true"
                                    ></div>
                                @endif

                                @if(!empty($slider->sub_title))
                                <!-- LAYER NR. 1 -->
                                    <div class="tp-caption rev-heading text-extrabold red-text text-darken-2 tp-resizeme"
                                         data-x="['{{ $slider->settings->title_position_h }}','{{ $slider->settings->title_position_h }}','{{ $slider->settings->title_position_h }}','{{ $slider->settings->title_position_h }}']" data-hoffset="['{{ $slider->settings->title_position_x }}','{{ $slider->settings->title_position_x }}','{{ $slider->settings->title_position_x }}','{{ $slider->settings->title_position_x }}']"
                                         data-y="['{{ $slider->settings->title_position_v }}','{{ $slider->settings->title_position_v }}','{{ $slider->settings->title_position_v }}','{{ $slider->settings->title_position_v }}']" data-voffset="['{{ $slider->settings->title_position_y }}','{{ $slider->settings->title_position_y }}','{{ $slider->settings->title_position_y }}','{{ $slider->settings->title_position_y }}']"
                                         data-fontsize="['{{ $slider->settings->title_font_size }}','{{ $slider->settings->title_font_size }}','{{ $slider->settings->title_font_responsive }}','{{ $slider->settings->title_font_responsive }}']"
                                         data-lineheight="['{{ $slider->settings->title_line_height }}','{{ $slider->settings->title_line_height }}','{{ $slider->settings->title_line_height }}','{{ $slider->settings->title_line_height }}']"
                                         data-width="{{ $slider->settings->title_width }}"
                                         data-height="{{ $slider->settings->title_height }}"
                                         data-whitespace="{{ $slider->settings->title_whitespace }}"
                                         data-transform_idle="o:1;"
                                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:900;e:Power4.easeInOut;"
                                         data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                         data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                                         data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                         data-start="1000"
                                         data-splitin="none"
                                         data-splitout="none"
                                         data-responsive_offset="on"
                                         style="z-index: 5; text-align: {{ $slider->settings->title_align }}; color: {{ $slider->settings->title_color }} !important;">{{ $slider->sub_title }}
                                    </div>
                                @endif

                                @if(!empty($slider->content))
                                <!-- LAYER NR. 2 -->
                                    <div class="tp-caption text-bold rev-subheading grey-text text-darken-4"
                                         data-x="['{{ $slider->settings->content_position_h }}','{{ $slider->settings->content_position_h }}','{{ $slider->settings->content_position_h }}','{{ $slider->settings->content_position_h }}']" data-hoffset="['{{ $slider->settings->content_position_x }}','{{ $slider->settings->content_position_x }}','{{ $slider->settings->content_position_x }}','{{ $slider->settings->content_position_x }}']"
                                         data-y="['{{ $slider->settings->content_position_v }}','{{ $slider->settings->content_position_v }}','{{ $slider->settings->content_position_v }}','{{ $slider->settings->content_position_v }}']" data-voffset="['{{ $slider->settings->content_position_y }}','{{ $slider->settings->content_position_y }}','{{ $slider->settings->content_position_y }}','{{ $slider->settings->content_position_y }}']"
                                         data-fontsize="['{{ $slider->settings->content_font_size }}','{{ $slider->settings->content_font_size }}','{{ $slider->settings->content_font_responsive }}','{{ $slider->settings->content_font_responsive }}']"
                                         data-lineheight="['{{ $slider->settings->content_line_height }}','{{ $slider->settings->content_line_height }}','{{ $slider->settings->content_line_height }}','{{ $slider->settings->content_line_height }}']"
                                         data-width="{{ $slider->settings->content_width }}"
                                         data-height="{{ $slider->settings->content_height }}"
                                         data-whitespace="{{ $slider->settings->content_whitespace }}"
                                         data-transform_idle="o:1;"
                                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:900;e:Power4.easeInOut;"
                                         data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                         data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                                         data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                         data-start="1200"
                                         data-splitin="none"
                                         data-splitout="none"
                                         data-responsive_offset="on"
                                         style="z-index: 5; text-align: {{ $slider->settings->content_align }}; color: {{ $slider->settings->content_color }} !important;">{!! $slider->content !!}
                                    </div>
                                @endif


                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

    @push('styles')
        {!! Theme::style("plugins/revslider/css/settings-custom.css?v=1") !!}
        <link rel="stylesheet" href="{{ mix('/themes/education/plugins/revslider/css/navigation-skins/hesperiden.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ mix("/themes/education/plugins/revslider/js/jquery.revolution.all.min.js") }}" defer></script>
    @endpush
    @push('js_inline')
        <style>
            .rs-background-video-layer iframe {
                visibility:inherit !important;
            }
        </style>
        <script type="text/javascript" defer>
            var revapi1 = jQuery(document).ready(function () {
                jQuery("#rev-slider").show().revolution({
                    sliderType: "standard",
                    jsFileLocation:"/themes/education/vendor/revslider/js/",
                    sliderLayout: "auto",
                    delay: 9000,
                    lazyType:"smart",
                    navigation: {
                        keyboardNavigation: "on",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "hesperiden",
                            enable: true,
                            hide_onmobile: true,
                            hide_onleave: true,
                            tmp: '',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            }
                        },
                        bullets: {
                            enable: true,
                            hide_onmobile: false,
                            style: "hesperiden",
                            hide_onleave: false,
                            direction: "horizontal",
                            h_align: "center",
                            v_align: "bottom",
                            h_offset: 20,
                            v_offset: 30,
                            space: 5,
                            tmp: ""
                        }
                    },
                    responsiveLevels: [1140, 1024, 768, 480],
                    gridwidth: [1140, 1026, 768, 480],
                    gridheight: [500, 450, 336, 210],
                    disableProgressBar: "on",
                    parallax: {
                        type: "mouse",
                        origo: "slidercenter",
                        speed: 2000,
                        levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50]
                    }
                });
            });
        </script>
    @endpush