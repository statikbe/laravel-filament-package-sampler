/** @type {import('tailwindcss').Config} */
import defaultTheme from "tailwindcss/defaultTheme";
// import preset from './resources/css/filament/admin/tailwind.config.js'

export default {
    content: [
        "./app/Filament/**/*.php",
        "./vendor/filament/**/*.blade.php",
        "./vendor/statikbe/laravel-filament-chained-translation-manager/**/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./plugins/**/*.blade.php",
        //'./lang/**/*.php',
    ],
    theme: {
        container: {
            center: true,
            padding: defaultTheme.spacing['4'],
        },
        extend: {
            /*fontFamily: {
                sans: [
                    'Lato',
                    ...defaultTheme.fontFamily.sans,
                ]
            }*/
            colors: {
                primary: {
                    DEFAULT: '#FECE00',
                    contrast: '#000000',
                    hover: '#DCB200',
                    hoverContrast: '#000000',
                },
                secondary: {
                    DEFAULT: '#29AE81',
                    contrast: '#ffffff',
                    hover: '#02875a',
                    hoverContrast: '#ffffff',
                },
                black: '#333333',
                light: "#f5f5f5"
            }
        },
    },
    safelist: [
        'section--light',
        'section--primary',
        'section--secondary',
        'section--default',
        'btn',
        'btn--primary',
        'btn--secondary',
        'btn--ghost',
        'btn--ext',
        'md:w-1/2',
        'md:w-1/3',
        'md:w-1/4',
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}

