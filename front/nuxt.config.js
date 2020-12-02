export default {
  ssr: false,

  head: {
    title: 'front',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  css: [
  ],

  plugins: [
  ],

  components: true,

  buildModules: [
  ],

  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/dotenv',
    '@nuxtjs/auth-next',
  ],

  auth: {
    redirect: {
      login: '/about'
    },
    strategies: {
      laravelPassportPasswordGrant: {
        name: 'laravelPassportPassword',
        provider: 'laravel/passport',
        url: process.env.BASE_URL,
        endpoints: {
          user: {
            url: process.env.AUTH_USER_ENDPOINT
          }
        },
        token: {
          maxAge: 1800
        },
        refreshToken: {
          maxAge: 60 * 60 * 24 * 3
        },
        clientId: process.env.OAUTH_CLIENT_ID,
        clientSecret: process.env.OAUTH_CLIENT_SECRET,
        grantType: 'password'
      }
    }
  },

  build: {
  },
}
