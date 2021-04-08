const mix = require('laravel-mix');
const path = require('path');
const VueLoaderPlugin = require('vue-loader/lib/plugin')
const webpack = require('webpack');
module.exports = {
    //...
    plugins: [
        // Ignore all locale files of moment.js
        new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/),
        new VueLoaderPlugin()
    ],
};
mix.options({
    terser: {
        terserOptions: {
            warnings: true
        }
    }
});
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .vue()
    .webpackConfig({
        plugins: [
            new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)
        ],
        output: {
            chunkFilename: 'js/[name].js?id=[chunkhash]',
            sourceMapFilename: "index.js.map"
        },
        resolve: {
            alias: {
                vue$: 'vue/dist/vue.runtime.esm.js',
                '@': path.resolve('resources/js'),
            },
        },
    })
    .babelConfig({
        plugins: ['@babel/plugin-syntax-dynamic-import'],
    })
    .version();
