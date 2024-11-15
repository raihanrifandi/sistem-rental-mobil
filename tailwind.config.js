/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        fontFamily: {
            sans: ['Manrope', 'sans-serif'], 
        },
        backgroundImage: {
          'gradient-button': 'linear-gradient(to bottom, #038EFF, #65BAFF)',
        },
        colors: {
          'checkbox-bg': '#F6F8F9',
          'checkbox-border': '#B0BABF',
        },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

