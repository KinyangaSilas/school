<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<title>Cyeko Group ,High Satellite College</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <style type="text/css">
     * { 
        font-family: 'Lucida Calligraphy';
     }
      
#wrapper {
    width: 100%;
}

#page-wrapper {
    padding: 0 15px;
    min-height: 568px;
    background-color: #fff;
}
     .navbar-top-links {
    margin-right: 0;
}

.navbar-top-links li {
    display: inline-block;
    list-style-type: none;
    list-style: none;
}

.navbar-top-links li:last-child {
    margin-right: 15px;
}

.navbar-top-links li a {
    padding: 15px;
    min-height: 50px;
}

.navbar-top-links .dropdown-menu li {
    display: block;
}

.navbar-top-links .dropdown-menu li:last-child {
    margin-right: 0;
}

.navbar-top-links .dropdown-menu li a {
    padding: 3px 20px;
    min-height: 0;
}

.navbar-top-links .dropdown-menu li a div {
    white-space: normal;
}

.navbar-top-links .dropdown-messages,
.navbar-top-links .dropdown-tasks,
.navbar-top-links .dropdown-alerts {
    width: 310px;
    min-width: 0;
}

.navbar-top-links .dropdown-messages {
    margin-left: 5px;
}

.navbar-top-links .dropdown-tasks {
    margin-left: -59px;
}

.navbar-top-links .dropdown-alerts {
    margin-left: -123px;
}

.navbar-top-links .dropdown-user {
    right: 0;
    left: auto;
}

.sidebar .sidebar-nav.navbar-collapse {
    padding-right: 0;
    padding-left: 0;
}

.sidebar .sidebar-search {
    padding: 15px;
}

.sidebar ul li {
    border-bottom: 1px solid #e7e7e7;
}

.sidebar ul li a.active {
    background-color: #eee;
}

.sidebar .arrow {
    float: right;
}

.sidebar .fa.arrow:before {
    content: "\f104";
}

.sidebar .active>a>.fa.arrow:before {
    content: "\f107";
}

.sidebar .nav-second-level li,
.sidebar .nav-third-level li {
    border-bottom: 0!important;
}

.sidebar .nav-second-level li a {
    padding-left: 37px;
}

.sidebar .nav-third-level li a {
    padding-left: 52px;
}

@media(min-width:768px) {
    .sidebar {
        z-index: 1;
        position: absolute;
        width: 250px;
        margin-top: 51px;
    }

    .navbar-top-links .dropdown-messages,
    .navbar-top-links .dropdown-tasks,
    .navbar-top-links .dropdown-alerts {
        margin-left: auto;
    }
}
 </style>
   <?php
   // admin_confirm_logged_in();
  ?>
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

                <li>
                     <a href="<?php echo web_root; ?>/index.php?q=lesson"><i class="fa fa-files-o" aria-hidden="true"></i> Lesson </a> 
                </li>
                 <li>
                     <a href="<?php echo web_root; ?>/index.php?q=exercise"><i class="fa fa-superpowers" aria-hidden="true"></i> Exercises </a> 
                </li>
                 <li>
                     <a href="<?php echo web_root; ?>/index.php?q=download"><i class="fa fa-download" aria-hidden="true"></i>Downloads </a> 
                </li>
                 <!-- <li><a href="<?php echo web_root; ?>admin/modules/autonumber/index.php"><i class="fa fa-reload fa-fw"></i> Autonumber</a></li> -->
                 <!-- <li><a href="<?php echo web_root; ?>admin/modules/report/index.php"><i class="fa fa-info fa-fw"></i> Report</a></li> -->
                  <li>
                     <a href="<?php echo web_root; ?>/index.php?q=payment"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Payment </a> 
                </li>
                <li><a href="<?php echo web_root; ?>/index.php?q=about"><i class="fa fa-user fa-fw"></i> About</a></li>
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
<!-- Plugins -->
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
<!-- <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/jquery.js"></script> 
<script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
<script src="<?php echo web_root; ?>admin/adminMenu/dist/metisMenu.min.js"></script>
  
<script src="<?php echo web_root; ?>js/jquery.dataTables.min.js"></script>/
<script src="<?php echo web_root; ?>js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/kcctc.js"></script>
<script src="<?php echo web_root;?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script type="text/javascript" src="<?php echo web_root; ?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo web_root; ?>js/autofunc.js"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    var t = $('#example').DataTable( {
        "bSort": false,
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
 

          //vertical scroll
         // "scrollY":        "300px",

        // "scrollCollapse": true,

        //ordering start at column 1
        "order": [[ 1, 'desc' ]]
    } );

    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );

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
    //Add text editor 
     $("#ANNOUNCEMENT_WHAT").wysihtml5();
     $("#EVENT_WHAT").wysihtml5();
     $("#compose-textarea").wysihtml5();
  });
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker2').datetimepicker({
            locale: 'ru',
             autoclose: 1,
        });
    });
</script>

<script type="text/javascript">

$("#retype_user_pass").focusout(function(){

        var pass = $("#user_pass").val();
        var repass = $(this).val();
        if (pass != repass) {
            alert("Password does not match");
        };
});

function validatedpass(){

     var pass = $("#user_pass").val();
        var repass = $("#retype_user_pass").val();
        if (pass != repass) {
            alert("Password does not match");
            return false
        }else{
            return true
        };
}

$('#date_pickerfrom').datetimepicker({
  format: 'yyyy',
    language:  'en',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 4,
    minView: 4,
    forceParse: 0
    });


$('#date_pickerto').datetimepicker({
  format: 'yyyy',
    language:  'en',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 4,
    minView: 4,
    forceParse: 0
    });



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
 


// function truncateText(selector, maxLength) {
//     var element = document.querySelector(selector),
//         truncated = element.innerText;

//     if (truncated.length > maxLength) {
//         truncated = truncated.substr(0,maxLength) + '...';
//     }
//     return truncated;
// }
// //You can then call the function with something like what i have below.
// document.querySelector('#tds').innerText = truncateText('#tds', 107);
    </script> -->

</body>
</html>
