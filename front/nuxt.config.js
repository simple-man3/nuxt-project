export default {
  // Disable server-side rendering (https://go.nuxtjs.dev/ssr-mode)
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
    '@nuxtjs/auth',
  ],

  axios: {
    baseURL: process.env.BASE_URL
  },

  // auth: {
  //   strategies: {
  //     local: {
  //       endpoints: {
  //         login: {
  //           url: '/api/auth/user',
  //           method: 'get'
  //         },
  //       },
  //       token: {
  //         maxAge: 1800
  //       },
  //       refreshToken: {
  //         maxAge: 60 * 60 * 24 * 30
  //       },
  //     }
  //   }
  // },

  auth: {
    login: '/login',
      logout: '/',
      strategies: {
      local: {
        endpoints: {
          login: {url: '/api/auth/login', method: 'post', propertyName: 'access_token'},
          logout: {url: '/api/auth/logout', method: 'get', },
          user: {url: '/api/auth/user', method: 'get', propertyName: 'user'},
        },
        tokenRequired: true,
          tokenType: 'Bearer',
      },
    }
  },

  build: {
  },
}
