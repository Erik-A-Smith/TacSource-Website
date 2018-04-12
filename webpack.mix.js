/**
*
*     Configs
*
*/

let mix = require('laravel-mix');
const webpack = require('webpack');

if (mix.config.inProduction) {
  mix.version();
}

// Else plugins cannot inject themselves into jQuery
mix.webpackConfig({
  plugins: [
    new webpack.ProvidePlugin({
      '$': 'jquery',
      'jQuery': 'jquery',
      'window.jQuery': 'jquery',
      'bootstrap': 'bootstrap'
    })
  ]
});

/**
*
*     Content
*
*/

// Global assets
mix.copy('resources/assets/js/Global/*', 'public/js/Global')
  .copy('resources/assets/sass/Global/*', 'public/css/Global');

// Index assets
mix.copy('resources/assets/js/Index/*', 'public/js/Index')
  .copy('resources/assets/sass/Index/*', 'public/css/Index')
  .copy('resources/assets/media/Index/*', 'public/media/Index');

// Event assets
mix.copy('resources/assets/js/Event/*', 'public/js/Event')
  .copy('resources/assets/sass/Event/*', 'public/css/Event');

// User assets
mix.copy('resources/assets/js/User/*', 'public/js/User')
  .copy('resources/assets/sass/User/*', 'public/css/User');

// Auth assets
mix.copy('resources/assets/js/Auth/*', 'public/js/Auth')
  .copy('resources/assets/sass/Auth/*', 'public/css/Auth');
