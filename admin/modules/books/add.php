                      <?php 
                    if(!isset($_SESSION['USERID'])){
  redirect(web_root."admin/index.php");
}

                      // $autonum = New Autonumber();
                      // $res = $autonum->single_autonumber(2);

                       ?> 
  <form class="form-horizontal span6" action="javascript(0)" method="POST" enctype="multipart/form-data" id="saveBook">
   <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Upload New Book</h1>
            <div id="message"> </div>        
          </div>
          <!-- /.col-lg-12 -->
       </div> 
             <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "LessonChapter">Book Title:</label>

                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-md" id="BookTitle" name="BookTitle" placeholder=
                            "Title" type="text" value="" required="required">
                      </div>
                    </div>
                  </div>
                      
                   <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "LessonTitle">Price:</label>

                      <div class="col-md-10">
                        <input name="CreatedBy" type="hidden" value="<?php echo $_SESSION['USERID']; ?> ">
                         <input class="form-control input-md" id="BookPrice" name="BookPrice" placeholder=
                            "Price" type="number" value="" required="required" min="0.00" max="10000.00" step="0.01">
                      </div>
                    </div>
                  </div>

                  <!--  <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "Category">Select File Type:</label>

                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                         <select class="form-control input-sm" id="Category" name="Category" >
                            <option>Docs</option>
                            <option>Video</option>
                         </select>
                      </div>
                    </div>
                  </div>
 -->
                   <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2" align = "right" for=
                      "file">Display Cover:</label>

                      <div class="col-md-10">
                      <input type="file" name="BookCover" accept="image/*"/>
                      </div>
                    </div>
                  </div>
                <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2" align = "right"for=
                      "BookLocation">Upload File:</label>

                      <div class="col-md-10">
                      <input type="file" id="BookLocation" name="BookLocation" accept="application/pdf,application/msword"/>
                      </div>
                    </div>
                  </div>
 
             <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "idno"></label>

                      <div class="col-md-10">
                       <button class="btn btn-primary btn-sm" id="btnSubmitBook" name="save" type="submit"><span class="fa fa-save fw-fa"></span>  Save</button> 
                         </div>
              </div>
         </div> 
        </form> 
