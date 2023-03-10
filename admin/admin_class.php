<?php
session_start();
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';

    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".$password."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function login2(){
		extract($_POST);
			$qry = $this->db->query("SELECT * FROM user_info where email = '".$email."' and password = '".md5($password)."' ");
			if($qry->num_rows > 0){
				foreach ($qry->fetch_array() as $key => $value) {
					if($key != 'passwors' && !is_numeric($key))
						$_SESSION['login_'.$key] = $value;
				}
				$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
				$this->db->query("UPDATE cart set user_id = '".$_SESSION['login_user_id']."' where client_ip ='$ip' ");
					return 1;
			}else{
				return 3;
		}
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}
	function logout2(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
             $total = 0;
		}
		header("location:../index.php");
	}

	function save_user(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		$data .= ", password = '$password' ";
		$data .= ", type = '$type' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	function signup(){
		extract($_POST);
		$data = " first_name = '$first_name' ";
		$data .= ", last_name = '$last_name' ";
		$data .= ", mobile = '$mobile' ";
		$data .= ", address = '$address' ";
		$data .= ", email = '$email' ";
		$data .= ", password = '".md5($password)."' ";
		$chk = $this->db->query("SELECT * FROM user_info where email = '$email' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
			$save = $this->db->query("INSERT INTO user_info set ".$data);
		if($save){
			$login = $this->login2();
			return 1;
		}
	}

	function save_settings(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", about_content = '".htmlentities(str_replace("'","&#x2019;",$about))."' ";
		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
					$data .= ", cover_img = '$fname' ";

		}

		// echo "INSERT INTO system_settings set ".$data;
		$chk = $this->db->query("SELECT * FROM system_settings");
		if($chk->num_rows > 0){
			$save = $this->db->query("UPDATE system_settings set ".$data." where id =".$chk->fetch_array()['id']);
		}else{
			$save = $this->db->query("INSERT INTO system_settings set ".$data);
		}
		if($save){
		$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}

			return 1;
				}
	}


	function save_category(){
		extract($_POST);
		$data = " name = '$name' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO category_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE category_list set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_category(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM category_list where id = ".$id);
		if($delete)
			return 1;
	}
	function save_menu(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", price = '$price' ";
		$data .= ", category_id = '$category_id' ";
		$data .= ", description = '$description' ";
		$data .= ", stocks = '$stocks' ";
		if(isset($status) && $status  == 'on')
		$data .= ", status = 1 ";
		else
		$data .= ", status = 0 ";

		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
					$data .= ", img_path = '$fname' ";

		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO product_list set ".$data);
			if($save) return 1;
		}else{
			$save = $this->db->query("UPDATE product_list set ".$data." where id=".$id);
			if($save) return 2;
		}

	}

	function delete_menu(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM product_list where id = ".$id);
		if($delete)
			return 1;
	}

	function add_to_cart(){
		extract($_POST);
		$data = " product_id = $pid ";
		$qty = isset($qty) ? $qty : 1 ;
		$data .= ", qty = $qty ";
		if(isset($_SESSION['login_user_id'])){
			$data .= ", user_id = '".$_SESSION['login_user_id']."' ";
		}else{
			$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
			$data .= ", client_ip = '".$ip."' ";
		}

		$cart_qry = $this->db->query("SELECT * FROM cart where product_id =".$pid);
		$row_cnt = $cart_qry->num_rows;

		if($row_cnt === 1){
			while($row = $cart_qry->fetch_assoc()){
				$newQty = $row['qty'] + $qty;
				$data2 = " qty = $newQty ";
				$save = $this->db->query("UPDATE cart set ".$data2." where id = ".$row['id']);
			}
		}else{
			//save to cart
			$save = $this->db->query("INSERT INTO cart set ".$data);
			return 1;
		}

		 if($save){
		 	//adjust product stocks
		 	$qry = $this->db->query("SELECT * FROM product_list where id =".$pid);
		 	while($row= $qry->fetch_assoc()){
		 		$remaining_stocks = $row['stocks'] - $qty;
		 		$data = " stocks = '$remaining_stocks' ";
		 		$save2 = $this->db->query("UPDATE product_list set ".$data." where id = ".$pid);

		 		if($save2){
		 			return 1;
		 		}
		 	}
		 }
	}
	function get_cart_count(){
		extract($_POST);
		if(isset($_SESSION['login_user_id'])){
			$where =" where user_id = '".$_SESSION['login_user_id']."'  ";
		}
		else{
			$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
			$where =" where client_ip = '$ip'  ";
		}
		$get = $this->db->query("SELECT sum(qty) as cart FROM cart ".$where);
		if($get->num_rows > 0){
			return $get->fetch_array()['cart'];
		}else{
			return '0';
		}
	}

	function update_cart_qty(){
		extract($_POST);
		//adjust product stocks
		$qry = $this->db->query("SELECT * FROM product_list where id =".$pid);
		while($row= $qry->fetch_assoc()){
			if($qty == 0){
				$save1 = $this->db->query("DELETE FROM cart where id= ".$id);

				$remaining_stocks = $row['stocks'] + 1;
			}else{
				$data = " qty = $qty ";
				$save1 = $this->db->query("UPDATE cart set ".$data." where id = ".$id);

				if($action == 'minus'){
					$remaining_stocks = $row['stocks'] + 1;
				}else if($action == 'plus'){
					$remaining_stocks = $row['stocks'] - 1;
				}

				return 1;
			}
		}

		//update stocks
		// $stock_data = " stocks = '$remaining_stocks' ";
		// $save2 = $this->db->query("UPDATE product_list set ".$stock_data." where id = ".$pid);
		// if($save2){
		// 	return 1;
		// }
	}


