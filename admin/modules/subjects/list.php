<?php
	if(!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
}

?>

 <div class="row">
      <div class="col-lg-12"> 
            <h1 class="page-header">List of  Subjects <small>|  <label class="label label-xs" style="font-size: 12px"><a href="index.php?view=add">  <i class="fa fa-plus-circle fw-fa"></i> New</a></label> |</small></h1> 
       		 
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  
			      <div class="table-responsive" id="subjectlist">			
				<table id="example" class="table table-responsive" style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<th width="5%">#</th>
				  		<th width="20%">Name</th>
				  		<th width="20%">Created</th>
				  		 <th width="20%">Status</th>
				  		<th>Actions</th> 
				 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<!-- list sits here -->
				  	<div class="">Loading...</div>
	  
				  </tbody>					
				</table> 
			</div>
				</form>
	 