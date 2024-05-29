import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            container: {
                center: true,
                padding: {
                    DEFAULT: '1rem',
                    sm: '2rem',
                    lg: '3rem',
                    xl: '5rem',
                    '2xl': '6rem',
                },
            },
            screens: {

                'md': '768px',
                'lg': '1024px',
                'xl': '1440px',
                '2xl': '1440px'
            },
            colors: {
                primary: '#092635',
                secondary: '#1B4242',
            },
        },
    },

    plugins: [
        require('flowbite/plugin')
    ],
};
