<html>
<head>
	<link rel='stylesheet' href='/public/bootstrap/css/bootstrap.min.css' />
	<link rel='stylesheet' href='/public/sidebar.css' />
	
	<title>Welcome My Blog.</title>
</head>
<body>
	 <?php include ('header.php'); ?>
	 
	 <div class='container'>
	 	<div class="page-header" id="banner">
        	<h1>Administor Page</h1>
      	</div>
     
	 	

<div class="row-offcanvas row-offcanvas-left">
  <div id="sidebar" class="sidebar-offcanvas">
      <div class="col-md-12">
        <h3>Menu</h3>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="#">Dashboard</a></li>
          <li><a href="#">New Table</a></li>
          <li><a href="#">Setting</a></li>
        </ul>
      </div>
  </div>
  <div id="main">
      <div class="col-md-12">
      	  <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h2>Fixed + Fluid Bootstrap Template with Off-canvas Sidebar</h2>
          <div class="row">
              <div class="col-md-12"><div class="well"><p>Shrink the browser width to make the sidebar collapse off canvase.</p></div></div>
          </div>
          <div class="row">
              <div class="col-md-4"><div class="well"><p>4 cols</p></div></div>
              <div class="col-md-4"><div class="well"><p>4 cols</p></div></div>
              <div class="col-md-4"><div class="well"><p>4 cols</p></div></div>
          </div>
          <div class="row">
              <div class="col-lg-6 col-sm-6"><div class="well"><p>6 cols, 6 small cols</p></div></div>
              <div class="col-lg-6 col-sm-6"><div class="well"><p>6 cols, 6 small cols</p></div></div>
          </div>
          <div class="row">
              <div class="col-lg-4 col-sm-6"><div class="well">4 cols, 6 small cols</div></div>
              <div class="col-lg-4 col-sm-6"><div class="well">4 cols, 6 small cols</div></div>
              <div class="col-lg-4 col-sm-12"><div class="well">4 cols, 12 small cols</div></div>
          </div>
      </div>
  </div>
</div><!--/row-offcanvas -->
	 </div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/public/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src='/public/sidebar.js'></script>
</body>