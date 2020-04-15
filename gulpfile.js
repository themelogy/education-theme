'use strict';

var gulp = require('gulp'),
    shell = require('gulp-shell'),
    sass = require('gulp-sass'),
    //del = require('del'),
    concat = require('gulp-concat'),
    browserSync = require('browser-sync').create(),
    runSequence = require('run-sequence'),
    sourcemaps = require('gulp-sourcemaps'),
    minify = require('gulp-minify'),
    less = require('gulp-less'),
    minifyCss = require('gulp-minify-css'),
    themeInfo = require('./theme.json');

var public_dir = '../../public';
var theme_dir = public_dir + '/themes/education';

var assets_dir = "assets";
var resource_dir = "resources/assets";

var css_dir = resource_dir + "/css";
var js_dir = resource_dir + "/js";
var img_dir = resource_dir + "/img";
var fonts_dir = resource_dir + "/fonts";

var assets_css_dir = assets_dir + "/css";
var assets_js_dir = assets_dir + "/js";
var assets_img_dir = assets_dir + "/img";
var assets_fonts_dir = assets_dir + "/fonts";
var assets_vendor_dir = assets_dir + "/vendor";
var assets_map_dir = assets_dir + "/maps";

var sass_dir = resource_dir + "/scss";
var vendor_dir = resource_dir + "/vendor";

gulp.task('public', function () {
    gulp.src([
        sass_dir + '/**/*.scss'
    ])
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(sourcemaps.write('../maps'))
    .pipe(gulp.dest(theme_dir+"/css"));
});

gulp.task('clear', function () {
    del(theme_dir + '/**', {force:true});
});

gulp.task('copy', function () {
   gulp.src(resource_dir+'/img/**')
       .pipe(gulp.dest(assets_img_dir));
    gulp.src(resource_dir+'/flags/**')
        .pipe(gulp.dest(assets_dir+'/flags'));
   gulp.src(resource_dir+'/css/**')
       .pipe(gulp.dest(assets_css_dir));
   gulp.src(resource_dir+'/js/**')
       .pipe(gulp.dest(assets_js_dir));
   gulp.src(resource_dir+'/fonts/**')
       .pipe(gulp.dest(assets_fonts_dir));
    gulp.src(resource_dir+'/maps/**')
        .pipe(gulp.dest(assets_map_dir));
});

gulp.task('compress', function() {
    gulp.src(js_dir+"/vendors/scripts.js")
        .pipe(minify({
            ext:{
                src:'-debug.js',
                min:'.js'
            },
            exclude: ['tasks'],
            ignoreFiles: ['.combo.js', '-min.js']
        }))
        .pipe(gulp.dest(js_dir))
});

gulp.task('vendor', function () {
    //Require Packages
    gulp.src(vendor_dir + "/jquery/dist/jquery.min.js").pipe(gulp.dest(js_dir));
    gulp.src(vendor_dir + "/bootstrap-sass/assets/javascripts/bootstrap.min.js").pipe(gulp.dest(js_dir));
    gulp.src(vendor_dir + "/bootstrap-sass/assets/fonts/bootstrap/*").pipe(gulp.dest(fonts_dir+"/bootstrap"));
    gulp.src(vendor_dir + "/materialize/dist/js/materialize.min.js").pipe(gulp.dest(js_dir));
    //Fontawesome
    gulp.src(vendor_dir + "/font-awesome/fonts/*").pipe(gulp.dest(fonts_dir+'/font-awesome'));
    //Webslide
    gulp.src(vendor_dir + "/webslide/css/*.css").pipe(gulp.dest(css_dir+"/webslide"));
    gulp.src(vendor_dir + "/webslide/js/webslidemenu.js").pipe(gulp.dest(js_dir));
    //SmartMenu
    gulp.src([vendor_dir+'/smartmenus/dist/addons/bootstrap/jquery.smartmenus.bootstrap.css']).pipe(gulp.dest(css_dir));
    gulp.src([vendor_dir + "/smartmenus/dist/addons/bootstrap/jquery.smartmenus.bootstrap.min.js", vendor_dir + "/smartmenus/dist/jquery.smartmenus.js"]).pipe(gulp.dest(js_dir));
    //Revolution
    gulp.src([vendor_dir+'/revo-slider/fonts/**/*']).pipe(gulp.dest(css_dir+'/revoslider/fonts'));
    gulp.src([vendor_dir+'/revo-slider/assets/**/*']).pipe(gulp.dest(css_dir+'/revoslider/assets'));
    gulp.src([vendor_dir+'/revo-slider/css/**/*.css']).pipe(gulp.dest(css_dir+'/revoslider/css'));
    //Flag-icons
    gulp.src([vendor_dir+'/flag-icon-css/css/**/*']).pipe(gulp.dest(css_dir+'/flag-icon-css/css'));
    gulp.src([vendor_dir+'/flag-icon-css/flags/**/*']).pipe(gulp.dest(resource_dir+'/flags'));
    //Menuzord
    gulp.src([vendor_dir+'/menuzord/css/**/*.css']).pipe(gulp.dest(css_dir));
    gulp.src([vendor_dir+'/menuzord/js/**/*.js']).pipe(gulp.dest(js_dir));
    //Semantic
    gulp.src([vendor_dir+'/semantic/dist/**/*']).pipe(gulp.dest(css_dir+"/semantic-ui"));
    gulp.src([vendor_dir+'/semantic/dist/semantic.min.js']).pipe(gulp.dest(js_dir));
    //Flag-icons
    gulp.src([vendor_dir+'/flag-icon-css/css']).pipe(gulp.dest(css_dir+"/flag-icon-css"));
    gulp.src([vendor_dir+'/flag-icon-css/flags']).pipe(gulp.dest(css_dir+"/flag-icon-css"));
    //Fotorama
    gulp.src([vendor_dir+'/fotorama/**/*']).pipe(gulp.dest(js_dir+"/vendors/fotorama"));
    //Jssocials
    gulp.src([vendor_dir+'/jssocials/dist/**/*']).pipe(gulp.dest(assets_vendor_dir+"/jssocials"));
    //Lightbox
    gulp.src([vendor_dir+'/lightbox2/dist/**/*']).pipe(gulp.dest(assets_vendor_dir+"/lightbox2"));
    //Lightbox-gallery
    gulp.src([vendor_dir+'/lightgallery/dist/**/*']).pipe(gulp.dest(assets_vendor_dir+"/lightgallery"));

    //Main.js
    gulp.src(vendor_dir + "/main.js").pipe(gulp.dest(js_dir));

    gulp.src(vendor_dir + "/css/vendors/**/*.css").pipe(gulp.dest(css_dir+"/vendors"));
    gulp.src(vendor_dir + "/js/vendors/**/*.js").pipe(gulp.dest(js_dir+"/vendors"));

    gulp.src(vendor_dir + "/youtubeurl/**/*").pipe(gulp.dest(assets_vendor_dir+"/youtubeurl"));
});