function update_cart_qty2(){
		extract($_POST);
		//adjust product stocks
		$qry = $this->db->query("SELECT * FROM product_list where id =".$pid);
		while($row= $qry->fetch_assoc()){
			if($qty == 0){
				$save1 = $this->db->query("DELETE FROM order_list where id= ".$id);

				$remaining_stocks = $row['stocks'] + 1;
			}else{
				$data = " qty = $qty ";
				$save1 = $this->db->query("UPDATE cart set ".$data." where id = ".$id);

				if($action == 'minus'){
					$remaining_stocks = $row['stocks'] + 1;
				}else if($action == 'plus'){
					$remaining_stocks = $row['stocks'] - 1;
				}
			}
		}

		$stock_data = " stocks = '$remaining_stocks' ";
		$save2 = $this->db->query("UPDATE product_list set ".$stock_data." where id = ".$pid);
		if($save2){
			return 1;
		}
	}


	function save_order(){
		extract($_POST);


		//$data = " posted_date2 = '$dte' ";
		$data = " name = '".$first_name." ".$last_name."' ";
		$data .= ", address = '$address' ";
		$data .= ", mobile = '$mobile' ";
		$data .= ", email = '$email' ";
		$save = $this->db->query("INSERT INTO orders set ".$data);
		if($save){
			//$date = date("y-m-d h:i:s");
			$id = $this->db->insert_id;
			$qry = $this->db->query("SELECT * FROM cart where user_id =".$_SESSION['login_user_id']);
			while($row= $qry->fetch_assoc()){

					$data = " order_id = '$id' ";
					//$data = " posted_date = '$date' ";
					$data .= ", user_id = '".$row['user_id']."' ";
					$data .= ", product_id = '".$row['product_id']."' ";
					$data .= ", qty = '".$row['qty']."' ";
					$save2=$this->db->query("INSERT INTO order_list set ".$data);
					if($save2){
						$this->db->query("DELETE FROM cart where id= ".$row['id']);
					}
			}
			return 1;
		}
	}
function confirm_order(){
	extract($_POST);
		$save = $this->db->query("UPDATE orders set status = 1 where id= ".$id);
		// if($save)
		// 	return 1;

		if($save) {
			//get order from order list
			$order_list_qry = $this->db->query("SELECT * FROM order_list where order_id =".$id);
			while($row= $order_list_qry->fetch_assoc()){
				//get product from product list
				$product_list_qry = $this->db->query("SELECT * FROM product_list where id =".$row['product_id']);
				while($row2= $product_list_qry->fetch_assoc()){
					//update stocks
					$new_stocks = $row2['stocks'] - $row['qty'];
					$data = "stocks = '$new_stocks' ";
					$save2 = $this->db->query("UPDATE product_list set ".$data." where id = ".$row2['id']);
				}
			}

			return 1;
		}
}
function prepare_order(){
	extract($_POST);
		$save = $this->db->query("UPDATE orders set status = 3 where id= ".$id);
		// if($save)
		// 	return 1;

		if($save) {
			//get order from order list
			$order_list_qry = $this->db->query("SELECT * FROM order_list where order_id =".$id);
			while($row= $order_list_qry->fetch_assoc()){
				//get product from product list
				$product_list_qry = $this->db->query("SELECT * FROM product_list where id =".$row['product_id']);
				while($row2= $product_list_qry->fetch_assoc()){
					//update stocks
					$new_stocks = $row2['stocks'] - $row['qty'];
					$data = "stocks = '$new_stocks' ";
					$save2 = $this->db->query("UPDATE product_list set ".$data." where id = ".$row2['id']);
				}
			}

			return 1;
		}
}
function receive_order(){
	extract($_POST);

	//update order status
	$save = $this->db->query("UPDATE orders set status = 4 where id= ".$id);
	return 1;

	// if($save) {
	// 	//get order from order list
	// 	$order_list_qry = $this->db->query("SELECT * FROM order_list where order_id =".$id);
	// 	while($row= $order_list_qry->fetch_assoc()){
	// 		//get product from product list
	// 		$product_list_qry = $this->db->query("SELECT * FROM product_list where id =".$row['product_id']);
	// 		while($row2= $product_list_qry->fetch_assoc()){
	// 			//update stocks
	// 			$new_stocks = $row2['stocks'] + $row['qty'];
	// 			$data = "stocks = '$new_stocks' ";
	// 			$save2 = $this->db->query("UPDATE product_list set ".$data." where id = ".$row2['id']);
	// 		}
	// 	}

	// 	return 1;
	// }
}
function delivery_confirm(){
		extract($_POST);

		//update order status
		$save = $this->db->query("UPDATE orders set status = 5 where id= ".$id);
		return 1;

		// if($save) {
		// 	//get order from order list
		// 	$order_list_qry = $this->db->query("SELECT * FROM order_list where order_id =".$id);
		// 	while($row= $order_list_qry->fetch_assoc()){
		// 		//get product from product list
		// 		$product_list_qry = $this->db->query("SELECT * FROM product_list where id =".$row['product_id']);
		// 		while($row2= $product_list_qry->fetch_assoc()){
		// 			//update stocks
		// 			$new_stocks = $row2['stocks'] + $row['qty'];
		// 			$data = "stocks = '$new_stocks' ";
		// 			$save2 = $this->db->query("UPDATE product_list set ".$data." where id = ".$row2['id']);
		// 		}
		// 	}

		// 	return 1;
		// }
	}

