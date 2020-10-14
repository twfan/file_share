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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/knr/css/app.css',
    'resources/knr/css/bootstrap.min.css',
    'resources/knr/css/icons.min.css',
], 'public/css/all.css');

// mix.js([
//     'resources/knr/js/app.js',
//     'resources/knr/js/vendor.js',
// ], 'public/js/all.js');

// mix.js([
//     'resources/knr/libs/datatables/jquery.dataTables.min.js',
//     'resources/knr/libs/datatables/dataTables.bootstrap4.min.js',
//     'resources/knr/libs/datatables/dataTables.responsive.min.js',
//     'resources/knr/libs/datatables/responsive.bootstrap4.min.js',
//     'resources/knr/libs/datatables/dataTables.buttons.min.js',
//     'resources/knr/libs/datatables/buttons.bootstrap4.min.js',
//     'resources/knr/libs/datatables/buttons.html5.min.js',
//     'resources/knr/libs/datatables/buttons.flash.min.js',
//     'resources/knr/libs/datatables/buttons.print.min.js',
//     'resources/knr/libs/datatables/dataTables.keyTable.min.js',
//     'resources/knr/libs/datatables/dataTables.select.min.js',
// ],'public/js/libs.js');