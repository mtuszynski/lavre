const theme = require("./theme.json");
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./**/*.php",
    "./resources/css/*.css",
    "./resources/js/*.js",
    "./safelist.txt",
  ],
  theme: {
    container: {
      padding: {
        DEFAULT: "1rem",
        sm: "2rem",
        lg: "0rem",
      },
      screens: {
        xs: "100%",
        sm: "100%",
        md: "100%",
        lg: "1024px",
        xlg: "1300px",
        xl: "1440px",
        "2xl": "1620px",
      },
    },
    extend: {
      colors: tailpress.colorMapper(
        tailpress.theme("settings.color.palette", theme)
      ),
      fontSize: tailpress.fontSizeMapper(
        tailpress.theme("settings.typography.fontSizes", theme)
      ),
      fontFamily: {
        montserrat: ["montserrat", "sans-serif"],
      },
      fontSize: {
        headingFont: ["4rem", "4.875rem"],
      },
      gridTemplateColumns: {
        footer: "1.5fr 1fr 1fr 1fr 1fr",
        "footer-md": "1fr 1fr",
        "footer-sm": "1fr",
      },
    },
    screens: {
      xs: "480px",
      sm: "600px",
      md: "782px",
      lg: "1024px",
      xlg: "1300px",
      xl: "1440px",
      "2xl": "1620px",
    },
  },
  plugins: [tailpress.tailwind],
};
