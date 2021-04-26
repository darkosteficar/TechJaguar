module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            fontFamily: {
                source: ['Source Sans Pro']
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [require('@tailwindcss/forms'),],
}
