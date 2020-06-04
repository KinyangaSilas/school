    <div class="container">
<div class="row">
<div class="col-sm-4">
	<!-- Category -->
	<div class="single category">
		<h3 class="side-title">CLASSES</h3>
		<ul class="list-unstyled">
			<?php 
                      $sql = "SELECT * FROM tblclass";
                      $mydb->setQuery($sql);
                      $cur = $mydb->loadResultList();
                      foreach ($cur as $result) {

                        # code...
                        echo '<li><a href="index.php?q=lesson&class='.$result->ClassName.'" title="">'.$result->ClassName.' <span class="pull-right">1</span></a></li>';
                      }
                      ?>
		</ul>
   </div>
</div> 
</div>
</div>