function remove_cart(){
	extract($_POST);
	$save1 = $this->db->query("DELETE FROM cart where id= ".$cartId);
	if($save1){
		return 1;

		//adjust product stocks
		// $qry = $this->db->query("SELECT * FROM product_list where id =".$productId);
		// while($row= $qry->fetch_assoc()){
		// 	$remaining_stocks = $row['stocks'] + $qty;
		// 	$data = " stocks = '$remaining_stocks' ";
		// 	$save2 = $this->db->query("UPDATE product_list set ".$data." where id = ".$productId);

		// 	if($save2){
		// 		return 1;
		// 	}
		// }
	}
}

function remove_cart2(){
	extract($_POST);
	$save1 = $this->db->query("DELETE FROM order_list where id= ".$orderId);
	if($save1){
		//adjust product stocks
		$qry = $this->db->query("SELECT * FROM product_list where id =".$productId);
		while($row= $qry->fetch_assoc()){
			$remaining_stocks = $row['stocks'] + $qty;
			$data = " stocks = '$remaining_stocks' ";
			$save2 = $this->db->query("UPDATE product_list set ".$data." where id = ".$productId);

			if($save2){
				return 1;
			}
		}
	}
}

function add_stock(){
	extract($_POST);

	$qry = $this->db->query("SELECT * FROM product_list where id =".$id);
	while($row= $qry->fetch_assoc()){
		$new_stocks = $row['stocks'] + $stocks;
		$data = "stocks = '$new_stocks' ";
		$save2 = $this->db->query("UPDATE product_list set ".$data." where id = ".$id);

		if($save2){
			return 1;
		}
	}
}

function cancel_order(){
	extract($_POST);

	//update order status
	$save = $this->db->query("UPDATE orders set status = 2 where id= ".$id);
	return 1;

	// if($save) {
	// 	//get order from order list
	// 	$order_list_qry = $this->db->query("SELECT * FROM order_list where order_id =".$id);
	// 	while($row= $order_list_qry->fetch_assoc()){
	// 		//get product from product list
	// 		$product_list_qry = $this->db->query("SELECT * FROM product_list where id =".$row['product_id']);
	// 		while($row2= $product_list_qry->fetch_assoc()){
	// 			//update stocks
	// 			$new_stocks = $row2['stocks'] + $row['qty'];
	// 			$data = "stocks = '$new_stocks' ";
	// 			$save2 = $this->db->query("UPDATE product_list set ".$data." where id = ".$row2['id']);
	// 		}
	// 	}

	// 	return 1;
	// }
}

function contact_us(){
	extract($_POST);

	// echo $_POST['name'];
	// echo $email;
	// echo $message;

	// $whom = "jadeducay15@gmail.com";
	// $comment = 'Name:'.$name.'\n Email:'.$email.'\n Message'.$message;

    mail("jadeducay15@gmail.com","test","test");

	return 1;
}

function save_review(){
	extract($_POST);
	$data = " order_id = '$order_id' ";
	$data .= ", product_id = '$product_id' ";
	$data .= ", customer_id = '$customer_id' ";
	$data .= ", rate = '$rate' ";
	$data .= ", comment = '$comment' ";
	if(empty($id)){
		$save = $this->db->query("INSERT INTO reviews set ".$data);
	}else{
		$save = $this->db->query("UPDATE reviews set ".$data." where id=".$id);
	}
	if($save) return 1;
}

function remove_review(){
	extract($_POST);
	$save1 = $this->db->query("DELETE FROM reviews where id= ".$id);
	if($save1){
		return 1;
	}
}

}
