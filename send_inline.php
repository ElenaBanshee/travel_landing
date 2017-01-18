<?php
	header('Content-type: application/json');
	if($_POST){
		extract($_POST);
		$json = array(); 
		if(empty($your_name)){
			$json['error']['your_name'] = 'You did not fill the field "name"!';
		}

		elseif(!preg_match("/^[a-zA-Zа-яёА-ЯЁ\s\-]+$/u", $your_name)){
				$json['error']['your_name'] = 'In the "name" should be no special characters and numbers!';
		}
		elseif(strlen($your_name) < 2){
				$json['error']['your_name'] = 'The "name" must be greater than one symbol!';
		}
		else{
			$json['error']['your_name'] = "";
		}
		if(empty($your_tel)){
			$json['error']['your_tel'] = 'You did not fill the field "phone"!';
		}
		elseif(!preg_match("/[\+]\d\s\d[(][0-9]{1,3}[)] [0-9]{1,3}[-][0-9]{1,2}[-][0-9]{1,2}/", $your_tel)){
				$json['error']['your_tel'] = 'Wrong "phone" format!';
		}
		else{
			$json['error']['your_tel'] = "";
		}		
	}
	echo json_encode($json);
?>