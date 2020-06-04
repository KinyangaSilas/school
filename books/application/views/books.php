<?php 
foreach ($books as $book => $value) {
				  		echo '<tr>';
				  		echo '<td width="5%" align="center"></td>'; 
				  		echo '<td><img src="'.base_url()."".$value->BookCover.'"  class="img-thumbnail" /></td>';
				  		echo '<td>'.$value->BookTitle.'</td>';
				  		echo '<td>'. $value->ApprovalStatus.'</td>';
				  		echo '<td align="center" > <a title="Edit Details" href="index.php?view=edit&id='.$value->BookCover.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></span> Edit</a> 
				  					<a title="Change File" href="index.php?view=uploadfile&id='.$value->BookCover.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-upload fw-fa"></span> Change File</a> 
				  					 <a title="View Files"  href="'.$value->BookCover.'" class="btn btn-info btn-xs" ><span class="fa fa-info fw-fa"></span> View</a>
				  					 <a title="Delete" href="controller.php?action=delete&id='.$value->BookCover.'" class="btn btn-danger btn-xs" ><span class="fa fa-trash-o fw-fa"></span> Delete</a>
				  					 </td>';
				  		echo "<tr>";
}
 ?>