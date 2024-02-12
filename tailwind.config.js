/** @type {import('tailwindcss').Config} */

//const defaultTheme = require('tailwindcss/defaultTheme');
//import preset from './vendor/filament/filament/tailwind.config.preset';

export default {
  //presets: [ preset ],
  content: [
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

