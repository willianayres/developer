<?php

	class Painel
	{

		// Global variable to define the offices.
		public static $offices = ['0' => 'Normal', '1' => 'Sub-Adminstrador', '2' => 'Administrador'];

		// Global method to generate a right slug by replacing invalid characteres.
		public static function generateSlug($str){
			$str = mb_strtolower($str);
			$str = preg_replace('/(â|á|à|ã)/', 'a', $str);
			$str = preg_replace('/(ê|é|è)/', 'e', $str);
			$str = preg_replace('/(î|í|ì)/', 'i', $str);
			$str = preg_replace('/(ô|ó|ò|õ)/', 'o', $str);
			$str = preg_replace('/(û|ú|ù)/', 'u', $str);
			$str = preg_replace('/(_|\/|!|\?|#)/', '', $str);
			$str = preg_replace('/( )/', '-', $str);
			$str = preg_replace('/(ç)/', 'c', $str);
			$str = preg_replace('/(-[-]{1,})/', '-', $str);
			$str = preg_replace('/(,)/', '-', $str);
			$str = strtolower($str);
			return $str;
		}

		// Global method to check if an user is logged or not.
		public static function logged(){
			return isset($_SESSION['login']) ? true : false;
		}

		// Global methot to loggout an user.
		public static function loggout(){
			// Set the cookie as negative to destroy it.
			setcookie('remember', 'true', time() - 1, '/');
			// Destroy the session.
			session_destroy();
			// Redirect to home.
			header('Location: '.INCLUDE_PATH_PAINEL);
		}

		// Global method to load a page on the Panel.
		public static function loadPage(){
			// If the url isn't set, redirect to home.
			if(isset($_GET['url'])){
				// Get the page from url.
				$url = explode('/',$_GET['url']);
				// Check if the page exists.
				if(file_exists('pages/'.$url[0].'.php'))
					include('pages/'.$url[0].'.php');
				else
					header('Location: '.INCLUDE_PATH_PAINEL);
			}
			else
				include('pages/home.php');
		}

		public static function loadJS($files, $page){
			$url = explode('/',@$_GET['url'])[0];
			if($page == $url){
				foreach($files as $key => $value){
					echo '<script src="'.INCLUDE_PATH_PAINEL.'js/'.$value.'"></script>';
				}
			}
		}

		public static function loadCSS($files, $page){
			$url = explode('/',@$_GET['url'])[0];
			if($page == $url){
				foreach($files as $key => $value){
					echo '<link rel="stylesheet" href="'.INCLUDE_PATH_PAINEL.'css/'.$value.'" />';
				}
			}
		}

		// Global method to redirect the page.
		public static function redirectPage($url){
			echo '<script>location.href="'.$url.'"</script>';
			die();
		}

		// Global method to start a new session;
		public static function setSession($user, $password, $info){
			$_SESSION['login'] = true;
			$_SESSION['user'] = $user;
			$_SESSION['password'] = $password;
			/*
			foreach ($info as $key => $value) {
				$_SESSION[$key] = $value;
			}
			*/
			$_SESSION['office'] = $info['office'];
			$_SESSION['name'] = $info['name'];
			$_SESSION['img'] = $info['img'];
		}

		// Global method to alert success or error in an action.
		public static function alert($type = 'error', $msg){
			if($type == 'success')
				echo '<div class="alert success"><i class="far fa-check-circle"></i> '.$msg.'</div>';
			else
				echo '<div class="alert error"><i class="fas fa-times"></i> '.$msg.'</div>';
		}

		// Global method to check if an item was selected.
		public static function selected($par){
			$url = explode('/',@$_GET['url'])[0];
			if($url == $par)
				echo 'class="selected"';
		}

		// Global method to return the right office.
		public static function getOffice($index){
			return self::$offices[$index];
		}

		// Global method to check if an user has the permission on the menu.
		public static function checkPermissionMenu($permission){
			if($_SESSION['office'] >= $permission)
				return;
			else
				echo 'style="display:none;";';
		}

		// Global method to check if an user has the permission at the same page.
		public static function checkPermissionPag($permission){
			if($_SESSION['office'] >= $permission)
				return;
			else{
				include('pages/denied_permission.php');
				die();
			}
		}

		public static function recoverPost($str){
			if(isset($_POST[$str]))
				echo $_POST[$str];
		}

		// Global method to put insert the data on a table of the database.
		public static function insertData($arr, $order = true){
			// Return check.
			$check = true;
			// Get the table.
			$table = $arr['table'];
			// Start the query.
			$query = "INSERT INTO `$table` VALUES (null";
			// Iterate the array;
			foreach ($arr as $key => $value){
				// Skip useless data.
				if($key == 'action' || $key == 'table')
					continue;
				// Breaks if the data is empty.
				if($value === ''){
					$check = false;
					break;
				}
				// Apend as many data to the query.
				$query .= ",?";
				// Get the data to set for execution.
				$par[] = $value;
			}
			// Finishes the query.
			$query .= ")";
			// If the query is ok, connect to the database and run the query.
			if($check){
				$sql = MySQL::connect()->prepare($query);
				$sql->execute($par);
				if($order){
					$last = MySQl::connect()->lastInsertId();
					$sql = MySQL::connect()->prepare("UPDATE `$table` SET order_id = ? WHERE id = $last");
					$sql->execute(array($last));
				}
			}
			return $check;
		}

		public static function updateData($arr, $single = false){
			// Return check.
			$check = true;
			// Check for the first value.
			$first = false;
			// Get the table.
			$table = $arr['table'];
			// Start the query.
			$query = "UPDATE `$table` SET ";
			// Iterate the array;
			foreach ($arr as $key => $value) {
				// Skip useless data.
				if($key == 'action' || $key == 'table' || $key == 'id')
					continue;
				// Breaks if the data is empty.
				if($value === ''){
					$check = false;
					break;
				}
				// Apend as many data to the query.
				if(!$first){
					$first = true;
					$query.="$key=?";
				}else
					$query.=",$key=?";
				// Get the data to set for execution.
				$par[] = $value;
			}
			// If the query is ok, connect to the database and run the query.
			if($check){
				if(!$single){
					$par[] = $arr['id'];
					$query .= ' WHERE id = ?';
				}
				$sql = MySQL::connect()->prepare($query);
				$sql->execute($par);
			}
			return $check;
		}

		public static function getData($table, $data = '*', $query = '', $arr = '', $fetch = true, $all = false){
			if($query != false){
				$sql = MySQL::connect()->prepare("SELECT $data FROM `$table` $query");
				($arr != '') ? $sql->execute($arr) : $sql->execute();
			}else{
				$sql = MySQL::connect()->prepare("SELECT $data FROM `$table`");
				$sql->execute();
			}
			return $fetch ? ($all ? $sql->fetchAll() : $sql->fetch()) : $sql;
		}

		// Global method to delete data of the database.
		public static function deleteData($table, $query, $arr){
			$sql = MySQL::connect()->prepare("DELETE FROM `$table` $query");
			$sql->execute($arr);
		}

		public static function orderData($table, $order_item, $id_item){
			if($order_item == 'up'){
				$item_actual = self::getData($table, '*', 'WHERE id = ?', array($id_item), true);
				$order_id = $item_actual['order_id'];
				$item_before = self::getData($table, '*', 'WHERE order_id < '.$order_id.' ORDER BY order_id DESC LIMIT 1',  array(), false);
				if($item_before->rowCount() == 0)
					return;
				$item_before = $item_before->fetch();
				self::updateData(array('table'=>$table,'id'=>$item_before['id'],'order_id'=>$item_actual['order_id']));
				self::updateData(array('table'=>$table,'id'=>$item_actual['id'],'order_id'=>$item_before['order_id']));
			}else if($order_item == 'down'){
				$item_actual = self::getData($table, '*', 'WHERE id = ?', array($id_item));
				$order_id = $item_actual['order_id'];
				$item_before = self::getData($table, '*', 'WHERE order_id > '.$order_id.' ORDER BY order_id ASC LIMIT 1',  array(), false);
				if($item_before->rowCount() == 0)
					return;
				$item_before = $item_before->fetch();
				self::updateData(array('table'=>$table,'id'=>$item_before['id'],'order_id'=>$item_actual['order_id']));
				self::updateData(array('table'=>$table,'id'=>$item_actual['id'],'order_id'=>$item_before['order_id']));
			}

		}

		public static function dataType($table, $fetch = true, $all = true){
			$sql = MySQL::connect()->prepare("SELECT DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$table'");
			$sql->execute();
			if($fetch)
				return $all ? $sql->fetchAll() : $sql->fetch();
			else
				return $sql;
		}

	}

?>