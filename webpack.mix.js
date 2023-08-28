const mix = require('laravel-mix');

mix.setPublicPath('public')

    .js('app/resources/js/app.js', 'public/assets/js')

    .postCss('app/resources/css/style.css', 'public/assets/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('postcss-nested'),
    ])

    .options({
        processCssUrls: false,
        terser: {
            extractComments: false, 
        }
    })

    .copyDirectory('app/resources/img', 'public/assets/img')

    .version();
	