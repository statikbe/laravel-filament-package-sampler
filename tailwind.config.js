/** @type {import('tailwindcss').Config} */

//const defaultTheme = require('tailwindcss/defaultTheme');
// import preset from './resources/css/filament/admin/tailwind.config.js'

export default {
  content: [
      "./app/Filament/**/*.php",
      "./vendor/filament/**/*.blade.php",
      "./vendor/statikbe/laravel-filament-chained-translation-manager/**/*.blade.php",
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      //'./lang/**/*.php',
  ],
  theme: {
    extend: {
        /*fontFamily: {
            sans: [
                'Lato',
                ...defaultTheme.fontFamily.sans,
            ]
        }*/
    },
  },
  plugins: [
      require('@tailwindcss/forms'),
      require('@tailwindcss/typography'),
  ],
}

