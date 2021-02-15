let mix = require('laravel-mix').mix;

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

const isProduction = process.env.NODE_ENV == "production" ? true : false;
const path = require('path');
let directory = path.basename(path.resolve(__dirname));

const source = 'Themes/' + directory;
const dist   = 'public/themes/' + directory.toLowerCase();
const asset  = source + '/assets'

// Copy Vendor Directory
mix.copyDirectory('node_modules/flag-icon-css/flags', dist + '/vendor/flag-icon-css/flags');
mix.copyDirectory('node_modules/flag-icon-css/css', dist + '/vendor/flag-icon-css/css');
mix.copyDirectory('node_modules/font-awesome/fonts', dist + '/vendor/font-awesome/fonts');
mix.copyDirectory('node_modules/bootstrap-sass/assets/fonts/bootstrap', dist + '/vendor/bootstrap/fonts');
mix.copyDirectory('node_modules/smartmenus/dist', dist + '/vendor/smartmenus');
mix.copyDirectory('node_modules/owl.carousel/dist', dist + '/vendor/owl.carousel');
mix.copyDirectory('node_modules/magnific-popup/dist', dist + '/vendor/magnific-popup');
mix.copyDirectory('node_modules/pnotify/dist', dist + '/vendor/pnotify');
mix.copyDirectory('node_modules/materialize-css/dist', dist + '/vendor/materialize-css');
mix.copyDirectory('node_modules/jssocials/dist', dist + '/vendor/jssocials');
mix.copyDirectory('node_modules/slick-carousel/slick', dist + '/vendor/slick-carousel');
mix.copyDirectory('node_modules/plyr/dist', dist + '/vendor/plugins/plyr');

//Rev Slider
mix.copyDirectory('node_modules/revslider/fonts', dist + '/vendor/revslider/fonts');
mix.copyDirectory('node_modules/revslider/images', dist + '/vendor/revslider/images');
mix.copyDirectory('node_modules/revslider/js', dist + '/vendor/revslider/js');

// Copy Vendor Files
mix.copy('node_modules/jquery/dist/jquery.min.js', dist + '/js');
mix.copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', dist + '/vendor/bootstrap/js');
mix.copy('node_modules/jquery.easing/jquery.easing.min.js', dist + '/vendor');
mix.copy('node_modules/smoothscroll/smoothscroll.min.js', dist + '/vendor');
mix.copy('node_modules/bootstrap-tabcollapse/bootstrap-tabcollapse.js', dist + '/vendor');
mix.copy('node_modules/jquery-inview/jquery.inview.min.js', dist + '/vendor');
mix.copy('node_modules/jquery-countto/jquery.countTo.js', dist + '/vendor');
mix.copy('node_modules/imagesloaded/imagesloaded.pkgd.min.js', dist + '/vendor');
mix.copy('node_modules/jquery.stellar/jquery.stellar.js', dist + '/vendor');
mix.copy('node_modules/flexslider/flexslider-rtl-min.css', dist + '/vendor/flexslider/css');
mix.copy('node_modules/flexslider/jquery.flexslider-min.js', dist + '/vendor/flexslider/js');
mix.copy('node_modules/jquery-lazy/jquery.lazy.min.js', dist + '/vendor')

// Sass Generate
if(!isProduction) {
    mix
        .sourceMaps(true, 'source-map')
        .webpackConfig({devtool: 'source-map'});
}

mix
    .sass(source + '/resources/scss/animate.scss', dist + '/vendor/animate/css')
    .sass(source + '/resources/scss/bootstrap.scss', dist + '/vendor/bootstrap/css')
    .sass(source + '/resources/scss/font-awesome.scss', dist + '/vendor/font-awesome/css')
    .sass('node_modules/materialize-css/sass/materialize.scss', dist + '/vendor/materialize-css/css')
    .sass('node_modules/revslider/scss/settings.scss', dist + '/vendor/revslider/css')
    .sass('node_modules/revslider/scss/settings-source.scss', dist + '/vendor/revslider/css')
    .sass('node_modules/revslider/scss/tp-color-picker.scss', dist + '/vendor/revslider/css')
    .sass(source + '/resources/plugins/revslider/css/navigation-skins/hesperiden.scss', dist + '/plugins/revslider/css/navigation-skins')
    .sass(source + '/resources/scss/style.scss', dist + '/css')
    .options({
        processCssUrls: false
    });

mix.combine([
    source + "/resources/plugins/revslider/js/jquery.themepunch.tools.min.js",
    source + "/resources/plugins/revslider/js/jquery.themepunch.revolution.min.js",
    source + "/resources/plugins/revslider/js/extensions/revolution.extension.actions.min.js",
    source + "/resources/plugins/revslider/js/extensions/revolution.extension.carousel.min.js",
    source + "/resources/plugins/revslider/js/extensions/revolution.extension.kenburn.min.js",
    source + "/resources/plugins/revslider/js/extensions/revolution.extension.layeranimation.min.js",
    source + "/resources/plugins/revslider/js/extensions/revolution.extension.migration.min.js",
    source + "/resources/plugins/revslider/js/extensions/revolution.extension.navigation.min.js",
    source + "/resources/plugins/revslider/js/extensions/revolution.extension.parallax.min.js",
    source + "/resources/plugins/revslider/js/extensions/revolution.extension.slideanims.min.js",
    source + "/resources/plugins/revslider/js/extensions/revolution.extension.video.min.js"
], dist + '/plugins/revslider/js/jquery.revolution.all.min.js');

if(isProduction) {
    mix.version();
}

// Copy Directory to asset
mix.copyDirectory(source + '/resources', dist);

mix.minify(dist + '/js/scripts.js');

// Browser Sync
if(!isProduction) {
    mix
        .browserSync(
        {
            proxy: 'jaletezer.test',
            files: [source + '/**/*.*']
        }
    );
}