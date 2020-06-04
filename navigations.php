<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<title>Cyeko Group ,High Satellite College</title>

<!-- Bootstrap core CSS -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen"/>
<link href="<?php echo web_root; ?>css/dataTables.bootstrap.css" rel="stylesheet" media="screen"/>  
<link href="<?php echo web_root; ?>css/alumni.css" rel="stylesheet" media="screen"/>
<link href="<?php echo web_root; ?>fonts/font-awesome.min.css" rel="stylesheet"/>   
<!-- <link href="<?php echo web_root; ?>admin/adminMenu/dist/metisMenu.min.css" rel="stylesheet"/>   -->

<link rel="stylesheet" href="<?php echo web_root; ?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="<?php echo web_root; ?>css/jquery-ui.css"> 
<!-- <link rel="stylesheet" href="<?php echo web_root; ?>web/viewer.css">  -->
<!-- Plugins -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<!-- production version, optimized for size and speed -->
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<!-- Custom styles for this template -->
<!-- <link href="<?php echo web_root; ?>css/offcanvas.css" rel="stylesheet"> -->
<!--    <?php
   admin_confirm_logged_in();
  ?> -->
  <style type="text/css">
.single {
padding: 30px 15px;
margin-top: 40px;
background: #fcfcfc;
border: 1px solid #f0f0f0; }
.single h3.side-title {
margin: 0;
margin-bottom: 10px;
padding: 0;
font-size: 20px;
color: #333;
text-transform: uppercase; }
.single h3.side-title:after {
content: '';
width: 60px;
height: 1px;
background: #ff173c;
display: block;
margin-top: 6px; }

.single ul {
margin-bottom: 0; }
.single li a {
color: #666;
font-size: 14px;
text-transform: uppercase;
border-bottom: 1px solid #f0f0f0;
line-height: 40px;
display: block;
text-decoration: none; }
.single li a:hover {
color: #ff173c; }
.single li:last-child a {
border-bottom: 0; }
  </style>
<body>
<section id="navigation">
<nav class="navbar navbar-default" role="navigation" style="margin-top: 0px">

<div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
   <li >
      <a class="navbar-brand"  href="<?php echo web_root; ?>index.php" >Cyeko Group ,High Sc Satellite College </a>
    </li>  
</div>
<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li>
                    <a href="#"><i class="fa fa-cogs" aria-hidden="true" >App</i> </a>
                </li>
<?php
if (isset($subject) && (strlen($subject)!=0)) {
 ?>
                <li>
                     <a href="<?php echo web_root; ?>index.php?q=lesson"><i class="fa fa-files-o" aria-hidden="true"></i> Lesson </a> 
                </li>
                 <li>
                     <a href="<?php echo web_root; ?>index.php?q=exercise"><i class="fa fa-superpowers" aria-hidden="true"></i> Exercises </a> 
                </li>

<?php
 }else{
  ?>
 <li><a href="<?php echo web_root; ?>index.php?q=subject" data-toggle="collapse" href="#collapseExample"><i class="fa fa-user fa-fw"></i> Subjects</a></li>
  <li><a href="<?php echo web_root; ?>index.php?q=class" data-toggle="collapse" href="#collapseExample"><i class="fa fa-user fa-fw"></i> Class</a></li>
  <li><a href="<?php echo web_root; ?>books" data-toggle="collapse" href="#collapseExample"><i class="fa fa-user fa-fw"></i> Books</a></li>

  <?php
} ?>
                 <li>
                     <a href="<?php echo web_root; ?>/index.php?q=download"><i class="fa fa-download" aria-hidden="true"></i>Downloads </a> 
                </li>
                <li>
                     <a href="<?php echo web_root; ?>/feedback"><i class="fa fa-download" aria-hidden="true"></i>Feedback </a> 
                </li>
                 <!-- <li><a href="<?php echo web_root; ?>admin/modules/autonumber/index.php"><i class="fa fa-reload fa-fw"></i> Autonumber</a></li> -->
                 <!-- <li><a href="<?php echo web_root; ?>admin/modules/report/index.php"><i class="fa fa-info fa-fw"></i> Report</a></li> -->
                  <li>
                     <a href="<?php echo web_root; ?>index.php?q=payment"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Payment </a> 
                </li>
                <li><a href="<?php echo web_root; ?>index.php?q=about" ><i class="fa fa-user fa-fw"></i> About</a></li>
                 <li><a href="<?php echo web_root; ?>logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
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
<script type="text/javascript">
  $(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

    //something is entered in search form
    $('#system-search').keyup( function() {
       var that = this;
        // affect all table rows on in systems table
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
        
            //Lower text for case insensitive
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();
                tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Searching for: "'
                    + $(that).val()
                    + '"</strong></td></tr>');
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                //hide rows
                tableRowsClass.eq(i).hide();
                
            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }
        });
        //all tr elements are hidden
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No entries found.</td></tr>');
        }
    });
});
</script>

</body>
</html>
