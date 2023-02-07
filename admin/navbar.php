    <style>
.sidebar{
  z-index: 1;
  top: 0;
  background: #2f323a;
  margin-top: 40px;
  padding-top: 30px;
  position: fixed;
  left: 0;
  width: 260px;
  height: 100%;
  transition: 0.5s;
  transition-property: left;
  overflow-y: auto;
  font-size: 18px;
}

.profile_info{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.sidebar .profile_info .profile_image{
  width: 50px;
  height: 50px;
  border-radius: 50px 50px;
  margin-bottom: 10px;
  margin-top: 10px;
}

.sidebar .profile_info h4{
  color: #ccc;
  margin-top: 1px;
  margin-bottom: 50px;
}

.sidebar a{
  color: #fff;
  display: block;
  width: 100%;
  line-height: 40px;
  text-decoration: none;
  padding-left: 30px;
  box-sizing: border-box;
  transition: 0.5s;
  transition-property: background;
  background: transparent;
}

.sidebar a:hover{
  background: #19B3D3;
}

.sidebar i{
  padding-right: 10px;
}

label #sidebar_btn{
  z-index: 1;
  color: #fff;
  position: fixed;
  cursor: pointer;
  left: 300px;
  font-size: 20px;
  margin: 5px 0;
  transition: 0.5s;
  transition-property: color;
}

label #sidebar_btn:hover{
  color: #19B3D3;
}

#check:checked ~ .sidebar{
  left: -185px;
}

#check:checked ~ .sidebar a{
  font-size: 20px;
  margin-left: 165px;
  width: 100%;
}

#check:checked ~ .sidebar .profile_info{
  display: none;
}

.mobile_nav{
  display: none;
}
/* Responsive CSS */

@media screen and (max-width: 780px){
  .sidebar{
    display: none;
  }

  #sidebar_btn{
    display: none;
  }
 #check:checked ~ .content{
    margin-left: 0;
  }
  .mobile_nav{
    display: block;
    width: calc(100% - 0%);
  }

  .nav_bar{
    background: #222;
    width: (100% - 0px);
    margin-top: 70px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
  }

  .nav_bar .mobile_profile_image{
    width: 50px;
    height: 50px;
    border-radius: 50% 50%;
  }

  .nav_bar .nav_btn{
    color: #fff;
    font-size: 22px;
    cursor: pointer;
    transition: 0.5s;
    transition-property: color;
  }

  .nav_bar .nav_btn:hover{
    color: #19B3D3;
  }

  .mobile_nav_items{
    background: #2F323A;
    display: none;
  }

  .mobile_nav_items a{
    color: #fff;
    display: block;
    text-align: center;
    letter-spacing: 1px;
    line-height: 60px;
    text-decoration: none;
    box-sizing: border-box;
    transition: 0.5s;
    transition-property: background;
  }

  .mobile_nav_items a:hover{
    background: #19B3D3;
  }

  .mobile_nav_items i{
    padding-right: 10px;
  }

  .active{
    display: block;
  }

  .mobile_nav_items{
    background: #2F323A;
    overflow: hidden;
    max-height: 0;
  transition: 0.5s;
  transition-property: max-height;
  }

  /*.mobile_nav_items a{
    color: #fff;
    display: block;
    text-align: center;
    letter-spacing: 1px;
    line-height: 60px;
    text-decoration: none;
    box-sizing: border-box;
    transition: 0.5s;
    transition-property: background;
  }

  .mobile_nav_items a:hover{
    background: #19B3D3;
  }

  .mobile_nav_items i{
    padding-right: 10px;
  }

  .active{
    max-height: 1000px;
  }*/
  
    </style>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <img src="agoy.jpg" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
    <a href="index.php?page=orders" class="nav-item nav-orders "><i class="fas fa-desktop"></i><span> Dashboard</span></a>
    <a href="index.php?page=menu" class="nav-item nav-menu"><i class="fas fa-th"></i><span> Menu </span></a>
    <?php if($_SESSION['login_type'] == 1): ?>
    <a href="index.php?page=users" class="nav-item nav-users"><i class="fas fa-users"></i><span> Users</span></a>
    <a href="index.php?page=site_settings" class="nav-item nav-site_settings"><i class="fas fa-cogs"></i><span> Site Settings</span></a>
    <a href="index.php?page=inventory" class="nav-item nav-inventory"><i class="fas fa-database"></i><span> Inventory</span></a>
  <a href="index.php?page=sales_report" class="nav-item nav-sales_report"><i class="fas fa-file"></i><span> Sales History</span></a>
  <?php endif; ?>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
      <div class="profile_info">
        <img src="agoy.jpg"class="profile_image" alt="">
        <h4>ADMIN</h4>
      </div>
    <a href="index.php?page=orders" class="nav-item nav-orders "><i class="fas fa-desktop"></i><span> Dashboard</span></a>
    <a href="index.php?page=menu" class="nav-item nav-menu"><i class="fas fa-th"></i><span> Menu</span></a>
     <?php if($_SESSION['login_type'] == 1): ?>
    <a href="index.php?page=users" class="nav-item nav-users"><i class="fas fa-users"></i><span> Users</span></a>
    <a href="index.php?page=site_settings" class="nav-item nav-site_settings"><i class="fas fa-cogs"></i><span> Site Settings</span></a>
    <a href="index.php?page=inventory" class="nav-item nav-inventory"><i class="fas fa-database"></i><span> Inventory</span></a>
    <a href="index.php?page=sales_report" class="nav-item nav-sales_report"><i class="fas fa-file"></i><span> Sales History</span></a>
      <?php endif; ?>
    </div>
    <!--sidebar end-->

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
    </script>
