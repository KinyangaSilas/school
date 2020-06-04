<?php
	if(!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
}

?>

 <div class="row">
      <div class="col-lg-12"> 
            <h1 class="page-header">List of  Books <small>|  <label class="label label-xs" style="font-size: 12px"><a href="index.php?view=add">  <i class="fa fa-plus-circle fw-fa"></i> New</a></label> |</small></h1> 
       		 
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  
			      <div class="table-responsive" id="booklist">			
				<table id="example" class="table table-responsive" style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
<!-- 				  		<th width="5%">#</th>
				  		<th width="20%">Thumbnail</th>
				  		<th width="20%">Title</th>
				  		 <th width="20%">Status</th>
				  		<th>Actions</th> 
				  -->
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<!-- list sits here -->
	  
				  </tbody>					
				</table> 
			</div>
				</form>
	 