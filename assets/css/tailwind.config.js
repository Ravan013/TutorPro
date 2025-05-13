/** @type {import('tailwindcss').Config} */
export default {
  content: ["./*.html", "./src/**/*.{js,ts,jsx,tsx}"], // Adjust paths as needed
  theme: { 
    extend: {
      colors: {
        primary: "#2D5F8B", // Deep Blue
        secondary: "#F9A826", // Golden Yellow
        background: "#F4F7FC", // Soft Blue-Gray
        textDark: "#333333", // Dark Gray
        cardBg: "#FFFFFF", // White
        footerBg: "#1A2E45", // Dark Navy
        hoverBlue: "#1E4D72", // Darker Blue for hover effects
      },
      fontFamily: {
        heading: ["Poppins", "sans-serif"],
        body: ["Roboto", "sans-serif"],
        button: ["Montserrat", "sans-serif"],
      },
      borderRadius: {
        btn: "12px", // Custom button radius
      },
      boxShadow: {
        card: "0 4px 6px rgba(0, 0, 0, 0.1)", // Soft card shadow
      },
    },
  },
  plugins: [],
};
