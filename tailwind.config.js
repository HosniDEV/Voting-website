/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vNue",
    ],
    theme: {
        extend: {
            colors: {
                "backgroundColor": "#f6f7fc",
                "buttonColor": "#2d7fef",
                "buttonSeondColor": "#e0dfe1",
               "cardColor": "#ffffff",
                "inputColor":'#f4f3f4',
                "greenColor":'#0F9D58',
                "redColor":'#DB4437',
                "blueColor":'#4285F4',
                "yellowColor":'#F4B400',
            },

        },

    },
    plugins: [],
};
