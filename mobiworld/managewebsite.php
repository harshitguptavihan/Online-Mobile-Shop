<!DOCTYPE html>

<?php 
error_reporting(0);
session_start();
if(!(isset($_SESSION['email'])&&isset($_SESSION['pass'])))
{
	header("Location:index.php");

}
$email=$_SESSION['email1'];
$pass=$_SESSION['pass1'];
$con=mysqli_connect("localhost","root","","oms");
$q="select * from tbl_admin where email='$email' and password='$pass'";
$query=mysqli_query($con,$q);
$row=mysqli_fetch_array($query);

$q3="select * from tbl_order";
$res1=mysqli_query($con,$q3);

$notifiy=0;
while($row3=mysqli_fetch_array($res1))
{
	$onoti=$row3['status'];
	if($onoti=='Ordered')
	{
		 $notifiy++;
	}
	
}
$q5="select * from tbl_return";
$res5=mysqli_query($con,$q5);

$noti=0;
while($row4=mysqli_fetch_array($res5))
{
	
	if($row4['status']=='Return Requested')
	{
		 $noti++;
	}
	
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="material-design-iconic-font/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="css\bootstrap.css">
<link rel="stylesheet" href="css\font-awesome.css">
<link rel="stylesheet" href="css\animate.css">
        <!-- Our Custom CSS -->
        <style>
		@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.wrapper {
    display: flex;
    align-items: stretch;
}

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: #222222;
    color: #fff;
    transition: all 0.3s;
}

#sidebar.active {
    margin-left: -250px;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #222222;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #7e4596;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 12px;
    display: block;
}
#sidebar ul li a:hover {
    color: BLACK;
    background: rgba(43,180,232,0.7);
	transition:0.5s;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: black;
    background: #7e4596;
}


a[data-toggle="collapse"] {
    position: relative;
}

a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {
    content: '\e259';
    display: block;
    position: absolute;
    right: 20px;
    font-family: 'Glyphicons Halflings';
    font-size: 0.6em;
}
a[aria-expanded="true"]::before {
    content: '\e260';
}


ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #7e4596;
}

#content {
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
}


@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
    #sidebarCollapse span {
        display: none;
    }
}


		</style>
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header" >
                    <img src="photo/logo1.png" class="img img-responsive">
                </div>

                <ul class="list-unstyled components">
				
				
					<br>
					<br>
					<br>
					<br>
                    <li>
                        <a href="admin.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</a>
                        
                    </li>
                    <li>
                       <a href="managephone.php"><i class="glyphicon glyphicon-phone"aria-hidden="true"></i>&nbsp;&nbsp;
Manage Phones </a>
                    </li>
					<li>
                        <a href="manageaccessories.php"><i class="fa fa-headphones"aria-hidden="true"></i>&nbsp;&nbsp;
Manage Accessories </a>
                    </li>
					<li>
					 <a href="managecustomer.php"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Manage Customer</a>
					</li>
                    <li>
                        <a href="manageorder.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Manage Orders<?php
						if($notifiy>=1)
						{
							?>
							
						<i class="zmdi zmdi-notifications-active animated infinite pulse" aria-hidden="true" style="margin-left:80px"></i>	
							<?php
						}
						?></a>
                    </li>
					<li class="active">
                        <a href="managewebsite.php"><i class="fa fa-file-image-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Manage Website</a>
                    </li>
					<li>
                        <a href="managereturn.php"><i class="zmdi zmdi-assignment-return" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Return Items<?php
						if($noti>=1)
						{
							?>
							
						<i class="zmdi zmdi-notifications-active animated infinite pulse" aria-hidden="true" style="margin-left:100px;"></i>	
							<?php
						}
						?></a>
                    </li>
					 <li>
                        <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Log Out</a>
                    </li>
                </ul>

                
            </nav>

            <!-- Page Content Holder -->
            <div class="col-sm-12" id="content">

                <nav>
                    <div class="container-fluid">

                        <div>
                            <button type="button" id="sidebarCollapse" class="btn navbar-btn" style="background-color:#7e4596">
                                <i class="glyphicon glyphicon-chevron-left" style="color:black"></i>
                                
                            </button>
                        </div>

                      
                    </div>
                </nav>

              


<br>

<div class=" col-sm-offset col-sm-12" style="margin-top:70px">
<div style="margin:auto;border-radius:5px;margin-top:160px;border:none;box-shadow:3px 3px 7px gray;width:100%" class="panel panel-primary " >




