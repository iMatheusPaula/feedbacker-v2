import tailwindcss from "@tailwindcss/vite";

// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    compatibilityDate: '2025-07-15',
    devtools: {enabled: true},
    runtimeConfig: {
        public: {
            API_URL: process.env.API_URL,
        }
    },
    modules: [
        '@pinia/nuxt',
        '@nuxt/test-utils/module'
    ],
    css: [
        '~/assets/css/main.css',
        '~/assets/css/fonts.css',
        '~/assets/css/base.css'
    ],
    app: {
        head: {
            link: [
                {
                    rel: "stylesheet", type: "text/css",
                    href: 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css'
                }
            ]
        }
    },
    vite: {
        plugins: [
            tailwindcss(),
        ],
    },
})
