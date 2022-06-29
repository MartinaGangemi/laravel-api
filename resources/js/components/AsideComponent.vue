<template>
    <div class="bg-secondary text-white col-2 p-5">
        <div class="categories">
            <h4>Categorie</h4>
            <ul>
                <li v-for="category in categories" :key="category.id">
                {{category.name}}
                </li>
            </ul>
        </div>
        <div class="tags">
            <h4>Tags</h4>
            <ul>
                <li v-for="tag in tags" :key="tag.id">
                {{tag.name}}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>


export default {
   name:'AsideComponent',
   


    data(){
      return {
         categories: '',
         tags:'',
        }
    },

    methods: {
      //chiamata categorie
      getAllCategories(){
         axios.get('/api/categories')
         .then(response =>{
            this.categories=response.data
         })
         .catch(e =>{
            console.error(e);
         })
      },

      //chiamata tags
      getAllTags(){
         axios.get('/api/tags')
         .then(response =>{
            this.tags=response.data
         })
         .catch(e =>{
            console.error(e);
         })
      }
   },

   mounted(){
    
     this.getAllCategories()
     this.getAllTags()
   }

}
</script>

<style scoped lang="scss">
   ul{
      padding-left: 0;
      li{
         list-style: none;
      }
   }

   
</style>
