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

//     'resources/assets/css/libs/blog-post.css',
//     'resources/assets/css/libs/bootstrap.css',
//     'resources/assets/css/libs/font-awesome.css',
//     'resources/assets/css/libs/metisMenu.css',
//     'resources/assets/css/libs/sb-admin-2.css',
//     'resources/assets/css/libs/styles.css',

// ], 'public/css/lib.css');

// mix.scripts([
//     'resources/assets/js/libs/blog-post.js',
//     'resources/assets/js/libs/bootstrap.js',
//     'resources/assets/js/libs/jquery.js',
//     'resources/assets/js/libs/metisMenu.js',
//     'resources/assets/js/libs/sb-admin-2.js',
//     'resources/assets/js/libs/scripts.js',

// ], 'public/js/lib.js')

// This is how to compile your assets using mix. Am not using it on this project, but I'll use it on the very last laravel project 
// after all this is done with :)




mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');