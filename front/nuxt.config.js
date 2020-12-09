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

  axios:{
    baseURL:process.env.BASE_URL
  },

  auth: {
    redirect: {
      login: '/',
      logout:'/login'
    },
    strategies: {
      'laravelPassport': {
        provider: 'laravel/passport',
        url: process.env.BASE_URL,
        endpoints: {
          userInfo: process.env.AUTH_USER_ENDPOINT
        },
        clientId: process.env.OAUTH_CLIENT_ID,
        clientSecret: process.env.OAUTH_CLIENT_SECRET,
        grantType: 'password',
      },
    },
  },

  router: {
    middleware: ['auth']
  },

  build: {
  },
}
