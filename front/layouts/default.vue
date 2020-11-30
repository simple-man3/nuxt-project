<template>
  <div>
    <ul>
      <li>
        <nuxt-link :to="{name:'index'}">
          главная страница
        </nuxt-link>
      </li>
      <li>
        <nuxt-link :to="{name:'about'}">
          about
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
