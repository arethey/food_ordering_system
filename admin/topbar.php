
<nav class="navbar navbar-dark fixed-top " style="padding:5px; background-color: dimgray;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
      <img src="iska.jpg" style="border-radius: 50px 50px; position: fixed; height: 35px; width: 35px;">
      <div class="col-md-4 float-left text-white" style="padding-top: 5px; letter-spacing: 1px; font-family: cursive; margin-left: 25px;">
        <large><b><?php echo $_SESSION['setting_name']; ?></b></large>
      </div>
	  	<div class="col-md-2 float-right text-white" style="padding-top: 5px;">
	  		<a href="ajax.php?action=logout" class="text-white"> <i class="fa fa-power-off" style="margin-left: 50px;"></i></a>
	    </div>
    </div>
  </div>

</nav>
