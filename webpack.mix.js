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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .disableSuccessNotifications()
    .options({
        vue: {
            cssModules: {
            localIdentName: '[name]-[local]-[hash:base64]',
            camelCase: true
            }
        }
    })
    .override(config => {
        if (config.devServer) {
            config.devServer.devMiddleware = config.devServer.dev;
            delete config.devServer.dev;
        }
    });