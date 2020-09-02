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

// mix.styles([

//     'public/assets/css/libs/blog-post.css',
//     'public/assets/css/libs/bo.css',
//     'public/assets/css/libs/blog-post.css',
//     'public/assets/css/libs/blog-post.css',
//     'public/assets/css/libs/blog-post.css',

// ])

mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');