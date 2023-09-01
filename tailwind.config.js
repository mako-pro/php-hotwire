/**
 * Docs
 * https://tailwindcss.com/docs/configuration
 *
 * Default configuration
 * https://github.com/tailwindcss/tailwindcss/blob/master/stubs/defaultConfig.stub.js
 */

module.exports = {
    content: [
        './app/resources/**/*.{html,php,js}',
    ],
    theme: {
        extend: {
            opacity: ['disabled'],
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
