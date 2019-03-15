let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.sass('resources/assets/css/backend/login.scss','public/css/backend');
mix.copy('resources/assets/css/backend/dashboard.css','public/css/backend');
mix.copy('resources/assets/css/backend/user.css','public/css/backend');
mix.js('resources/assets/js/backend/dashboard.js', 'public/js/backend');
mix.copy('resources/assets/img/','public/img');
