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

/* mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps(); */

mix
    .sass('resources/views/scss/style.scss', 'public/assets/css/style.css')

.js('resources/js/navbar.js', 'public/assets/js/navbar.js')
    .js('resources/js/mask.js', 'public/assets/js/mask.js')
    .js('resources/js/inputFile.js', 'public/assets/js/inputFile.js')
    .css('resources/css/app.css', 'public/assets/css/app.js').options({
        processCssUrls: false
    })

.scripts('node_modules/jquery/dist/jquery.js', 'public/assets/js/libs/jquery.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/assets/js/libs/bootstrap.js');