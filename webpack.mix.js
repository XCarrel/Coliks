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
   .sass('resources/sass/app.scss', 'public/css')
    .copy('node_modules/jquery/dist','public/js/jquery')
    .copy('node_modules/bootstrap/dist/js','public/js/bootstrap')
    .copy('node_modules/bootstrap/dist/css','public/css/bootstrap')
    .copy('resources/assets/images','public/assets/images');
