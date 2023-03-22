<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <base href="<?=base_url();?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>HR MANAGEMENT</title>
  <!-- loader-->
  <link href="public/assets/css/pace.min.css" rel="stylesheet"/>
  <script src="public/assets/js/pace.min.js"></script>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!--favicon-->
  <link rel="icon" href="public/assets/images/eagle_logo.png" type="image/x-icon">
  <!-- Vector CSS -->
  <!-- <link href="HR_Management_Website/public/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/> -->
  <!-- simplebar CSS-->
  <link href="public/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="public/assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="public/assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="public/assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="public/assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="public/assets/css/app-style.css" rel="stylesheet"/>

  <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet"/>
  

  <style>
    ::-webkit-scrollbar {
      width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: lightgray;
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888; 
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555; 
    }
  </style>
  
</head>

<body class="bg-theme bg-theme1">
 
<!-- Start wrapper-->
<!--End sidebar-wrapper-->
  
<?= $sidebar?>
<!--Start topbar header-->
<?= $header?>
<!--End topbar header-->

<!-- <div class="clearfix"></div> -->
	
  <div class="content-wrapper">

    <div class="container-fluid">
<!--Start Content  -->
<div class="content">
<?= $content?>
</div>
<!-- End Content  -->




  <!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		    <li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="public/assets/js/jquery.min.js"></script>
  <script src="public/assets/js/popper.min.js"></script>
  <script src="public/assets/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	

  <!-- b5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  

 <!-- simplebar js -->
  <script src="public/assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="public/assets/js/sidebar-menu.js"></script>
  <!-- loader scripts -->
  <!-- <script src="HR_Management_Website/public/assets/js/jquery.loading-indicator.js"></script> -->
  <!-- Custom scripts -->
  <script src="public/assets/js/app-script.js"></script>
  <!-- Chart js -->
  
  <script src="public/assets/plugins/Chart.js/Chart.min.js"></script>
 
  <!-- Index js -->
  <script src="public/assets/js/index.js"></script>
  
  <script>
      $(document).ready(function () {
        $('#example').DataTable();
    });
  </script>

</body>
</html>
