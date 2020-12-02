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
  </section>
</template>

<script>
export default {
  created:function ()
  {
    console.clear();
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
      this.$auth.loginWith('laravelPassportPassword',{
        data:{
          username:'example@gmail.com',
          password:123456,
        }
      })
      .then(response => {
        console.log(response);
      })
      .catch(error => {
        console.error(error)
      });

      // await this.$auth.loginWith('local')
      //   .then(response=>{
      //     console.log(response);
      //
      //     this.$auth.setUser(response.data.user);
      //   })
      //   .catch(error=>{
      //     console.error(error)
      //   })
      //
      // console.log(this.$auth.loggedIn);
      // console.log(this.$auth.user);
    },

    async logOut()
    {
      this.$axios.get(process.env.BASE_URL+'/api/auth/logout')
        .then(response=>{
          console.log(response);
        })
        .catch(error=>{
          console.log(error);
        })
    },
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
