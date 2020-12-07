<template>
  <section>
    <div @click="sigIn">
      кнопка авторизации
    </div>
    <div @click="getData">
      кнопка показа данных юзера
    </div>
    <div @click="logOut">
      кнопка выхода из системы
    </div>
    <div @click="ty">
      кнопка ty
    </div>
  </section>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  computed: {
    ...mapGetters(['loggedInUser','isAuthenticated'])
  },
  created:function ()
  {
    // console.clear();11
    console.log(this.loggedInUser);
    console.log(this.isAuthenticated);
  },
  methods:{
    async getData()
    {
      this.$axios.get(process.env.BASE_URL+'/api/auth/user')
      .then(response=>{
        console.log(response);
      })
      .catch(error=>{
        console.log(error);
      })
    },

    async sigIn()
    {
      this.$auth.loginWith('laravelPassport',{
        data:{
          username:'example2@gmail.com',
          password:'123456',
        }
      })
      .then(response => {
        console.log(response);
      })
      .catch(error => {
        console.error(error)
      });
    },

    async logOut()
    {
      await this.$auth.logout();

      console.log(this.loggedInUser);
      console.log(this.isAuthenticated);
    },

    async ty ()
    {
      this.$axios.get('/api/get-access')
      .then(response=>{
        console.log(response);
      })
      .catch(error=>{
        console.error(error);
      });
    }
  }
}
</script>

<style>
section div{
  width: 200px;
  height: 35px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 9px;
  padding: 5px;
  border: 1px solid;
  cursor: pointer;
  margin-bottom: 10px;
}
</style>
