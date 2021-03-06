<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/css/mdb.min.css" rel="stylesheet">
  <!-- css -->
  <link href="css/style.css" rel="stylesheet">
</head>


<body>
  <!-- start Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark scrolling-navbar">
       
    <div class="container-fluid">  
      

         
    
      <button type="button" id="sidebarCollapse" class="btn btn-dark">
            <i class="fas fa-bars"></i>
         </button>


      <!-- logo -->
      <a class="navbar-brand mx-auto waves-effect wow fadeIn" href="index.php">
        <img src="images/fsu_logo.png" style="margin-right:2em;height:55px;display:block;">
      </a>

<!-- Dark Overlay element -->
<div class="overlay"></div>

<!-- Sidebar -->
<div id="sidebar">
    
    <div class="sidebar-header">
      <h3 class="display-5 wow fadeIn">Menu</h3>
    </div>
    <!--accordian menu-->
    <div id="accordion">
      <!--Events-->
        <div>
          <div id="headingOne">
            <h5 class="mb-0">
              <button class="wow fadeIn btn btn-dark btn-block collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Events
              </button>
            </h5>
          </div>
      
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div>
                <a href="add_event"><button class="wow fadeIn btn btn-light btn-block">Add an Event</button></a>

                <a href="select_event"><button class="wow fadeIn btn btn-light btn-block">Edit/Delete an Event</button></a>
            </div>
          </div>
        </div>
         <!--/Events-->

          <!--Banners-->
        <div>
            <div id="headingTwo">
              <h5 class="mb-0">
                <button class="wow fadeIn btn btn-dark btn-block collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  Banners
                </button>
              </h5>
            </div>
        
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div>
                  <a href="banner_management.php"><button class="wow fadeIn btn btn-light btn-block">Add a Banner</button></a>
  
                  <a href="select_banner"><button class="wow fadeIn btn btn-light btn-block">Edit/Delete a Banner</button></a>
              </div>
            </div>
          </div>
           <!--/Baners-->

        <!--Coupons-->
        <div>
            <div id="headingThree">
              <h5 class="mb-0">
                <button class="wow fadeIn btn btn-dark btn-block collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                  Coupons
                </button>
              </h5>
            </div>
        
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div>
                  <a href="coupon_client_management"><button class="wow fadeIn btn btn-light btn-block">Add a Client</button></a>
  
                  <a href="select_coupon_client"><button class="wow fadeIn btn btn-light btn-block">Edit/Delete a Client</button></a>

                  <a href="coupon_campaign_management"><button class="wow fadeIn btn btn-light btn-block">Add a Campaign</button></a>

                  <a href="select_coupon_campaign"><button class="wow fadeIn btn btn-light btn-block">Edit/Delete a Campaign</button></a>
              </div>
            </div>
          </div>
           <!--/Coupons-->    

 <!--Contests-->
 <div>
    <div id="headingFour">
      <h5 class="mb-0">
        <button class="wow fadeIn btn btn-dark btn-block collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          Contests
        </button>
      </h5>
    </div>

    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
      <div>
          <a href="contest_management"><button class="wow fadeIn btn btn-light btn-block">Pick a Winner</button></a>

      </div>
    </div>
  </div>
   <!--/Contests-->  

   <a href="logout"><button class="wow fadeIn btn btn-dark btn-block">Logout</button></a>

        <!--/accordian-->
      </div>
 
  </div>
   </div>
  </nav>
  <!-- Navbar -->


  


  <!--start main content area-->
  <main>
    <div class="container-fluid main-content py-4 pt-4 wow fadeIn mt-5">

<div class="row-fluid  wow fadeIn">