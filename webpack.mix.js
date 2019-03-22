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
mix.copy('resources/assets/css/backend/styles.css','public/css/backend');
mix.copy('resources/bootstrap-3.3.5/','public/bootstrap-3.3.5/');
mix.copy('resources/assets/css/backend/user.css','public/css/backend');
mix.js('resources/assets/js/backend/dashboard.js', 'public/js/backend');
mix.copy('resources/assets/img/','public/img');
mix.copy('resources/assets/js/frontend/','public/js/frontend/');
mix.copy('resources/assets/css/frontend/','public/css/frontend/');
mix.copy('resources/rs-plugin/','public/rs-plugin/');
mix.copy('resources/assets/images/','public/images/');
mix.copy('resources/assets/js/frontend/external/get-tweets1.1.php','public/');
mix.copy('resources/assets/images/','public/css/images/');
mix.copy('resources/assets/fonts/','public/css/fonts/');
mix.copy('resources/assets/video/','public/video/');
mix.copy('resources/assets/images/rate/','public/film/images/rate/');
mix.sass('resources/assets/css/frontend/custom.scss','public/css/frontend/custom.css');
mix.copy('resources/assets/images/rate/','public/category/images/rate/');