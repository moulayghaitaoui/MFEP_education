/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        tajawal: ['Tajawal', 'sans-serif'],
        inter: ['Inter', 'sans-serif'],
      },
      colors: {
        gov: {
          green: '#006233',
          'green-dark': '#004d28',
          red: '#d21034',
          gold: '#b59410',
          'gold-light': '#d4af37',
        }
      },
      boxShadow: {
        'glow': '0 0 15px rgba(255, 255, 255, 0.3)',
      }
    },
  },
  plugins: [],
}
