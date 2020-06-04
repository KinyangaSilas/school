<?php 
require_once("../../../include/initialize.php");
if(!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Careers centre</title>
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
		            <v-icon></v-icon>
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
        		<?php 
        		if ($_SESSION['TYPE']=="Administrator") {
        			?>
        	<v-expansion-panels flat width="100%">
		    <v-expansion-panel width="100%">
		      <v-expansion-panel-header>
		      	{{message.error}}
		      	{{message.success}}
		      <template v-slot:actions>
		      <!-- <v-btn text color="primary">Dismiss</v-btn> -->
		      <v-btn text color="primary">NEW CAREER</v-btn>
		      <!-- <v-btn text color="primary">Apply</v-btn> -->
		     </template>
		      </v-expansion-panel-header>
		      <v-expansion-panel-content>
		       <v-form class="px-3" @submit.prevent="addCareer" id="login-form">
		       	<v-text-field
		       	   label="Name"
            		required
            		outlined
            		v-model="name"
		       	></v-text-field>
		       	<v-textarea
		       		label="Description"
            		required
            		outlined
            		v-model="description"
            		></v-textarea>
		       	 <v-btn text color="primary" type="submit">Add</v-btn>
		       </v-form>
		     
		     <!-- </template> -->
		      </v-expansion-panel-content>
		    </v-expansion-panel>
		  </v-expansion-panels>

        	<?php
        		}
        		 ?>
        		Welocome to cyeko career centre
		    <template v-slot:actions>
		      <v-btn text color="primary"></v-btn>
		      <v-btn text color="primary"></v-btn>
		    </template>
		    <!-- {{Careers}} -->
		  </v-banner>
		<v-expansion-panels>
		    <v-expansion-panel
		      v-for="Career in Careers" :key="Career.code"
		    >
		      <v-expansion-panel-header>
		      	{{Career.name}}
		      <template v-slot:actions>
		      <!-- <v-btn text color="primary">Dismiss</v-btn> -->
		      <v-btn text color="primary">View</v-btn>
		      <!-- <v-btn text color="primary">Apply</v-btn> -->
		     </template>
		      </v-expansion-panel-header>

		      <v-expansion-panel-content>
		       {{Career.description}}
		       		<v-expansion-panels>
		    			<v-expansion-panel>
		    				<v-expansion-panel-header>
							      <template v-slot:actions>
							      <!-- <v-btn text color="primary">Dismiss</v-btn> -->
							      <v-btn text color="primary">Apply</v-btn>
							      <!-- <v-btn text color="primary">Apply</v-btn> -->
							     </template>
							</v-expansion-panel-header>
							<v-expansion-panel-content>
								<?php var_dump($_SESSION)?>
													 <!--  -->
							       <v-form class="px-3" @submit.prevent="ApplyJob" id="login-form">
							       	{{message.success}}
							       <!-- 	<v-text-field
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
							       	></v-text-field> -->
					<!-- 		       	<v-text-field
							       	   label="Name"
					            		required
					            		outlined
					            		v-model="name"
							       	></v-text-field>
							       	 -->
							       	<v-textarea
							       		label="Description about yourself"
					            		required
					            		outlined
					            		v-model="description"
					            		></v-textarea>
					            		<v-file-input 
					            		accept=".pdf" 
					            		label="Select File..."
					            		v-model="file"
					            		></v-file-input>
							       	 <v-btn text color="primary" type="submit">Submit</v-btn>
							       </v-form>
							</v-expansion-panel-content>
		    			</v-expansion-panel>
		    		</v-expansion-panels>
		      </v-expansion-panel-content>
		    </v-expansion-panel>
		  </v-expansion-panels>
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
      		drawer:null,
      		file: null,
    		url: null,
      		Careers:[],
			description:"",
			name:"",
			message:{
				error:"",
				success:""
			}		

      		}
      	},
      	methods:{
      		ApplyJob:function(){
      			alert(this.file);
      			console.log(this);
      // 			if (this.name!='' && this.description !="") {
      // 				let name=this.name,
      // 					description=this.description;
      // 				this.$http
				  //     .post('../../../books/index.php/Careers/add',{name,description})
				  //     .then(response => {
				  //       this.Careers = response.data.data;

						// this.message.success =response.data.message;
						// this.message.error ="";
				  //       console.log(response.data);
				  //     })
				  //     .catch(error => {
				  //       console.log(error.response.data)
				  //       this.errored = true
				  //     })
				  //     .finally(() => this.loading = false);
			      				
      // 			}else{
      // 				alert("All field must be filled");
      // 			}
      		}
      	},
        beforeCreate: function() {
		    // console.log(this.$http.defaults);
		  },
	    created:function(){
	      this.$http
	      .get('../../../books/index.php/Careers/getCareers')
	      .then(response => {
	        this.Careers = response.data;
	        // console.log(this.Careers);
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