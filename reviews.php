 <!-- Masthead-->
 <header class="masthead">
     <div class="container h-100">
         <div class="row h-100 align-items-center justify-content-center text-center">
             <div class="col-lg-10 align-self-end mb-4 page-title" style="background:transparent;">
                 <h3 class="text-uppercase text-white font-weight-bold" style="font-size: 55px">Reviews</h3>
                 <hr class="divider my-4" />
             </div>
         </div>
     </div>
 </header>
 <section class="page-section" id="menu">
    <div class="container">
        <?php
            include'admin/db_connect.php';

            $qry = $conn->query("SELECT * FROM  product_list WHERE product_list.id = ".$_GET['id']);
            while($row = $qry->fetch_assoc()):
        ?>
                <div class="row">
                    <div class="col-md-6">
                        <img src="assets/img/<?php echo $row['img_path'] ?>" class="card-img-top" width="100" height="300" alt="...">
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title"><?php echo $row['name'] ?></h5>
                        <p class="card-text truncate"><?php echo $row['description'] ?></p>
                        <p>
                            <span class="small text-muted">Unit Price:</span>
                            <span><?php echo $row['price'] ?></span>
                        </p>
                        <p>
                            <span class="small text-muted">Stocks: </span>
                            <span><?php echo $row['stocks'] ?> kgs.</span>

                        </p>

                        <?php
                            if ($row['stocks'] == 0){
                                echo '<p class="text-danger">Out of stock</p>';
                            }
                        ?>

                        <?php
                            $ratings = $conn->query("SELECT * FROM reviews WHERE product_id=".$_GET['id']);
                            $ratings_count = $ratings->num_rows;

                            $total_star_count = 0;

                            for ($x = 1; $x <= 5; $x++) {
                                $star = $conn->query("SELECT * FROM reviews WHERE rate = ".$x." AND product_id=".$_GET['id']);
	                            $star_count = $star->num_rows;

                                while($row = $star->fetch_assoc()){
                                    $total_star_count += $row['rate'];
                                }

                                ?>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                if($i <= $x){
                                                    echo '<i class="fas fa-star"></i>';
                                                }else{
                                                    echo '<i class="far fa-star"></i>';
                                                }
                                            }
                                        ?>
                                    </div>
                                    <div class="progress flex-grow-1 mx-3">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo ($star_count/$ratings_count)*100 ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($star_count/$ratings_count)*100 ?>%">
                                            <span class="sr-only">70% Complete</span>
                                        </div>
                                    </div>
                                    <span><?php echo $star_count; ?></span>
                                </div>
                                <?php
                            }

                            $total_rate = 0;
                            if($total_star_count > 0){
                                $total_rate = $total_star_count/$ratings_count;
                            }

                            echo '<h3 class="mb-0 mt-3">'.$total_rate.' <span class="text-muted">/ 5</span></h3>';
                            echo '<p class="text-muted">'.$ratings_count.' Ratings</p>';
                        ?>
                    </div>
                </div>
        <?php endwhile; ?>

        <div class="mt-5 row">
            <?php
                // include'admin/db_connect.php';
                $qry = $conn->query("SELECT * FROM  reviews INNER JOIN user_info ON reviews.customer_id = user_info.user_id WHERE product_id = ".$_GET['id']);
                while($row = $qry->fetch_assoc()):
            ?>
                <div class="col-md-4 mb-3">
                    <div class="card h-100 bg-white shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center" style="gap: 0.5rem">
                                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white" style="height: 50px; width: 50px">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0"><?php echo $row['first_name']." ".$row['last_name'] ?></p>
                                        <p class="mb-0">
                                            <?php 
                                            for ($x = 0; $x <= 4; $x++) {
                                                if($row['rate'] > $x){
                                                    echo '<i class="fas fa-star"></i>';
                                                }else{
                                                    echo '<i class="far fa-star"></i>';
                                                }
                                            }?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-0 mt-3">
                                <small class="text-muted"><?php 
                                $date=date_create($row['created_at']);
                                echo date_format($date,"F j, Y, g:i a");?></small>
                            </p>
                            <p><?php echo $row['comment'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
 </section>