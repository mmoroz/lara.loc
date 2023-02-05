const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require('tailwindcss/plugin');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Open-sans', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        plugin(function({ addBase, theme }) {
            addBase({
                'h1': { fontSize: theme('fontSize.3xl') },
                'h2': { fontSize: theme('fontSize.2xl') },
                'h3': { fontSize: theme('fontSize.lg') },
            })
        })
    ],


};
