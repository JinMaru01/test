/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        customTeal: {
          light: '#338235',
          DEFAULT: '#37af9f',
          dark: '#067d68',
          darker: '#0F766E',
        },
        customBlue: {
          light: '#829caa',
        },
        customPink: {
          light: '#f8f0ec',
        },
      },
      fontFamily: {
        bebas: ['Bebas Neue', 'sans-serif'],
      },
    },
  },
  plugins: [
    function ({ addBase }) {
      addBase({
        'button': {
          '@apply transform transition-all duration-300': {},
        },
      });
    },
  ],
}