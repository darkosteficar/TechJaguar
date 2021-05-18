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
                'AMD-Thumbnail': "url('/images/AMD-Thumbnail.png')",
                'Nvidia-Thumbnail': "url('/images/Nvidia-Thumbnail.png')",
                'Intel-Thumbnail': "url('/images/Intel-Thumbnail.png')",
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
