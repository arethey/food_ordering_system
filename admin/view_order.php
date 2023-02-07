<div class="container-fluid">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Qty</th>
                <th>Order</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
			$total = 0;
			include 'db_connect.php';
			$qry = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id =".$_GET['id']);
			while($row=$qry->fetch_assoc()):
				$total += $row['qty'] * $row['price'];
			?>
            <tr>
                <td><?php echo $row['qty'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo number_format($row['qty'] * $row['price'],2) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2" class="text-right">TOTAL</th>
                <th><?php echo number_format($total,2) ?></th>
            </tr>

        </tfoot>
    </table>
    <div class="text-center">
        <?php
		 if($_GET['status'] == 0){
			 echo '<button class="btn btn-primary" id="confirm" type="button" onclick="confirm_order()">Confirm</button>';
		 }elseif($_GET['status'] == 1){
       echo '<button class="btn btn-primary" id="prepare" type="button" onclick="prepare_order()">Prepare</button>';
         }elseif($_GET['status'] == 3){
       echo '<button class="btn btn-primary" id="receive" type="button" onclick="receive_order()">Deliver</button>';
         }elseif($_GET['status'] == 4){
       echo '<button class="btn btn-primary" id="paid" type="button" onclick="delivery_confirm()">Receive</button>';
     }
		 ?>


        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
<style>
#uni_modal .modal-footer {
    display: none
}
</style>
<script>
function confirm_order() {
    start_load()
    $.ajax({
        url: 'ajax.php?action=confirm_order',
        method: 'POST',
        data: {
            id: '<?php echo $_GET['id'] ?>'
        },
        success: function(resp) {
            if (resp == 1) {
                alert_toast("Order confirmed.")
                setTimeout(function() {
                    location.reload()
                }, 1500)
            }
        }
    })
}
</script>
<script>
function prepare_order() {
    start_load()
    $.ajax({
        url: 'ajax.php?action=prepare_order',
        method: 'POST',
        data: {
            id: '<?php echo $_GET['id'] ?>'
        },
        success: function(resp) {
            if (resp == 1) {
                alert_toast("Order prepared.")
                setTimeout(function() {
                    location.reload()
                }, 1500)
            }
        }
    })
}
</script>
<script>
function receive_order() {
    start_load()
    $.ajax({
        url: 'ajax.php?action=receive_order',
        method: 'POST',
        data: {
            id: '<?php echo $_GET['id'] ?>'
        },
        success: function(resp) {
            if (resp == 1) {
                alert_toast("Order deliver.")
                setTimeout(function() {
                    location.reload()
                }, 1500)
            }
        }
    })
}
</script>
<script>
function delivery_confirm() {
    start_load()
    $.ajax({
        url: 'ajax.php?action=delivery_confirm',
        method: 'POST',
        data: {
            id: '<?php echo $_GET['id'] ?>'
        },
        success: function(resp) {
            if (resp == 1) {
                alert_toast("Order Delivered.")
                setTimeout(function() {
                    location.reload()
                }, 1500)
            }
        }
    })
}
</script>
