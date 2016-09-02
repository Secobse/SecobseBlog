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
    mix.sass('app.scss')
    mix.sass('content.scss')
       .copy('node_modules/font-awesome/fonts', 'public/fonts')
       .copy('node_modules/simplemde/dist/simplemde.min.css', 'public/css/simplemde.min.css')
       .copy('node_modules/simplemde/dist/simplemde.min.js', 'public/js/simplemde.min.js')
       .copy('resources/assets/js/app.js','public/js/')
       .webpack('app.js');
});
