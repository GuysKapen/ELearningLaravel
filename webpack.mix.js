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

mix.js(['resources/js/app.js', 'resources/js/main.js', 'resources/js/functions.js'], 'public/js')
    .vue()
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss"),])
    .sass('resources/sass/app.scss', 'public/css');

mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');
