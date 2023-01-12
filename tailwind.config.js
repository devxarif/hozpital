const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: 'jit',
    darkMode: 'class',
    important: true,
    darkMode: ['class', '[data-mode="dark"]'],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './node_modules/flowbite/**/*.js',
        "./index.html",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
        './node_modules/preline/dist/*.js'

    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            borderWidth: ['hover'],
        },
    },
    variants: {
        extend: {
            display: ["group-hover"],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('flowbite/plugin'),
        require('preline/plugin')
    ],
};


// module.exports = {
//     content: [
//       "./resources/**/*.blade.php",
//       "./resources/**/*.js",
//       "./resources/**/*.vue",
//       "./node_modules/flowbite/**/*.js"
//     ],
//     theme: {
//       extend: {},
//     },
//     plugins: [
//         require('flowbite/plugin')
//     ],
//   }




//   const defaultTheme = require('tailwindcss/defaultTheme');

// /** @type {import('tailwindcss').Config} */
// module.exports = {
//     content: [
//         './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
//         './storage/framework/views/*.php',
//         './resources/views/**/*.blade.php',
//         "./node_modules/flowbite/**/*.js"
//     ],

//     theme: {
//         extend: {
//             fontFamily: {
//                 sans: ['Nunito', ...defaultTheme.fontFamily.sans],
//             },
//         },
//     },

//     plugins: [require('@tailwindcss/forms'),require('flowbite/plugin')],
// };
