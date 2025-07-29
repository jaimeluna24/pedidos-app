import defaultTheme from 'tailwindcss/defaultTheme';
// const { addDynamicIconSelectors } = require('@iconify/tailwind')
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
          "./node_modules/flowbite/**/*.js",
  ],

   heme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            wiggle: {
                '0%, 100%': { transform: 'rotate(-3deg)' },
                '50%': { transform: 'rotate(3deg)' },
              }
            },
            animation: {
              wiggle: 'wiggle 1s ease-in-out infinite',
            },
        },

    plugins: [require('flowbite/plugin'),
        // addDynamicIconSelectors()
    ],

        darkMode: 'class',
}

