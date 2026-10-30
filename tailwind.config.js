/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./pages/**/*.php",
    "./includes/**/*.php",
    "./admin/**/*.php",
    "./api/**/*.php",
    "./assets/js/**/*.js",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
      },
      colors: {
        'emergence-blue': '#283783',
        'emergence-yellow': '#FFDE17',
      },
      animation: {
        scroll: 'scroll 40s linear infinite',
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

