var Encore = require('@symfony/webpack-encore');

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')
    .copyFiles({
        from: './assets/img',

        // optional target path, relative to the output dir
        //to: 'images/[path][name].[ext]',

        // if versioning is enabled, add the file hash too
        //to: 'images/[path][name].[hash:8].[ext]',

        // only copy files matching this pattern
        // pattern: /\.(png|jpg|jpeg)$/
    })
    /*
     * ENTRY CONFIG
     *
     * Add 1 entry for each "page" of your app
     * (including one that's included on every page - e.g. "app")
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if you JavaScript imports CSS.
     */
    // .addEntry('app', './assets/js/app.js')
    .addEntry('material-kit-js', './assets/js/material-kit.js')
    .addEntry('jquery', './assets/js/core/jquery.min.js')
    .addEntry('popper', './assets/js/core/popper.min.js')
    .addEntry('material-design', './assets/js/core/bootstrap-material-design.min.js')
    // .addEntry('datetimepicker', './assets/js/plugins/bootstrap-datetimepicker.js')
    .addEntry('selectpicker', './assets/js/plugins/bootstrap-selectpicker.js')
    .addEntry('jasny', './assets/js/plugins/jasny-bootstrap.min.js')
    .addEntry('flexisel', './assets/js/plugins/jquery.flexisel.js')
    .addEntry('sharrre', './assets/js/plugins/jquery.sharrre.js')
    // .addEntry('moment', './assets/js/plugins/moment.min.js')
    .addEntry('nouislider', './assets/js/plugins/nouislider.min.js')
    //.addEntry('page1', './assets/js/page1.js')
    //.addEntry('page2', './assets/js/page2.js')
    .addStyleEntry('material-kit-css', './assets/css/material-kit.css')

    // When enabled, Webpack "splits" your files into smaller pieces for greater optimization.
    .splitEntryChunks()

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // enables @babel/preset-env polyfills
    .configureBabel(() => {}, {
        useBuiltIns: 'usage',
        corejs: 3
    })

    // enables Sass/SCSS support
    // .enableSassLoader()

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment to get integrity="..." attributes on your script & link tags
    // requires WebpackEncoreBundle 1.4 or higher
    //.enableIntegrityHashes()

    // uncomment if you're having problems with a jQuery plugin
    .autoProvidejQuery()

    // uncomment if you use API Platform Admin (composer req api-admin)
    //.enableReactPreset()
    //.addEntry('admin', './assets/js/admin.js')
;

module.exports = Encore.getWebpackConfig();
