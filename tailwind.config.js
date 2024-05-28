module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        colors: {
            bgbase: "#A7CCED",
            bgseconc: "#545E75",
            headline: "#304D6D",
        },
        extend: {},
    },
    plugins: [require("flowbite/plugin")],
};
