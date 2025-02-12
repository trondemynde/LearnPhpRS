/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/**/*.php",
    "./src/**/*.php",
    "./views/**/*.php",
    "./public/**/*.php",
  ],
  theme: {
    extend: {
      keyframes: {
        fadeOut: {
          '0%': { opacity: 1 },
          '100%': { opacity: 0 },
        },
      },
      animation: {
        fadeOut: 'fadeOut 2s ease-in-out forwards',
      },
    },
  },
  plugins: [
    require('daisyui'),
  ],
}

