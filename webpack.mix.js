let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css');

mix.js([
    'resources/js/modules/vocabulary-vl.js'
], 'public/js/modules/vocabulary.js');


