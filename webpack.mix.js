const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
      require('tailwindcss'),
]).options({
  processCssUrls: false,
});

if(mix.inProduction()) {
  mix.version();
}

mix.copyDirectory('resources/js/tinymce/js/tinymce', 'public/js/tinymce');