<template>
   <div>
     <div class="row m-0">
         <section class ="post col-10">
            <work-in-progress/>
            <div class="container">
               <div class="row g-5">
                  <div class="col-3" v-for="post in postsResponse.data" :key="post.id">
                     <!-- card -->
                     <div class="product card">
                        <img :src="'storage/' + post.img" :alt="post.title">
                        <div class="card-body">
                           <h3>{{post.title}}</h3>
                           <p>{{post.content}}</p>
                        </div>
                        <div class="card-footer">
                           <div class="author" v-if="post.user">
                              <h5>Autore</h5>
                              {{post.user.name}}
                           </div>
                           <span v-if="post.category"><strong>Cartegory:</strong> {{post.category.name}}</span>
                           <div class="tags" v-if="post.tags.length > 0"> 
                              <strong>Tags:</strong>
                              <ul>
                                 <li v-for="tag in post.tags" :key="tag.id">
                                    {{tag.name}}
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  
                  </div>
               </div>
            
               <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center  mt-5">
                     <li class="page-item" v-if="postsResponse.current_page > 1">
                        <a class="page-link"  @click="getAllPosts(postsResponse.current_page - 1)">Previous</a>
                     </li>
                     <li :class="{'page-item' : true , 'active' : page == postsResponse.current_page  }" v-for="page in postsResponse.last_page">
                        <a class="page-link" href="#" @click.prevent="getAllPosts(page)">{{ page }}</a>
                     </li>
                     
                     <li class="page-item" v-if="postsResponse.current_page < postsResponse.last_page">
                        <a class="page-link" href="#" @click.prevent="getAllPosts(postsResponse.current_page + 1)">Next</a>
                     </li>
                  </ul>
               </nav>
            
               
            </div>
         </section>

         <aside class="bg-secondary text-white col-2 p-5">
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
         </aside>
      </div>
   </div>
</template>

<script>

import WorkInProgress from '../components/WorkInProgress.vue'


export default {
   name:'app',
   components  :{
      WorkInProgress
   
    },


    data(){
      return {
         categories: '',
         tags:'',
         postsResponse: '',
         
      }
    },

   methods: {
      //chiamata posts
      getAllPosts(postPage){
         axios.get('/api/posts', {
          params : {
            page: postPage
          }
         })
        
      .then((response)=>{
         console.log(response);
         //this.posts=response.data.data
         this.postsResponse=response.data
      }).catch(e =>{
         console.error(e);
      })
      },

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
     this.getAllPosts(1)
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
