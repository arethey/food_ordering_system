<?php
	include 'db_connect.php';

	$resultOrders = $conn->query("SELECT * FROM orders WHERE status = 0");
	$row_cnt_all_orders = $resultOrders->num_rows;

	$resultApprovedOrders = $conn->query("SELECT * FROM orders WHERE status = 1");
	$row_cnt_approved_orders = $resultApprovedOrders->num_rows;

	$resultCancelledOrders = $conn->query("SELECT * FROM orders WHERE status = 2");
	$row_cnt_cancelled_orders = $resultCancelledOrders->num_rows;

    $resultDeliveryOrders = $conn->query("SELECT * FROM orders WHERE status = 3");
  $row_cnt_delivery_orders = $resultDeliveryOrders->num_rows;

    $resultDeliOrders = $conn->query("SELECT * FROM orders WHERE status = 4");
  $row_cnt_deli_orders = $resultDeliOrders->num_rows;

	$resultDeliveredOrders = $conn->query("SELECT * FROM orders WHERE status = 5");
	$row_cnt_delivered_orders = $resultDeliveredOrders->num_rows;

  $curr_year = date("Y");
  $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

  $first_day = date('Y-m-01 H:i:s', strtotime("January $curr_year"));
  $January_orders = $conn->query("SELECT * FROM orders WHERE status = 5 AND order_date BETWEEN  '$first_day' AND LAST_DAY('$first_day')");
	$January_orders_count = $January_orders->num_rows;

  $first_day = date('Y-m-01 H:i:s', strtotime("February $curr_year"));
  $February_orders = $conn->query("SELECT * FROM orders WHERE status = 5 AND order_date BETWEEN  '$first_day' AND LAST_DAY('$first_day')");
	$February_orders_count = $February_orders->num_rows;

  $first_day = date('Y-m-01 H:i:s', strtotime("March $curr_year"));
  $March_orders = $conn->query("SELECT * FROM orders WHERE status = 5 AND order_date BETWEEN  '$first_day' AND LAST_DAY('$first_day')");
	$March_orders_count = $March_orders->num_rows;

  $first_day = date('Y-m-01 H:i:s', strtotime("April $curr_year"));
  $April_orders = $conn->query("SELECT * FROM orders WHERE status = 5 AND order_date BETWEEN  '$first_day' AND LAST_DAY('$first_day')");
	$April_orders_count = $April_orders->num_rows;

  $first_day = date('Y-m-01 H:i:s', strtotime("May $curr_year"));
  $May_orders = $conn->query("SELECT * FROM orders WHERE status = 5 AND order_date BETWEEN  '$first_day' AND LAST_DAY('$first_day')");
	$May_orders_count = $May_orders->num_rows;

  $first_day = date('Y-m-01 H:i:s', strtotime("June $curr_year"));
  $June_orders = $conn->query("SELECT * FROM orders WHERE status = 5 AND order_date BETWEEN  '$first_day' AND LAST_DAY('$first_day')");
	$June_orders_count = $June_orders->num_rows;

  $first_day = date('Y-m-01 H:i:s', strtotime("July $curr_year"));
  $July_orders = $conn->query("SELECT * FROM orders WHERE status = 5 AND order_date BETWEEN  '$first_day' AND LAST_DAY('$first_day')");
	$July_orders_count = $July_orders->num_rows;

  $first_day = date('Y-m-01 H:i:s', strtotime("August $curr_year"));
  $August_orders = $conn->query("SELECT * FROM orders WHERE status = 5 AND order_date BETWEEN  '$first_day' AND LAST_DAY('$first_day')");
	$August_orders_count = $August_orders->num_rows;

  $first_day = date('Y-m-01 H:i:s', strtotime("September $curr_year"));
  $September_orders = $conn->query("SELECT * FROM orders WHERE status = 5 AND order_date BETWEEN  '$first_day' AND LAST_DAY('$first_day')");
	$September_orders_count = $September_orders->num_rows;

  $first_day = date('Y-m-01 H:i:s', strtotime("October $curr_year"));
  $October_orders = $conn->query("SELECT * FROM orders WHERE status = 5 AND order_date BETWEEN  '$first_day' AND LAST_DAY('$first_day')");
	$October_orders_count = $October_orders->num_rows;

  $first_day = date('Y-m-01 H:i:s', strtotime("November $curr_year"));
  $November_orders = $conn->query("SELECT * FROM orders WHERE status = 5 AND order_date BETWEEN  '$first_day' AND LAST_DAY('$first_day')");
	$November_orders_count = $November_orders->num_rows;

  $first_day = date('Y-m-01 H:i:s', strtotime("December $curr_year"));
  $December_orders = $conn->query("SELECT * FROM orders WHERE status = 5 AND order_date BETWEEN  '$first_day' AND LAST_DAY('$first_day')");
	$December_orders_count = $December_orders->num_rows;
