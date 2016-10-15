const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass(['app.scss', 'content.scss', 'offer.scss'])
    .sass('welcome.scss', 'public/css')
    .sass('home.scss', 'public/css')
    .sass('select2.sass', 'public/css')
    .sass('select2-bootstrap.sass', 'public/css')
    .copy('node_modules/font-awesome/fonts', 'public/fonts')
    .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/fonts/bootstrap')
    .copy('node_modules/simplemde/dist/simplemde.min.css', 'public/css/simplemde.min.css')
    .copy('node_modules/simplemde/dist/simplemde.min.js', 'public/js/simplemde.min.js')
    .webpack('slide.js', 'public/js')
    .webpack('select2,js', 'public/js')
    .webpack('app.js');
})
;
