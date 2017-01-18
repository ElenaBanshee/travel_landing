/*********************************************/
function sender() {
	var msg = $("#form_order_now").serialize();
	$.ajax({
		type: "POST",
		url: "send.php",
		data: msg,
		success: function(data) {
			da=$.parseJSON(JSON.stringify(data));			
			err=da.error;
			
			$("#nameerror").html(err.name).addClass("error_class");
			$("#phoneerror").html(err.phone).addClass("error_class");
			$("#mailerror").html(err.email).addClass("error_class");
			if((err.name.length <1 )&&(err.phone.length <1 )&&(err.email.length <1 )){
				$('#ModalOrderNow').modal('hide');
				$("#modalInputName").val('');
				$("#modalInputTel").val('');
				$("#modalInputEmail").val('');					
			}
			console.log(err.name);
			console.log(err.phone);
			console.log(err.email);
		},
		error:  function(xhr, str){
			alert("Error!");
		}
	});
}
/*********************************************/
function sender_inline() {
	var msg = $("#form_inline").serialize();
	$.ajax({
		type: "POST",
		url: "send_inline.php",
		data: msg,
		success: function(data) {
			da=$.parseJSON(JSON.stringify(data));			
			err=da.error;
			
			$("#nameerror_inline").html(err.your_name).addClass("error_class");
			$("#telerror_inline").html(err.your_tel).addClass("error_class");
			if((err.your_name.length <1 )&&(err.your_tel.length <1 )){
				$("#your_name").val('');
				$("#your_tel").val('');
				$("#send_inf").html('Your data is sent!').addClass("sent");								
			}
			console.log(err.your_name);
			console.log(err.your_tel);			
		},
		error:  function(xhr, str){
			alert("Error!");
		}
	});
}
/*********************************************/
function sender_contacts() {
	var msg = $("#form_contacts").serialize();
	$.ajax({
		type: "POST",
		url: "send_contacts.php",
		data: msg,
		success: function(data) {
			da=$.parseJSON(JSON.stringify(data));			
			err=da.error;
			
			$("#nameerror_contacts").html(err.inputName).addClass("error_class").addClass("abs_pos");
			$("#phoneerror_contacts").html(err.inputTel).addClass("error_class").addClass("abs_pos");
			$("#mailerror_contacts").html(err.inputEmail).addClass("error_class").addClass("abs_pos");
			if((err.inputName.length <1 )&&(err.inputTel.length <1 )&&(err.inputEmail.length <1 )){
				
				$("#inputName").val('');
				$("#inputTel").val('');
				$("#inputEmail").val('');
				$("#send_contacts").html('Your data is sent!').addClass("sent").addClass("pos_center");
			}						
		},
		error:  function(xhr, str){
			alert("Error!");			
		}
	});
}
/*******************************/
$(document).ready(function(){	
/*******************************/
function Anchor(active){
	if(active==true){
		var hash = window.location.hash;
		if(hash){ 
			$("menu-ul li a").removeClass("active");
			$("a[href="+hash+"]").addClass("active");
		}
	}
	function AnchorHref(){
		var anchor = $(this);
		if(hash){
			$("menu-ul li a").removeClass("active");
			anchor.addClass("active");
		}
		$("html,body").animate({
			scrollTop: $(anchor.attr("href")).offset().top},2000);		
	}
	$("a[href*=#]").click(AnchorHref);
}
Anchor(true);
/********************************************************/
$("body").
append('<div id="toTop"><i class="fa fa-caret-up fa-3x"></i></div>');
$(window).scroll(function(){
	if($(this).scrollTop() > 200){
		$("#toTop").fadeIn();
	}
	else{
		$("#toTop").fadeOut();
	}
});
$("#toTop").click(function(){
	$("html,body").animate({scrollTop:0},2000);
});
/*******************************************************/
$("input[id='your_tel']").mask("+3 8(999) 999-99-99");
$("input[id='inputTel']").mask("+3 8(999) 999-99-99");
$("input[id='modalInputTel']").mask("+3 8(999) 999-99-99");	
/*******************************************************/
});