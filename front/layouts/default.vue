<template>
  <div>
    <div>
      <div @click="checkAuthUser" style="cursor: pointer">
        Проверить авторизован ли юзер
      </div>
    </div>
    <ul>
      <li>
        <nuxt-link :to="{name:'index'}">
          главная страница
        </nuxt-link>
      </li>
      <li>
        <nuxt-link :to="{name:'newPage'}">
          newPage
        </nuxt-link>
      </li>
      <li>
        <nuxt-link :to="{name:'login'}">
          login
        </nuxt-link>
      </li>
    </ul>
    <Nuxt />
  </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
  computed: {
    ...mapGetters(['isAuthenticated', 'loggedInUser'])
  },
  methods:{
    checkAuthUser:function ()
    {
      console.log(this.loggedInUser);
      console.log(this.isAuthenticated);
      console.log(this.$auth.hasScope('edit'));
    }
  }
}
</script>
