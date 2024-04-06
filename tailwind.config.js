/** @type {import('tailwindcss').Config} */
export default {
   content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
   ],
   theme: {
      extend: {
         colors: {
            "xpi-green": "#A2A888",
            "xpi-olive": "#7A7A76",
            "xpi-rose": "#CDC3C3",
            "xpi-white": "#F4F3F3",
            "xpi-beige": "#F5F1E4",
         },
      },
      fontFamily: {
         Amarante: ["Amarante", "sans-serif"],
         Inter: ["Inter", "sans-serif"],
      },
      container: {
         center: true,
         padding: "1rem",
         screens: {
            lg: "1124px",
            xl: "1124px",
            "2xl": "1124px",
         },
      },
   },
   plugins: [],
};