gulp.task('sass', function () {
    gulp.src([
        sass_dir + '/**/*.scss'
        ])
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write('../maps'))
        .pipe(gulp.dest(css_dir))
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('combine', function () {
    gulp.src([
        fonts_dir + '/iconfont/material-icons.css',
        css_dir + '/font-awesome.css',
        css_dir + '/vendors/magnific-popup/magnific-popup.css',
        css_dir + '/vendors/owl.carousel/assets/owl.carousel.css',
        css_dir + '/vendors/owl.carousel/assets/owl.theme.default.min.css',
        css_dir + '/vendors/flexSlider/flexslider.css',
        css_dir + '/flag-icon-css/css/flag-icon.min.css',
        css_dir + '/materialize.css',
        css_dir + '/bootstrap.css',
        css_dir + '/animate.css',
        css_dir + '/bootstrap-dropdownhover.css',
        css_dir + '/style.css'
    ])
        .pipe(concat('all.min.css'))
        .pipe(minifyCss())
        .pipe(gulp.dest(css_dir));

    gulp.src([
        vendor_dir + "/revo-slider/js/jquery.themepunch.tools.min.js",
        vendor_dir + "/revo-slider/js/jquery.themepunch.revolution.min.js",
        vendor_dir + "/revo-slider/js/extensions/revolution.extension.actions.min.js",
        vendor_dir + "/revo-slider/js/extensions/revolution.extension.carousel.min.js",
        vendor_dir + "/revo-slider/js/extensions/revolution.extension.kenburn.min.js",
        vendor_dir + "/revo-slider/js/extensions/revolution.extension.layeranimation.min.js",
        vendor_dir + "/revo-slider/js/extensions/revolution.extension.migration.min.js",
        vendor_dir + "/revo-slider/js/extensions/revolution.extension.navigation.min.js",
        vendor_dir + "/revo-slider/js/extensions/revolution.extension.parallax.min.js",
        vendor_dir + "/revo-slider/js/extensions/revolution.extension.slideanims.min.js",
        vendor_dir + "/revo-slider/js/extensions/revolution.extension.video.min.js"
    ])
        .pipe(concat('jquery.revolution.min.js'))
        .pipe(gulp.dest(js_dir));

    gulp.src([
        js_dir + "/jquery.min.js",
        js_dir + "/materialize.min.js",
        vendor_dir + "/bootstrap/dist/js/bootstrap.min.js",
        js_dir + "/vendors/jquery.easing.min.js",
        js_dir + "/vendors/smoothscroll.min.js",
        js_dir + "/vendors/bootstrap-tabcollapse.min.js",
        js_dir + "/vendors/owl.carousel/owl.carousel.min.js",
        js_dir + "/vendors/jquery.inview.min.js",
        js_dir + "/vendors/jquery.countTo.min.js",
        js_dir + "/vendors/imagesloaded.js",
        js_dir + "/vendors/jquery.shuffle.min.js",
        js_dir + "/vendors/jquery.stellar.min.js",
        js_dir + "/vendors/magnific-popup/jquery.magnific-popup.min.js",
        js_dir + "/jquery.revolution.min.js"
    ])
        .pipe(concat('all.min.js'))
        .pipe(gulp.dest(js_dir));
});

// Configure the proxy server for livereload
var proxyServer = "http://dev.jaletezer.com";

var arrAddFiles = [
    'views/**/*.php'
];

gulp.task('browserSync', function() {
    browserSync.init({
        proxy: proxyServer,
        files: arrAddFiles,
        ghostMode: {
            clicks: true,
            location: true,
            forms: true,
            scroll: true
        },
        notify: true,
        open: false
    });
});

gulp.task('default', function () {
    runSequence('vendor', 'sass', 'combine', 'compress', 'copy');
    gulp.src("").pipe(shell("php ../../artisan stylist:publish " + themeInfo.name));
});

gulp.task('watch', ['browserSync'], function () {
    gulp.watch([sass_dir + '/**/*.scss'], ['public']);
    gulp.watch('app/*.html', browserSync.reload);
    gulp.watch('app/js/**/*.js', browserSync.reload);
});
