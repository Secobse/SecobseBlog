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

/*

Gulp, 流式构建系统
下面的代码告诉你,gulp帮助你引入了静态文件,编译sass文件, js文件

仔细查看resources目录和public目录, 相信你会有收获

具体详细说明,一言两语说不清,你需要仔细阅读
https://laravel.com/docs/5.3/frontend

以及sass documentation, node, npm, webpack, etc.

*/

elixir(mix => {
    mix.sass(['app.scss', 'content.scss', 'offer.scss'])
       .sass('welcome.scss', 'public/css')
       .sass('home.scss', 'public/css')
       .copy('node_modules/font-awesome/fonts', 'public/fonts')
       .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/fonts/bootstrap')
       .copy('node_modules/simplemde/dist/simplemde.min.css', 'public/css/simplemde.min.css')
       .copy('node_modules/simplemde/dist/simplemde.min.js', 'public/js/simplemde.min.js')
       .webpack('slide.js', 'public/js')
       .webpack('app.js');
});
