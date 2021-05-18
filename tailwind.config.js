module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            fontFamily: {
                source: ['Source Sans Pro']
            },
            backgroundImage: theme => ({
                'vanishing-stripes': "url('/images/Vanishing-Stripes.svg')",

            }),
        },

    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),

    ],
}
