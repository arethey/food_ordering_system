<?php 
    if(!isset($_SESSION['login_user_id'])){
        header("location: index.php?page=home");
    }else{
        if(isset($_GET["id"]) && !empty($_GET["id"])){
            // $get = $conn->query("SELECT * from order_list ol INNER JOIN product_list pl ON pl.id = ol.product_id WHERE ol.order_id = ".$_GET["id"]);
            $get = $conn->query("SELECT *, product_list.id AS prod_id, orders.status AS order_status from orders INNER JOIN order_list ON order_list.order_id = orders.id INNER JOIN product_list ON product_list.id = order_list.product_id WHERE orders.id = ".$_GET["id"]);
        }else{
            header("location: index.php?page=account");
        }
    }
 ?>

<header class="masthead">
     <div class="container h-100">
         <div class="row h-100 d-flex align-items-center justify-content-center text-center">
             <div class="col-lg-10 align-self-end mb-4 page-title"style="background:transparent;">
                 <h3 class="text-uppercase text-white font-weight-bold">Order #<?php echo $_GET["id"] ?></h3>
                 <hr class="divider my-4" />
             </div>
         </div>
     </div>
 </header>

 <div class="container mt-5">
    <?php
        while($row= $get->fetch_assoc()){
            $order_id = $_GET["id"];
            $prod_id = $row['prod_id'];
            $reviews_count = 0;
            $user_id =$_SESSION['login_user_id'];

            $sql = "SELECT * FROM reviews WHERE product_id = ? AND order_id = ? AND customer_id = ?";
            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param("iii", $prod_id, $order_id, $user_id);
                if($stmt->execute()){
                    $result = $stmt->get_result();
                    $reviews_count = $result->num_rows;
                    if($reviews_count == 1){
                        $row2 = $result->fetch_array(MYSQLI_ASSOC);
                        $rate = $row2["rate"];
                        $comment = $row2["comment"];
                        $created_at = $row2["created_at"];
                    }
                }
            }

            ?>
                <div class="d-flex mb-3 border-bottom  pb-3" style="gap: 1rem">
                    <img class="w-100" src="<?php echo 'assets/img/'.$row['img_path'] ?>" alt="" style="max-width: 200px" />
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between mb-4">
                            <div>
                                <h3 class="mb-0"><?php echo $row['name']; ?></h3>
                                <p class="text-muted"><?php echo $row['description']; ?></p>
                                <h3><?php echo $row['price']." php"; ?></h3>
                            </div>

                            <div>
                                <p class="mb-0"><?php echo $row['qty']." items"; ?></p>
                                <h5><?php echo "Total: ".($row['qty'] * $row['price'])." php"; ?></h5>
                            </div>
                        </div>
                        <?php
                            if($row['order_status'] == 5){
                                if($reviews_count == 1){
                                    ?>
                                        <div class="border rounded p-3">
                                            <div class="d-flex align-items-center mb-3" style="gap: 0.5rem">
                                                <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white" style="height: 50px; width: 50px">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div class="flex-grow-1 d-flex justify-content-between">
                                                    <div>
                                                        <p class="mb-0">
                                                            <?php 
                                                            for ($x = 0; $x <= 4; $x++) {
                                                                if($rate > $x){
                                                                    echo '<i class="fas fa-star"></i>';
                                                                }else{
                                                                    echo '<i class="far fa-star"></i>';
                                                                }
                                                            }?>
                                                        </p>
                                                        <p class="mb-0"><small class="text-muted">
                                                            <?php 
                                                                $date=date_create($created_at);
                                                                echo date_format($date,"F j, Y, g:i a");
                                                            ?>
                                                        </small></p>
                                                    </div>
                                                    <a href="index.php?page=reviews&id=<?php echo $prod_id; ?>" class="btn btn-link">View more</a>
                                                </div>
                                            </div>
                                            <p class="mb-0"><?php echo $comment; ?></p>
                                            <button class="btn btn-sm btn-danger mt-4" onclick="deleteReview(<?php echo $row2['id']; ?>)">Delete</button>
                                        </div>
                                    <?php
                                }else{
                                    ?>
                                        <form class="mt-5" onsubmit="handleReviewSubmit(event)" method="post">
                                            <div class="form-group">
                                                <label for="rate">How do you rate this product?</label>
                                                <select class="form-control" id="rate" name="rate" required >
                                                    <option value="1">1 Star</option>
                                                    <option value="2">2 Star</option>
                                                    <option value="3">3 Star</option>
                                                    <option value="4">4 Star</option>
                                                    <option value="5">5 Star</option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="comment">What do you like and dislike about this product?</label>
                                                <textarea class="form-control" id="comment" rows="3" name="comment" required></textarea>
                                            </div>
                                            
                                            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
                                            <input type="hidden" name="product_id" value="<?php echo $prod_id; ?>" />
                                            <input type="hidden" name="customer_id" value="<?php echo $_SESSION['login_user_id']; ?>" />
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            <?php
        }
    ?>
 </div>

 <script>
    function handleReviewSubmit(event) {
        event.preventDefault();
        start_load()
        $.ajax({
            url: 'admin/ajax.php?action=save_review',
            method: 'POST',
            data: {
                order_id: $('[name="order_id"]').val(),
                product_id: $('[name="product_id"]').val(),
                customer_id: $('[name="customer_id"]').val(),
                comment: $('[name="comment"]').val(),
                rate: $('[name="rate"]').val(),
            },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Product review successfully submit.");
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                }
                end_load()
            }
        })
    }

    function deleteReview(id) {
        start_load()
        $.ajax({
            url: 'admin/ajax.php?action=remove_review',
            method: 'POST',
            data: {
                id
            },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Product review successfully delete.");
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                }
                end_load()
            }
        })
    }
 </script>