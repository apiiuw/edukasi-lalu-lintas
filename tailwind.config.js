/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/preline/dist/*.js",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        blueJR: '#277FC6',
        blueDarkJR: '#1D71B5',
      },
      fontFamily: {
        jakartaSans: ['"Plus Jakarta Sans"', 'sans-serif'],
        newSosis: ['"New Sosis"', 'sans-serif'],
        comicComoc: ['"Comiccomoc"', 'sans-serif'],
        rolves: ['"Rolves Free"', 'sans-serif'],
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
};
