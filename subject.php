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
                        <th width="2%">Action</th>
                    </thead>
                    <tbody>
                      <?php 
                      $sql = "SELECT * FROM tblsubject";
                      $mydb->setQuery($sql);
                      $cur = $mydb->loadResultList();
                      foreach ($cur as $result) {
                        # code...
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td>'.$result->SubjectName.'</td>';
                        echo '<td><a href="index.php?q=lesson&subject='.$result->SubjectName.'" class="btn btn-xs btn-info"><i class="fa fa-info"></i> View Chapters</a></td>';
                        echo '</tr>';
                      }
                      ?>
                    </tbody>
                </table>   
    </div>
  </div>
</div>