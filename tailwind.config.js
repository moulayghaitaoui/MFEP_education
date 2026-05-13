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
        algeria: {
          blue: '#1e3a8a',
          green: '#008037',
          red: '#d21034',
        }
      },
      boxShadow: {
        'glow': '0 0 15px rgba(255, 255, 255, 0.3)',
      }
    },
  },
  plugins: [],
}
