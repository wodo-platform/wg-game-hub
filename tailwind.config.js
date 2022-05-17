const defaultTheme = require('tailwindcss/defaultTheme');
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './resources/js/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                inter: ['Inter', ...defaultTheme.fontFamily.sans],
                grota: ['Grota', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'wgh-red-1': '#FF5233',
                'wgh-red-2': '#FF3815',
                'wgh-red-3': '#D62000',
                'wgh-red-4': '#A31800',

                'wgh-purple-1': '#7000F5',
                'wgh-purple-2': '#6100D4',
                'wgh-purple-3': '#4B00A3',
                'wgh-purple-4': '#340070',

                'wgh-gray-1': '#9C9FA7',
                'wgh-gray-2': '#767980',
                'wgh-gray-3': '#696C73',
                'wgh-gray-4': '#5D5F65',
                'wgh-gray-5': '#313336',
            },
        },
    },
    plugins: [require('@tailwindcss/aspect-ratio')],
};
