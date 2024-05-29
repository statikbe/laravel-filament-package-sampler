import tailwindcssNesting from 'tailwindcss/nesting/index.js';
import tailwindcss from 'tailwindcss';
import autoprefixer from 'autoprefixer';

export default {
    plugins: [
        tailwindcssNesting,
        tailwindcss,
        autoprefixer,
    ],
    browserslist: ['defaults', 'not ie < 11', 'last 3 versions', '> 1%', 'iOS 7', 'last 3 iOS versions'],
};
