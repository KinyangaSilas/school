<div class="container">
  <div class="row">
        <div class="col-md-12">
            <form action="#" method="get">
                <div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
    <div class="col-md-12">
       <table class="table table-list-search">
                    <thead>
                        <th width="2%">#</th>
                        <th>Subject</th>
                        <th>Chapter</th>
                        <th>Title</th> 
                        <th width="2%">Action</th>
                    </thead>
                    <tbody>
                      <?php 
                      $sql ='';
                      if (strlen($subject)!=0) {
                        $sql="SELECT * FROM tbllesson WHERE Category='Docs' && LessonSubject='".$subject."'";
                      }else if(strlen($class)!=0){
                        $sql= "SELECT * FROM tbllesson WHERE Category='Docs' && LessonClass='".$class."'";
                      }else{
                        $sql="SELECT * FROM tbllesson WHERE Category='Docs'";
                      }
                      $mydb->setQuery($sql);
                      $cur = $mydb->loadResultList();
                      foreach ($cur as $result) {
                        # code...
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td>'.$result->LessonSubject.'</td>';
                        echo '<td>'.$result->LessonChapter.'</td>';
                        echo '<td>'.$result->LessonTitle.'</td>';
                        echo '<td><a href="index.php?q=viewpdf&id='.$result->LessonID.'" class="btn btn-xs btn-info"><i class="fa fa-info"></i> View File</a></td>';
                        echo '</tr>';
                      }
                      ?>
                    </tbody>
                </table>   
    </div>
  </div>
</div>
