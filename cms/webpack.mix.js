const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles(['public/css/style.css', 'public/css/icomoon.css', 'public/css/flaticon.css',
    'public/css/ionicons.min.css', 'public/css/aos.css', 'public/css/magnific-popup.css', 'public/css/wl.theme.default.min.css', 'public/css/owl.carousel.min.css', 'public/css/animate.css.css', 'public/css/open-iconic-bootstrap.min.css'
], 'public/css/onetheme.css')