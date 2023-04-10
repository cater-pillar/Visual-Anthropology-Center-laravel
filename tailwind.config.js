/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    container: {
      center: true,
      padding: '0.5rem',
    },

     maxHeight: {
      '8/10': '80%',
      '9/10': '90%',
     },
     minWidth: {
      '12': '120px',
     },
    boxShadow: {
      DEFAULT: "0px 0px 2px 0px #00470f",
    },
    extend: {
      maxWidth: {
        '1/2' : '50%',
        '6/10': '60%',
        '8/10': '80%',
        '9/10': '90%',
       },
      dropShadow: {
        'outline': '1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000'
      },
      colors: {
        theme: {
          light: "#00470f",
          DEFAULT: "#17750E",
          dark: "#0b4e05",
        }
      },
      backgroundImage: {
      'intro': "url('http://127.0.0.1:8000/storage/images/general/background.png')",
      'gradient': "linear-gradient(to right, #0b4e05 0%, #17750E 15% 85%, #0b4e05)",
      }
    },
  },

}
