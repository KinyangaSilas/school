<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Cyeko Group ,High Satellite College</title>

<!-- Bootstrap core CSS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen"/>
<link href="<?php echo web_root; ?>css/dataTables.bootstrap.css" rel="stylesheet" media="screen"/>  
<link href="<?php echo web_root; ?>css/alumni.css" rel="stylesheet" media="screen"/>
<link href="<?php echo web_root; ?>fonts/font-awesome.min.css" rel="stylesheet"/>   
<!-- <link href="<?php echo web_root; ?>admin/adminMenu/dist/metisMenu.min.css" rel="stylesheet"/>   -->

<link rel="stylesheet" href="<?php echo web_root; ?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="<?php echo web_root; ?>css/jquery-ui.css"> 
<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<!-- production version, optimized for size and speed -->
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<!-- <link rel="stylesheet" href="<?php echo web_root; ?>web/viewer.css">  -->
<!-- Plugins -->

 <style type="text/css">
/*     #navigation {
        margin-bottom: 40px;
     }
     #page-wrapper{
        min-height: 900px;
     }
     #page-footer {
        border-top: 1px solid #ddd;
        margin-top: -15px;
        padding: 10px;
     }*/
    /* * { 
        font-family: 'Lucida Calligraphy';
     }*/
 </style>
<!-- Custom styles for this template -->
<!-- <link href="<?php echo web_root; ?>css/offcanvas.css" rel="stylesheet"> -->
   <?php
   admin_confirm_logged_in();
  ?>
<body>
 <section id="navigation">
<nav class="navbar navbar-default  " role="navigation" style="margin-top: 0px">

<div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand"  href="<?php echo web_root; ?>admin/index.php" >Cyeko Group ,High Satellite College </a>
</div>

  <ul class="nav navbar-top-links navbar-right" >
   <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" >
                <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['NAME']; ?>  
            </a> 

    </li>
         <li><a href="<?php echo web_root; ?>admin/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
  </ul>

<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
            <!--     <li>
                    <a href="<?php echo web_root; ?>admin/index.php"><i class="fa fa-dashboard fa-fw"></i> Statistic</a>
                </li> -->

                <li>
                     <a href="<?php echo web_root; ?>admin/modules/lesson/index.php"><i class="fa fa-user fa-fw"></i> Lesson </a> 
                </li>
                 <li>
                     <a href="<?php echo web_root; ?>admin/modules/exercises/index.php"><i class="fa fa-user fa-fw"></i> Exercises </a> 
                </li>
                 <li>
                     <a href="<?php echo web_root; ?>admin/modules/modstudent/index.php"><i class="fa fa-user fa-fw"></i> Student </a> 
                </li>
                 <li>
                     <a href="<?php echo web_root; ?>admin/modules/books/index.php"><i class="fa fa-user fa-fw"></i> Books </a> 
                </li>

                <?php if($_SESSION['TYPE']=="Administrator"){ ?>
                  <li><a href="<?php echo web_root; ?>admin/modules/subjects/index.php"><i class="fa fa-info fa-fw"></i> Subjects</a></li>
                <li><a href="<?php echo web_root; ?>admin/modules/user/index.php"><i class="fa fa-user fa-fw"></i> Manage Users</a></li>
                 <!-- <li><a href="<?php echo web_root; ?>admin/modules/autonumber/index.php"><i class="fa fa-reload fa-fw"></i> Autonumber</a></li> -->
                 <!-- <li><a href="<?php echo web_root; ?>admin/modules/report/index.php"><i class="fa fa-info fa-fw"></i> Report</a></li> -->
                  <li>
                     <a href="<?php echo web_root; ?>admin/modules/payments/index.php"><i class="fa fa-user fa-fw"></i> Payment </a> 
                </li>
                 <?php } ?>
                <li>
                     <a href="<?php echo web_root; ?>admin/modules/careers/index.php"><i class="fa fa-user fa-fw"></i> Careers </a> 
                </li>
                <li>
                     <a href="<?php echo web_root; ?>admin/modules/feedback/index.php"><i class="fa fa-user fa-fw"></i> Feed Back </a> 
                </li> 
                <li>
                  <a href="<?php echo web_root; ?>admin/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
</nav>
</section>


<section id="page-wrapper"> 
  <?php  check_message(); ?> 
  <?php  require_once $content;?>  
 </section> 

<section id="page-footer"> 
      <footer>  <p align="center">&copy; Cyeko Group ,High Satellite College </p></footer>
</section>
<!-- Plugins -->




<script type="text/javascript" charset="utf-8">
// $(document).ready(function() {
//     var t = $('#example').DataTable( {
//         "bSort": false,
//         "columnDefs": [ {
//             "searchable": false,
//             "orderable": false,
//             "targets": 0
//         } ],
 

//           //vertical scroll
//          // "scrollY":        "300px",

//         // "scrollCollapse": true,

//         //ordering start at column 1
//         "order": [[ 1, 'desc' ]]
//     } );

//     t.on( 'order.dt search.dt', function () {
//         t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
//             cell.innerHTML = i+1;
//         } );
//     } ).draw();
// } );

</script>


<script>

$(function(){
  $(".tds").each(function(i){
    len=$(this).text().length;
    if(len>80)
    {
      $(this).text($(this).text().substr(0,80)+'...');
    }
  });
});
  $(function () {
    // //Add text editor 
    //  $("#ANNOUNCEMENT_WHAT").wysihtml5();
    //  $("#EVENT_WHAT").wysihtml5();
    //  $("#compose-textarea").wysihtml5();
  });
