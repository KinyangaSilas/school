<?php 
require_once("../../../include/initialize.php");
if(!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Feedback centre</title>
	<!-- development version, includes helpful console warnings -->
<!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->

<!-- production version, optimized for size and speed -->
<!-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> -->
 <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>
<body>
	<div id="app">
    <v-app>
    	<v-navigation-drawer
    	v-model="drawer"
    	app
    	floating
    	>
    	<v-toolbar 
    	>
    		<v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
    		<v-toolbar-title>edu.cyeko.com</v-toolbar-title>
    	</v-toolbar>
    	<v-list 
    	shaped
    	>
		      <v-subheader><?php echo $_SESSION['NAME']; ?> </v-subheader>
		      <v-list-item-group>

		        <v-list-item >
		          <v-list-item-icon>
		            <v-icon></v-icon>
		          </v-list-item-icon>
		          <v-list-item-content>
		            <v-list-item-title>
		            	<a :href="'<?php echo web_root; ?>admin/modules/lesson/index.php'"><i class="fa fa-user fa-fw"></i> Lesson </a> 
		            </v-list-item-title>
		          </v-list-item-content>
		        </v-list-item>
		        <v-list-item >
		          <v-list-item-icon>
		            <v-icon></v-icon>
		          </v-list-item-icon>
		          <v-list-item-content>
		            <v-list-item-title>
		            	  <a href="<?php echo web_root; ?>admin/modules/exercises/index.php"><i class="fa fa-user fa-fw"></i> Exercises </a> 
		            </v-list-item-title>
		          </v-list-item-content>
		        </v-list-item>
		        <v-list-item >
		          <v-list-item-icon>
		            <v-icon></v-icon>
		          </v-list-item-icon>
		          <v-list-item-content>
		            <v-list-item-title>
		                <a href="<?php echo web_root; ?>admin/modules/modstudent/index.php"><i class="fa fa-user fa-fw"></i> Student </a> 
		            </v-list-item-title>
		          </v-list-item-content>
		        </v-list-item>
		        <v-list-item >
		          <v-list-item-icon>
		            <v-icon></v-icon>
		          </v-list-item-icon>
		          <v-list-item-content>
		            <v-list-item-title>
		                <a href="<?php echo web_root; ?>admin/modules/books/index.php"><i class="fa fa-user fa-fw"></i> Books </a> 
		            </v-list-item-title>
		          </v-list-item-content>
		        </v-list-item>
		        <?php if($_SESSION['TYPE']=="Administrator"){ ?>
		        <v-list-item >
		          <v-list-item-icon>
		            <v-icon></v-icon>
		          </v-list-item-icon>
		          <v-list-item-content>
		            <v-list-item-title>
		            	<a href="<?php echo web_root; ?>admin/modules/subjects/index.php"><i class="fa fa-info fa-fw"></i> Subjects</a>
		            </v-list-item-title>
		          </v-list-item-content>
		        </v-list-item>
		         <v-list-item >
		          <v-list-item-icon>
		            <v-icon>
		            	mdi-supervisor_account
		            </v-icon>
		          </v-list-item-icon>
		          <v-list-item-content>
		            <v-list-item-title>
		            	<a href="<?php echo web_root; ?>admin/modules/user/index.php"><i class="fa fa-user fa-fw"></i> Manage Users</a> 
		            </v-list-item-title>
		          </v-list-item-content>
		        </v-list-item>
		         <v-list-item >
		          <v-list-item-icon>
		            <v-icon></v-icon>
		          </v-list-item-icon>
		          <v-list-item-content>
		            <v-list-item-title>
		            	  <a href="<?php echo web_root; ?>admin/modules/payments/index.php"><i class="fa fa-user fa-fw"></i> Payment </a> 
		            </v-list-item-title>
		          </v-list-item-content>
		        </v-list-item>
		         <?php } ?>
		        <v-list-item >
		          <v-list-item-icon>
		            <v-icon></v-icon>
		          </v-list-item-icon>
		          <v-list-item-content>
		            <v-list-item-title>
		            	      <a href="<?php echo web_root; ?>admin/modules/careers/index.php"><i class="fa fa-user fa-fw"></i> Careers </a> 
		            </v-list-item-title>
		          </v-list-item-content>
		        </v-list-item>
		        <v-list-item >
		          <v-list-item-icon>
		            <v-icon></v-icon>
		          </v-list-item-icon>
		          <v-list-item-content>
		            <v-list-item-title>
		            	      <a href="<?php echo web_root; ?>admin/modules/feedback/index.php"><i class="fa fa-user fa-fw"></i> Feed Back </a> 
		            </v-list-item-title>
		          </v-list-item-content>
		        </v-list-item>
		        <v-list-item >
		          <v-list-item-icon>
		            <v-icon></v-icon>
		          </v-list-item-icon>
		          <v-list-item-content>
		            <v-list-item-title>
		            	     <a href="<?php echo web_root; ?>admin/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
		            </v-list-item-title>
		          </v-list-item-content>
		        </v-list-item>
		      </v-list-item-group>
		  </v-list>

    	</v-navigation-drawer>
    	 <v-app-bar
    	 color="white accent-4"
    	 fixed
    	 >
		    	<v-app-bar-nav-icon
		    	@click.stop="drawer = !drawer"
		    	></v-app-bar-nav-icon>

		    	<v-toolbar-title>edu.cyeko.com</v-toolbar-title>
		    	<v-spacer></v-spacer>

			      <v-btn icon>
			        <v-icon>mdi-magnify</v-icon>
			      </v-btn>
    	</v-app-bar>
      <v-content>
        <v-container>
        <v-banner>
        		<!-- Welocome to cyeko centre,We value your feed back -->
		    <template v-slot:actions>
		      <v-btn text color="primary"></v-btn>
		      <v-btn text color="primary"></v-btn>
		    </template>
		    <!-- {{Careers}} -->
		    <!-- {{feedbacks}} -->
		</v-banner>

		<v-banner>
        		Welocome to cyeko centre,We value your feed back
		    <template v-slot:actions>
		      <v-btn text color="primary"></v-btn>
		      <v-btn text color="primary"></v-btn>
		    </template>
		    <!-- {{Careers}} -->
		    <!-- {{feedbacks}} -->
		 </v-banner>
<template>
  <v-container class="grey lighten-5">
    <v-row>
      <v-col
        cols="12"
        sm="6"
      >
        <v-card
          class="pa-2"
          tile
        >
          <!-- One of three columns -->

          Leave a comment
        </v-card>
      </v-col>
     <v-col
        cols="12"
        sm="6"
      >
        <v-card
          class="pa-2"
          outlined
          tile
        >
          <!-- One of three columns -->
          Comments
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<template>
  <v-container class="grey lighten-5">
    <v-row no-gutters>
      <v-col
        cols="12"
        sm="6"
      >
        <v-card
          class="pa-2"
          outlined
          tile
        >
	          <!--  -->
		       <v-form class="px-3" @submit.prevent="addFeedback" id="login-form">
		       	{{message.success}}
		       	<v-text-field
		       	   label="Name"
            		required
            		outlined
            		v-model="name"
		       	></v-text-field>
		       	<v-text-field
		       	   label="Mobile"
            		required
            		outlined
            		v-model="phone"
		       	></v-text-field>
		       	<v-text-field
		       	   label="Email"
            		required
            		outlined
            		v-model="email"
		       	></v-text-field>
<!-- 		       	<v-text-field
		       	   label="Name"
            		required
            		outlined
            		v-model="name"
		       	></v-text-field>
		       	 -->
		       	<v-textarea
		       		label="Description"
            		required
            		outlined
            		v-model="description"
            		></v-textarea>
		       	 <v-btn text color="primary" type="submit">Submit</v-btn>
		       </v-form>
        </v-card>
      </v-col>
      <v-col
        cols="12"
        sm="6"
      >
        <v-card
          class="pa-2"
          outlined
          tile
        >
        	<v-container v-for="feedback in feedbacks" :key="feedback.id">
		        	<v-card flat>
		        		<v-card-text>
		        		<span class="font-weight-black">Name:</span>{{feedback.name}}
		        	</br>

		        		<!-- <span class="font-weight-black">Phone:</span>{{feedback.phone}}
		        	</br>
		        		<span class="font-weight-black">Eamil:</span>{{feedback.email}}
		        	</br> -->
		        		<span class="font-weight-black">FeedBack:</span>
		        	</br>
		        		{{feedback.description}}

		        		</v-card-text>
		        		<v-card-actions>
			        <?php 
			        if ($_SESSION['TYPE']=="Administrator") {
			        	?>
			      		<v-btn>
					      <a to :href="'tel:'+feedback.phone">CLICK TO CALL</a>

					        <!-- Learn More -->
					    </v-btn>
				       <?php
				        }
				         ?> 
		        		</v-card-actions>
		        	</v-card>
		  </v-container>     
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
    	</v-container>
      </v-content>
    </v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>


  <script>
  	Vue.prototype.$http = axios;
  	// import menuBar from 'bar'
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      	data:function(){
      		return{
      		drawer: null,
      		feedbacks:[],
			description:"",
			name:"",
			email:"",
			phone:"",
			message:{
				error:"",
				success:""
			}		

      		}
      	},
      	methods:{
      		addFeedback:function(){
      			console.log(this.loading);
      			if (this.name!='' && this.description !="" && this.email!='' && this.phone !="") {
      				let name=this.name,
      					description=this.description,
      					email=this.email,phone=this.phone;
      				this.$http
				      .post('../../../books/index.php/feedback/add',{name,description,email,phone})
				      .then(response => {
				        this.feedbacks = response.data.data.sort((a, b) => (b.id - a.id));
						this.message.success =response.data.message;
						this.message.error ="";
				        // console.log(this.feedbacks.);
				      })
				      .catch(error => {
				        console.log(error.response.data)
				        this.errored = true
				      })
				      .finally(() => this.loading = false);
			      				
      			}else{
      				alert("All field must be filled");
      			}
      		}
      	},
        beforeCreate: function() {
		    // console.log(this.$http.defaults);
		  },
	    created:function(){
	       this.$http
	      .get('../../../books/index.php/feedback/getFeedbacks')
	      .then(response => {
	        this.feedbacks = response.data.sort((a, b) => (b.id - a.id));;
	      })
	      .catch(error => {
	        console.log(error.response.data);
	        this.errored = true;
	     	this.message.success ="";
		    this.message.error ="error occured";
	      })
	      .finally(() => this.loading = false)
	  }	  
    })
  </script>
</body>
</html>