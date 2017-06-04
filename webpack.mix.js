const { mix } = require('laravel-mix');

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
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/base.scss', 'public/css')
   .copy('resources/assets/img','public/img')
   // 加点东西
   // .disableNofitication()
   // .sourceMaps()
   .version(); //使用的时候在HTML中引入使用语法{{ mix('css/app.css') }}
