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
    .sourceMaps();

mix.styles([
    'public/plugins/bootstrap/dist/css/bootstrap.min.css',
	/*'public/dist/css/theme.min.css',*/
	'public/plugins/perfect-scrollbar/css/perfect-scrollbar.css',
], 'public/all.css');

mix.scripts([
	'public/src/js/vendor/modernizr-2.8.3.min.js',
    'public/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js',
	'public/plugins/screenfull/dist/screenfull.js',
], 'public/all.js');