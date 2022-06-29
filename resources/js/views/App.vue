<template>
  
   <div class="row m-0">
      <welcome-content/>
      <cards-component/>
      <aside-component/>
      
   </div>
   
</template>

<script>

import WelcomeContent from '../components/WelcomeContent.vue'
import CardsComponent from '../components/CardsComponent.vue'
import AsideComponent from '../components/AsideComponent.vue'


export default {
   name:'app',
   components  :{
      WelcomeContent,
      CardsComponent,
      AsideComponent
   
    },


    data(){
      return {
         postsResponse: '',
      }
    },

   
}
</script>


