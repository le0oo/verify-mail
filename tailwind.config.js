const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        extend: {
            backgroundImage: theme => ({
             'grupo-fondo': "url('/img/grupojuninfondoform-03.png')",
            }),
            backgroundColor: theme => ({
                ...theme('colors'),
                'prueba': '#347080',
                'secondary': '#ffed4a',
                'danger': '#e3342f',
               })
        }
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
