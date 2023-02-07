 <!-- Masthead-->
 <header class="masthead">
     <div class="container h-100">
         <div class="row h-100 align-items-center justify-content-center text-center">
             <div class="col-lg-10 align-self-end mb-4 page-title" style="background:transparent;">
                 <h3 class="text-white" style="font-size: 40px;">WELCOME TO MARION'S SEAFOODS ORDERING</h3>
                 <hr class="divider my-4" />
                 <a class="btn btn-primary btn-xl js-scroll-trigger" href="#menu">Order Now</a>

             </div>

         </div>
     </div>
 </header>
 <section class="page-section" id="menu">
     <div id="menu-field" class="card-deck">
         <?php
                    include'admin/db_connect.php';
                    $qry = $conn->query("SELECT * FROM  product_list order by rand() ");
                    while($row = $qry->fetch_assoc()):
                    ?>
         <div class="col-lg-3" style="padding-left: 20px;">
             <div class="card menu-item " style="border-color: #f4623a; border-bottom-right-radius: 15px; border-bottom-left-radius: 15px; margin-bottom: 25px; margin-right: 5px;">
                 <img src="assets/img/<?php echo $row['img_path'] ?>" class="card-img-top" width="100" height="300" alt="...">
                 <div class="card-body">
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
                     <div class="text-center">
                         <?php if ($row['stocks'] == 0){
                         echo '<button class="btn btn-sm btn-outline-primary view_prod btn-block" disabled>Out of stock</button>';
                     }else{
                         echo '<button class="btn btn-sm btn-outline-primary view_prod btn-block"
                         data-id='.$row["id"].'><i class="fa fa-eye"></i> View</button>';
                         } ?>
                     </div>
                 </div>

             </div>
         </div>
         <?php endwhile; ?>
     </div>
 </section>
 <script>
$('.view_prod').click(function() {
    uni_modal_right('Product', 'view_prod.php?id=' + $(this).attr('data-id'))
})
 </script>
