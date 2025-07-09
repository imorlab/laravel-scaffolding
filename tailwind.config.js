import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                light: 'var(--color-light)',
                dark: 'var(--color-dark)',
                beige: 'var(--color-beige)',
                coral: 'var(--color-coral)',
                blue: 'var(--color-blue)',
                green: 'var(--color-green)',
                purple: 'var(--color-purple)',
            },
        },
    },

    plugins: [forms],
};
