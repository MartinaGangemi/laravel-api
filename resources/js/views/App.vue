<template>
    <div>
       
       <work-in-progress/>
       <section class ="post">
         <div class="container">
            <div class="row">

               <div class="col-4" v-for="post in postsResponse.data" :key="post.id">
                  <!-- card -->
                  <div class="product card">
                     <img :src="'storage/' + post.img" :alt="post.title">
                      <div class="card-body">
                        <h3>{{post.title}}</h3>
                        <p>{{post.content}}</p>
                     </div>
                     <div class="card-footer">
                        <div class="author">
                           <h5>Autore</h5>
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
         posts: '',
         postsResponse: '',
         postPage: ''
      }
    },

   methods: {
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
      }
   },

   mounted(){
     this.getAllPosts(1)
   }
}
</script>
