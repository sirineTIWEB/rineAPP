module.exports = {
  content: [
    "./src/**/*.{html,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        mydarkblue: "#415B68",
        mylightblue: "#93B5C9",
        myyellow: "#F2DA91",
        mybeige: "#FCFCF5",
      },
      fontSize: {
        'legend': 'clamp(0.625rem, 0.4167rem + 1.0417vw, 1rem)',
        'titre': 'clamp(1.5rem, 1rem + 2.5vw, 2.5rem)',
        'texte': 'clamp(0.875rem, 0.7rem + 0.875vw, 1.25rem)',
        'bouton': 'clamp(0.625rem, 0.525rem + 0.5vw, 0.875rem)',
        'soustitre': 'clamp(1rem, 0.625rem + 1.3333vw, 1.75rem)',  
        
      },
      fontFamily: {
        'annuario': ['annuario-variable', 'sans-serif'],
        'aqva': ['rl-aqva', 'sans-serif'],
      },
      backgroundImage: {
        'moiPC': "url('../assets/images/susana.jpg')",
      },
      screens: {
        'sm': '576px',
        'md': '768px',
        'lg': '992px',
        'xl': '1200px',
        '2xl': '1400px',
      },
    },
  },
  plugins: [],
}