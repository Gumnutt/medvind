const colors = require('tailwindcss/colors')
module.exports = {
  prefix: 'gov-',
  purge: [
    './templates/**/*.html.twig',
    './src/**/*.js'
  ],
  plugins:[
    require('@tailwindcss/typography'),
    require('tailwindcss-debug-screens'),
    require('@tailwindcss/forms'),
  ],
  theme: {
    screens: {
      'sm': '640px',
      // => @media (min-width: 640px) { ... }
      'md': '768px',
      // => @media (min-width: 768px) { ... }
      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }
      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }
      '2xl': '1536px',
      // => @media (min-width: 1536px) { ... }
    },
    extend: {
      height: {
        hero: '75vh'
      },
      fontFamily: {
        'display': ['Source Sans','Helvetica', 'Arial', 'sans-serif']
      },
      colors: {
        'primary-light': 'var(--primary-color-light)',
        'primary-dark': 'var(--primary-color-dark)',
        'secondary-light': 'var(--secondary-color-light)',
        'secondary-dark': 'var(--secondary-color-dark)',
        'tertiary-light': 'var(--tertiary-color-light)',
        'tertiary-dark': 'var(--tertiary-color-dark)',
        amber: colors.amber,
        cyan: colors.cyan,
        transparent: 'transparent',
        current: 'currentColor',
      },
    },
  }
}