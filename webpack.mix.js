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

mix.js([

    'public/web_files/js/jquery-3.4.1.min.js',
    'public/web_files/js/popper.min.js',
    'public/web_files/js/bootstrap.min.js',
    'public/web_files/js/owl.carousel.min.js',
    'public/web_files/js/wow.min.js',
    'public/web_files/js/wow.js',
    'public/web_files/js/script.js',

], 'public/web_files/js/bundle.js');

//css bundle
mix.styles([

    'public/web_files/css/bootstrap.min.css',
    'public/web_files/css/all.min.css',
    'public/web_files/css/owl.carousel.min.css',
    'public/web_files/css/animate.min.css',
    'public/web_files/css/style.css',



], 'public/web_files/css/bundle.css');
