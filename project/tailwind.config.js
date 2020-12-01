module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {},
    },
    variants: {
        extend: {
            borderRadius: ['hover'],
            ringWidth: ['hover'],
            ringColor: ['hover'],
            transform: ['hover'],
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