<div class="panel panel-body" style="margin-top:-195px;">
<div class="col-sm-12">
<div class="row">
<h2 class="text-center" style="font-weight:bold;color:#161F27">Manage Website Content</h2> 
</div><br>
<form  action="managewebsitecode.php" method="POST" class="form" enctype="multipart/form-data">
<div class="row">
<div class=" col-sm-4" >
<h3 style="font-weight:bold">Carousel Update:</h3>
</div>
<div class="col-sm-offset-2 col-sm-4 text-center" >
<h3 style="font-weight:bold">Hot Accessories Update:</h3>
</div>
</div><br>
		 <div class="row">
          <div class=" col-sm-6">
        <span style="font-weight:bold">Carousel Image 1:</span> &nbsp;<input type="file" name="image1" style="display:inline-block">
          </div>
		  <div class=" col-sm-6">
        <span style="font-weight:bold">Accessory Image 1:</span> <input type="file" name="accimg1" style="display:inline-block"><br><br>
		<span style="font-weight:bold">Heading:</span><br> <input class="form-control" type="text" name="head1" ><br><br>
		<span style="font-weight:bold">Price:</span><br> <input class="form-control" type="text" name="price1" >
          </div>
		  </div><br><hr><br>
		   <div class="row">
         
          <div class=" col-sm-6">
        <span style="font-weight:bold">Carousel Image 2:</span> &nbsp;<input type="file" name="image2" style="display:inline-block">
          </div>
		  <div class=" col-sm-6">
        <span style="font-weight:bold">Accessory Image 2:</span> <input type="file" name="accimg2" style="display:inline-block"><br><br>
		<span style="font-weight:bold">Heading:</span><br> <input class="form-control" type="text" name="head2" ><br><br>
		<span style="font-weight:bold">Price:</span><br> <input class="form-control" type="text" name="price2" >
          </div>
		  
		  </div><br><hr>
 <br>
		   <div class="row">
         
          <div class=" col-sm-6">
        <span style="font-weight:bold">Carousel Image 3:</span> &nbsp;<input type="file" name="image3" style="display:inline-block">
          </div>
		  <div class=" col-sm-6">
        <span style="font-weight:bold">Accessory Image 3:</span> <input type="file" name="accimg3" style="display:inline-block"><br><br>
		<span style="font-weight:bold">Heading:</span><br> <input class="form-control" type="text" name="head3" ><br><br>
		<span style="font-weight:bold">Price:</span><br> <input class="form-control" type="text" name="price3" >
          </div>
		
		  </div><br><hr>
 <br>
		  
         <div class="row">
          <div class=" col-sm-6">
        <span style="font-weight:bold">Carousel Image 4:</span> &nbsp;<input type="file" name="image4" style="display:inline-block">
          </div>
		  <div class=" col-sm-6">
        <span style="font-weight:bold">Accessory Image 4:</span> <input type="file" name="accimg4" style="display:inline-block"><br><br>
		<span style="font-weight:bold">Heading:</span><br> <input class="form-control" type="text" name="head4" ><br><br>
		<span style="font-weight:bold">Price:</span><br> <input class="form-control" type="text" name="price4" >
          </div>
		  </div>
		  <br><hr>
 
<br>
		   <div class="row">
         
          <div class=" col-sm-6">
        <span style="font-weight:bold">Carousel Image 5:</span> &nbsp;<input type="file" name="image5" style="display:inline-block">
          </div>
		  <div class=" col-sm-6">
        <span style="font-weight:bold">Accessory Image 5:</span> <input type="file" name="accimg5" style="display:inline-block"><br><br>
		<span style="font-weight:bold">Heading:</span><br> <input class="form-control" type="text" name="head5" ><br><br>
		<span style="font-weight:bold">Price:</span><br> <input class="form-control" type="text" name="price5" >
          </div>
		  
		  </div><br><hr><br>
<div class="row">
<div class="col-sm-6 ">
<span style="font-weight:bold;display:inline-block">Accessory Image: </span> <input type="file" name="bigimg" style="display:inline-block">
</div>
<div class="col-sm-offset col-sm-4">
<h3 style="font-weight:bold;display:inline-block">Videos Update:</h3>
</div>
</div><br>
<div class="row">
<div class="col-sm-offset-6 col-sm-6 ">

<span style="font-weight:bold">Video 1:</span>&nbsp; <input type="file" name="vid1" style="display:inline-block"><br><br>
<span style="font-weight:bold">Video 2:</span>  <input type="file" name="vid2" style="display:inline-block"><br><br>
<span style="font-weight:bold">Video 3:</span>  <input type="file" name="vid3" style="display:inline-block">
</div>

</div><br>
		
<br><br>

         <div class="row">
          <div class="col-sm-offset-4 col-sm-4 " >
          <input type="submit" class="btn  btn-primary form-control" value="Update Content" name="sub">
          </div>
          </div>
</form>
        
		
</div>
</div>
</div>

</div>
                       
                    
            </div>
        </div>





        <!-- jQuery CDN -->
         <script src="js\jquery.js"></script>
<script src="js\bootstrap.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>