<?php
	header('Content-type: application/json');
	if($_POST){
		extract($_POST);
		$json = array(); 
		if(empty($name)){
			$json['error']['name'] = 'You did not fill the field "name"!';
		}
		elseif(!preg_match("/^[a-zA-Zа-яёА-ЯЁ\s\-]+$/u", $name)){
				$json['error']['name'] = 'In the "name" should be no special characters and numbers!';
		}
		elseif(strlen($name) < 2){
				$json['error']['name'] = 'The "name" must be greater than one symbol!';
		}
		else{
			$json['error']['name'] = "";
		}
		if(empty($phone)){
			$json['error']['phone'] = 'You did not fill the field "phone"!';
		}
		elseif(!preg_match("/[\+]\d\s\d[(][0-9]{1,3}[)] [0-9]{1,3}[-][0-9]{1,2}[-][0-9]{1,2}/", $phone)){
				$json['error']['phone'] = 'Wrong "phone" format!';
		}
		else{
			$json['error']['phone'] = "";
		}
		if(empty($email)){
			$json['error']['email'] = 'You did not fill the field "e-mail"!';
		}
		elseif(!preg_match("/[\w.]+[@][\w.]+[A-z]{2,3}/", $email)){
				$json['error']['email'] = 'Wrong "e-mail" format!';
		}
		else{
			$json['error']['email'] = "";
		}
	}
	echo json_encode($json);
?>