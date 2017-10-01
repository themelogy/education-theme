@if($slide = Slide::findBySlug('anasayfa'))
    <section class="rev_slider_wrapper m-bot-5 xs-m-top-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="rev_slider materialize-slider z-depth-4">
                        <ul>
                            @if(count($slide->sliders)>0)
                                @foreach($slide->sliders as $slider)
                                    <li data-transition="fade" data-slotamount="default" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-thumb="{{ $slider->present()->firstImage(60,60,'fit',70) }}" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="<span style='font-size:12px;'>{{ ucfirst(mb_strtolower($slider->sub_title)) }}</span>" data-param1="{{ $slider->start_at->formatLocalized('%d %B %Y') }}" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{ $slider->present()->firstImage(1140,500,'fit',70) }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-no-retina>

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

                                    @if($slider->link_type != 'none')
                                        <!-- LAYER NR. 3 -->
                                            <div class="tp-caption tp-resizeme rev-btn  rs-parallaxlevel-0"
                                                 data-x="['{{ $slider->settings->link_position_h }}','{{ $slider->settings->link_position_h }}','{{ $slider->settings->link_position_h }}','{{ $slider->settings->link_position_h }}']" data-hoffset="['{{ $slider->settings->link_position_x }}','{{ $slider->settings->link_position_x }}','{{ $slider->settings->link_position_x }}','{{ $slider->settings->link_position_x }}']"
                                                 data-y="['{{ $slider->settings->link_position_v }}','{{ $slider->settings->link_position_v }}','{{ $slider->settings->link_position_v }}','{{ $slider->settings->link_position_v }}']" data-voffset="['{{ $slider->settings->link_position_y }}','{{ $slider->settings->link_position_y }}','{{ $slider->settings->link_position_y }}','{{ $slider->settings->link_position_y }}']"
                                                 data-width="none"
                                                 data-height="none"
                                                 data-whitespace="normal"
                                                 data-transform_idle="o:1;"
                                                 data-style_hover="cursor:default;"
                                                 data-transform_in="y:50px;opacity:0;s:900;e:Power4.easeInOut;"
                                                 data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                                 data-mask_out="x:inherit;y:inherit;"
                                                 data-start="1400"
                                                 data-splitin="none"
                                                 data-splitout="none"
                                                 data-responsive_offset="on"
                                                 style="z-index: 8; white-space: nowrap;">
                                                <a target="{{ $slider->link->target }}" href="{{ $slider->link->url }}" class="btn btn-lg  waves-effect waves-light">{{ $slider->link->title }}</a>
                                            </div>
                                        @endif

                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('styles')
    {!! Theme::style("css/revoslider/css/settings-custom.css") !!}
    {!! Theme::style("css/revoslider/css/layers.css") !!}
    {!! Theme::style("css/revoslider/css/navigation.css") !!}
    {!! Theme::style("css/revoslider/css/navigation-skins/hesperiden.css") !!}
    @endpush
    @push('scripts')
    {!! Theme::script("js/jquery.revolution.min.js") !!}
    @endpush
    @push('js_inline')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery(".materialize-slider").revolution({
                sliderType: "standard",
                sliderLayout: "auto",
                delay: 9000,
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
                        style: "uranus",
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
                        style: "zeus",
                        hide_onleave: false,
                        direction: "horizontal",
                        h_align: "center",
                        v_align: "bottom",
                        h_offset: 20,
                        v_offset: 30,
                        space: 5,
                        tmp: ""
                    },
                    tabs: {
                        style: "hesperiden",
                        enable: true,
                        width: 250,
                        height: 80,
                        min_width: 250,
                        wrapper_padding: 0,
                        wrapper_color: "#f5f5f5",
                        wrapper_opacity: "1",
                        tmp: '<div class="tp-tab-content">  <span class="tp-tab-date">@{{param1}}</span>  <span class="tp-tab-title">@{{title}}</span></div><div class="tp-tab-image"></div>',
                        visibleAmount: 10,
                        hide_onmobile: true,
                        hide_under: 776,
                        hide_onleave: false,
                        hide_delay: 200,
                        direction: "vertical",
                        span: true,
                        position: "outer-right",
                        space: 0,
                        h_align: "right",
                        v_align: "top",
                        h_offset: 0,
                        v_offset: 0
                    }
                },
                responsiveLevels: [1140, 1024, 768, 480],
                gridwidth: [1140, 1024, 768, 480],
                gridheight: [500, 450, 400, 350],
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
@endif