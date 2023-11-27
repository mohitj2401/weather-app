/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      spacing: {
        '128': '35rem'
      },
      gridTemplateColumns: {

        'weather': '2fr 9fr 2fr',
      }
    },
  },
  plugins: [],
}