?>
<style>
    .home-content .overview-boxes{
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  padding: 0 20px;
  margin-bottom: 18px;
}
.overview-boxes .box{
  display: flex;
  align-items: top;
  justify-content: center;
  width: calc(100% / 4 - 5px);
  height: 120px;
  padding: 15px 14px;
  border-radius: 10px 10px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.overview-boxes .box-topic{
  font-size: 18px;
  letter-spacing: 1px;
  font-weight: 500px;
  color: black;
}
.home-content .box .indicator{
  display: flex;
  align-items: center;
}
.home-content .box .indicator i{
  height: 20px;
  width: 20px;
  background: #8FDACB;
  line-height: 20px;
  text-align: center;
  border-radius: 50%;
  color: #fff;
  font-size: 20px;
  margin-right: 5px;
}
.box .indicator i.down{
  background: #e87d88;
}
.home-content .box .indicator .text{
  font-size: 12px;
}
</style>

<div class="container mt-3 bg-white rounded">
  <canvas id="myChart"></canvas>
</div>

<br><div class="home-content">
      <div class="overview-boxes">
        <div class="box" style="background: plum;">
          <div class="right-side">
            <div class="box-topic">All Orders</div>
            <div class="indicator">
            </div>
          </div>
          <span class="badge badge-secondary" style="display: inline-table;
  font-size: 40px;
  font-family: cursive;
  height: 50px;
  width: 50px;
  background: transparent;
  line-height: 32px;
  text-align: center;
  color: black;
  border-radius: 15px 15px;
  margin-top: 38px;
  position: absolute;"><?php echo $row_cnt_all_orders ?></span>
        </div>
        <div class="box" style="background: lightgreen;">
          <div class="right-side">
            <div class="box-topic">Prepare Orders</div>
            <div class="indicator">
            </div>
          </div>
         <span class="badge badge-secondary" style="display: inline-table;
  font-size: 40px;
  font-family: cursive;
  height: 50px;
  width: 50px;
  background: transparent;
  line-height: 32px;
  text-align: center;
  color: black;
  border-radius: 15px 15px;
  margin-top: 38px;
  position: absolute;"><?php echo $row_cnt_approved_orders ?></span>
        </div>
        <div class="box" style="background: mediumaquamarine;">
          <div class="right-side">
            <div class="box-topic">Delivery Orders</div>
            <div class="indicator">
            </div>
          </div>
         <span class="badge badge-secondary" style="display: inline-table;
  font-size: 40px;
  font-family: cursive;
  height: 50px;
  width: 50px;
  background: transparent;
  line-height: 32px;
  text-align: center;
  color: black;
  border-radius: 15px 15px;
  margin-top: 38px;
  position: absolute;"><?php echo $row_cnt_delivery_orders ?></span>
        </div>
        <div class="box" style="background: skyblue;">
          <div class="right-side">
            <div class="box-topic">Delivered Orders</div>
            <div class="indicator">
            </div>
          </div>
         <span class="badge badge-secondary" style="display: inline-table;
  font-size: 40px;
  font-family: cursive;
  height: 50px;
  width: 50px;
  background: transparent;
  line-height: 32px;
  text-align: center;
  color: black;
  border-radius: 15px 15px;
  margin-top: 38px;
  position: absolute;"><?php echo $row_cnt_deli_orders ?></span>
        </div>
        <div class="box" style="background: lightgray; margin-left: 200px; margin-top: 5px;">
          <div class="right-side">
            <div class="box-topic">Received Orders</div>
            <div class="indicator">
            </div>
          </div>
         <span class="badge badge-secondary" style="display: inline-table;
  font-size: 40px;
  font-family: cursive;
  height: 50px;
  width: 50px;
  background: transparent;
  line-height: 32px;
  text-align: center;
  color: black;
  border-radius: 15px 15px;
  margin-top: 38px;
  position: absolute;"><?php echo $row_cnt_delivered_orders ?></span>
        </div>
        <div class="box" style="background: yellowgreen; margin-top: 5px; margin-right: 200px;">
          <div class="right-side">
            <div class="box-topic">Cancelled Orders</div>
            <div class="indicator">
            </div>
          </div>
          <span class="badge badge-secondary" style="display: inline-table;
  font-size: 40px;
  font-family: cursive;
  height: 50px;
  width: 50px;
  background:  transparent;
  line-height: 32px;
  text-align: center;
  color: black;
  border-radius: 15px 15px;
  margin-top: 38px;
  position: absolute;"><?php echo $row_cnt_cancelled_orders ?></span>
        </div>
      </div>


<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item"  role="presentation" >
                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all"
                        aria-selected="true" style="font-size: 16px;">All Orders
                    </a>
                </li>
                <li class="nav-item" role="presentation" >
                    <a class="nav-link" id="approved-tab" data-toggle="tab" href="#approved" role="tab"
                        aria-controls="approved" aria-selected="false" style="font-size: 16px;">
                        Prepare Orders
                    </a>
                </li>
                <li class="nav-item" role="presentation" >
                    <a class="nav-link" id="delivery-tab" data-toggle="tab" href="#delivery" role="tab"
                        aria-controls="delivery" aria-selected="false" style="font-size: 16px;">
                        Delivery Orders
                    </a>
                </li>
                  <li class="nav-item" role="presentation " >
                    <a class="nav-link" id="deli-tab" data-toggle="tab" href="#deli" role="tab"
                        aria-controls="deli" aria-selected="false" style="font-size: 16px; ">
                        Delivered Orders
                    </a>
                </li>
								<li class="nav-item" role="presentation" >
                    <a class="nav-link" id="delivered-tab" data-toggle="tab" href="#delivered" role="tab"
                        aria-controls="delivered" aria-selected="false" style="font-size: 16px;">
                        Received Orders
                    </a>
                </li>
                <li class="nav-item" role="presentation" >
                    <a class="nav-link" id="cancelled-tab" data-toggle="tab" href="#cancelled" role="tab"
                        aria-controls="cancelled" aria-selected="false" style="font-size: 16px; ">Cancelled Orders
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
			$i = 1;
			while($row=$resultOrders->fetch_assoc()):
            $posted_date = date_format(date_create($row['order_date']),"F j, Y, g:i a");

			 ?>


                            <tr>
                                                          <td><?php echo $i++ ?></td>
                                <td><?php echo $posted_date ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['mobile'] ?></td>
                                <?php
								if($row['status'] == 1){
									echo '<td class="text-center"><span class="badge badge-success">Confirmed</span></td>';
								}else if($row['status'] == 2){
									echo '<td class="text-center"><span class="badge badge-danger">Cancelled</span></td>';
								}else{
									echo '<td class="text-center"><span class="badge badge-secondary">For Verification</span></td>';
								}
								?>
                                <td>
                                    <button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>"
                                        data-status="<?php echo $row['status'] ?>">View
                                        Order</button>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <!--<th>Date</th>-->
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
			$i = 1;
			while($row=$resultApprovedOrders->fetch_assoc()):

			 ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <!--<td><?php echo $row['order_date'] ?></td>-->
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['mobile'] ?></td>
                                <?php
								if($row['status'] == 1){
									echo '<td class="text-center"><span class="badge badge-success">Preparing...</span></td>';
								}else if($row['status'] == 2){
									echo '<td class="text-center"><span class="badge badge-danger">Cancelled</span></td>';
								}else{
									echo '<td class="text-center"><span class="badge badge-secondary">For Verification</span></td>';
								}
								?>
                                <td>
                                    <button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>"
                                        data-status="1">View
                                        Order</button>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
			$i = 1;
			while($row=$resultCancelledOrders->fetch_assoc()):
			 ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['mobile'] ?></td>
                                <?php
								if($row['status'] == 1){
									echo '<td class="text-center"><span class="badge badge-success">Confirmed</span></td>';
								}else if($row['status'] == 2){
									echo '<td class="text-center"><span class="badge badge-danger">Cancelled</span></td>';
								}else{
									echo '<td class="text-center"><span class="badge badge-secondary">For Verification</span></td>';
								}
								?>
                                <td>
                                    <button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>"
                                        data-status="6">View
                                        Order</button>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <!--Start Delivery orders-->


                <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <!--<th>Date</th>-->
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
      $i = 1;
      while($row=$resultDeliveryOrders->fetch_assoc()):

       ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <!--<td><?php echo $row['order_date'] ?></td>-->
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['mobile'] ?></td>
                                <?php
                if($row['status'] == 1){
                  echo '<td class="text-center"><span class="badge badge-success">Delivery...</span></td>';
                }else if($row['status'] == 2){
                  echo '<td class="text-center"><span class="badge badge-danger">Cancelled</span></td>';
                }else{
                  echo '<td class="text-center"><span class="badge badge-success">Delivery...</span></td>';
                }
                ?>
                                <td>
                                    <button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>"
                                        data-status="3">View
                                        Order</button>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>


                <!--End Delivery orders-->
                
                <!--Start Deli orders-->
                

                <div class="tab-pane fade" id="deli" role="tabpanel" aria-labelledby="deli-tab">
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <!--<th>Date</th>-->
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
      $i = 1;
      while($row=$resultDeliOrders->fetch_assoc()):

       ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <!--<td><?php echo $row['order_date'] ?></td>-->
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['mobile'] ?></td>
                                <?php
                if($row['status'] == 1){
                  echo '<td class="text-center"><span class="badge badge-success">Receiving...</span></td>';
                }else if($row['status'] == 2){
                  echo '<td class="text-center"><span class="badge badge-danger">Cancelled</span></td>';
                }else{
                  echo '<td class="text-center"><span class="badge badge-success">Receiving...</span></td>';
                }
                ?>
                                <td>
                                    <button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>"
                                        data-status="7">View
                                        Order</button>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>


                <!--End Deli orders-->


								<div class="tab-pane fade" id="delivered" role="tabpanel" aria-labelledby="delivered-tab">
										<table class="table table-bordered mt-3">
												<thead>
														<tr>
																<th>#</th>
																<th>Date</th>
																<th>Name</th>
																<th>Address</th>
																<th>Email</th>
																<th>Mobile</th>
																<th>Status</th>
																<th></th>
														</tr>
												</thead>
												<tbody>
														<?php
			$i = 1;
			while($row=$resultDeliveredOrders->fetch_assoc()):
            
			 ?>
														<tr>
																<td><?php echo $i++ ?></td>
																<td><?php echo date_format(date_create($row['order_date']),"F j, Y, g:i a")?></td> 
																<td><?php echo $row['name'] ?></td>
																<td><?php echo $row['address'] ?></td>
																<td><?php echo $row['email'] ?></td>
																<td><?php echo $row['mobile'] ?></td>
																<?php
								if($row['status'] == 1){
									echo '<td class="text-center"><span class="badge badge-success">Successful</span></td>';
								}else if($row['status'] == 2){
									echo '<td class="text-center"><span class="badge badge-danger">Cancelled</span></td>';
								}else{
									echo '<td class="text-center"><span class="badge badge-success">Successful</span></td>';
								}
								?>
																<td>
																		<button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>"
																				data-status="<?php echo $row['status'] ?>">View
																				Order</button>
																</td>
														</tr>
														<?php endwhile; ?>
												</tbody>
										</table>
								</div>

            </div>
        </div>
    </div>

</div>
<script>
$('.view_order').click(function() {
    uni_modal('Order', 'view_order.php?id=' + $(this).attr('data-id') + '&status=' + $(this).attr(
        'data-status'))
})
</script>
<script src="assets/js/chart.js"></script>
<script> 
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [{
        label: 'Monthly Orders ' + new Date().getFullYear(),
        data: ['<?php echo $January_orders_count ?>', '<?php echo $February_orders_count ?>', '<?php echo $March_orders_count ?>', '<?php echo $April_orders_count ?>', '<?php echo $May_orders_count ?>', '<?php echo $June_orders_count ?>', '<?php echo $July_orders_count ?>', '<?php echo $August_orders_count ?>', '<?php echo $September_orders_count ?>', '<?php echo $October_orders_count ?>', '<?php echo $November_orders_count ?>', '<?php echo $December_orders_count ?>'],
        borderWidth: 1,
        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)'
        ],
        borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)'
        ],
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
