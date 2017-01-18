<?php
	header('Content-type: application/json');
	if($_POST){
		extract($_POST);
		$json = array(); 
		if(empty($inputName)){
			$json['error']['inputName'] = 'You did not fill the field "name"!';
		}
		elseif(!preg_match("/^[a-zA-Zа-яёА-ЯЁ\s\-]+$/u", $inputName)){
				$json['error']['inputName'] = 'In the "name" should be no special characters and numbers!';
		}
		elseif(strlen($inputName) < 2){
				$json['error']['inputName'] = 'The "name" must be greater than one symbol!';
		}
		else{
			$json['error']['inputName'] = "";
		}
		if(empty($inputTel)){
			$json['error']['inputTel'] = 'You did not fill the field "phone"!';
		}
		elseif(!preg_match("/[\+]\d\s\d[(][0-9]{1,3}[)] [0-9]{1,3}[-][0-9]{1,2}[-][0-9]{1,2}/", $inputTel)){
				$json['error']['inputTel'] = 'Wrong "phone" format!';
		}
		else{
			$json['error']['inputTel'] = "";
		}
		if(empty($inputEmail)){
			$json['error']['inputEmail'] = 'You did not fill the field "e-mail"!';
		}
		elseif(!preg_match("/[\w.]+[@][\w.]+[A-z]{2,3}/", $inputEmail)){
				$json['error']['inputEmail'] = 'Wrong "e-mail" format!';
		}
		else{
			$json['error']['inputEmail'] = "";
		}
	}
	echo json_encode($json);
?>