</script>
<script type="text/javascript">

</script>

<script type="text/javascript">

// $("#retype_user_pass").focusout(function(){

//         var pass = $("#user_pass").val();
//         var repass = $(this).val();
//         if (pass != repass) {
//             alert("Password does not match");
//         };
// });

// function validatedpass(){

//      var pass = $("#user_pass").val();
//         var repass = $("#retype_user_pass").val();
//         if (pass != repass) {
//             alert("Password does not match");
//             return false
//         }else{
//             return true
//         };
// }

// $('#date_pickerfrom').datetimepicker({
//   format: 'yyyy',
//     language:  'en',
//     weekStart: 1,
//     todayBtn:  1,
//     autoclose: 1,
//     todayHighlight: 1,
//     startView: 4,
//     minView: 4,
//     forceParse: 0
//     });


// $('#date_pickerto').datetimepicker({
//   format: 'yyyy',
//     language:  'en',
//     weekStart: 1,
//     todayBtn:  1,
//     autoclose: 1,
//     todayHighlight: 1,
//     startView: 4,
//     minView: 4,
//     forceParse: 0
//     });



</script>


<script>
  function checkall(selector)
  {
    if(document.getElementById('chkall').checked==true)
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=true;
      }
    }
    else
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=false;
      }
    }
  }
   function checkNumber(textBox){
        while (textBox.value.length > 0 && isNaN(textBox.value)) {
          textBox.value = textBox.value.substring(0, textBox.value.length - 1)
        }
        textBox.value = trim(textBox.value);
      }
      //
      function checkText(textBox)
      {
        var alphaExp = /^[a-zA-Z]+$/;
        while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
          textBox.value = textBox.value.substring(0, textBox.value.length - 1)
        }
        textBox.value = trim(textBox.value);
      }

  </script>

<script type="text/javascript">
 $(document).ready(function(){
  //get list of books
  function getAllBooks(){
              $.ajax({
              url:"../../../books/index.php/book/getAll",
              type: "GET",
              enctype: 'multipart/form-data',
              processData: false,  // Important!
              contentType: false,
              cache: false,
              timeout: 600000
            })
            .done(function(data){
              $("#booklist tbody").html(data);
              // console.log(data);
              // let response =JSON.parse(data);
              // $('#message').html(response.message).addClass("alert alert-info text-center"); 
              // // $("#btnSubmitBook").prop("disabled", false);
            })
            .fail(function(error){
              console.log(error);
              // $('#alert').html(error); 
              // $("#btnSubmitBook").prop("disabled", false);
            });
      }
  //check file size
  $("#BookLocation").on("change",function(){
    var file =this.files[0];
    if (ValidateSize(file)) {$(this).val('')}
  });

  // ValidateSize
  function ValidateSize(file) {
        var FileSize = file.size / 1024 / 1024; // in MB
        if (FileSize > 2) {
            alert('File size is Too Big');
           return true //for clearing with Jquery
        } else {
    return false
        }
    }
    $("#lessonupload").on('submit',function(ev){
            ev.preventDefault();
            var form = $(this)[0];
            var data = new FormData(form);
            $("#btnSubmitBook").prop("disabled", true);
            $.ajax({
              url:"upload.php",
              data:data,
              type: "POST",
              enctype: 'multipart/form-data',
              processData: false,  // Important!
              contentType: false,
              cache: false,
              timeout: 600000
            })
            .done(function(data){
              console.log(data);
              // let response =JSON.parse(data);
              // $('#message').html(response.message).addClass("alert alert-info text-center"); 
              // $("#btnSubmitBook").prop("disabled", false);
            })
            .fail(function(error){
              console.log(error);
              // $('#alert').html(error); 
              // $("#btnSubmitBook").prop("disabled", false);
            })
    });
  //save new book
   $("#saveBook").on('submit',function(ev) {
            ev.preventDefault();
            var form = $(this)[0];
            var data = new FormData(form);
            $("#btnSubmitBook").prop("disabled", true);
            $.ajax({
              url:"../../../books/index.php/book/add",
              data:data,
              type: "POST",
              enctype: 'multipart/form-data',
              processData: false,  // Important!
              contentType: false,
              cache: false,
              timeout: 600000
            })
            .done(function(data){
              let response =JSON.parse(data);
              $('#message').html(response.message).addClass("alert alert-info text-center"); 
              // $("#btnSubmitBook").prop("disabled", false);
            })
            .fail(function(error){
              console.log(error);
              $('#alert').html(error); 
              $("#btnSubmitBook").prop("disabled", false);
            })
          });
   // save subject to the database
      $("#saveSubject").on('submit',function(ev) {
            ev.preventDefault();
            var form = $(this)[0];
            var SubjectData = new FormData(form);
            $("#btnSubmitSubject").prop("disabled", true);
            $.ajax({
              url:"../../../books/index.php/subject/add",
              data:SubjectData,
              type: "POST",
              enctype: 'multipart/form-data',
              processData: false,  // Important!
              contentType: false,
              cache: false,
              timeout: 600000
            })
            .done(function(data){
              let responseData =JSON.parse(data);
              console.log(responseData);
              $('#message').addClass("alert alert-info text-center"); 
              $('#message').html(responseData.message); 
              $("#btnSubmitBook").prop("disabled", false);
            })
            .fail(function(error){
              console.log(error);
              // $('#alert').html(error); 
              $('#message').addClass("alert alert-info text-center"); 
              $("#btnSubmitBook").prop("disabled", false);
            })
          });
   getAllBooks();

 });

</script>

</body>
</html>
