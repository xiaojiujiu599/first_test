// JavaScript Document
$(function(){
	$(window).scroll(function(){
		if($(window).scrollTop()>200){
			$('.top').css('display','block')
		}else{
			$('.top').css('display','none')
		}
	})
	$('.top').click(function(){
		$('body,html').animate({
			scrollTop:'0px'
		},400);
	})	
	
	$(window).scroll(function(){
		if($(window).scrollTop()>560){
			$('.header').css('display','block');
			$('.header').css("background","FFD8CF");
		}else if($(window).scrollTop()<80){
			$('.header').css('display','block');
			$('.header').css("background","FFD8CF");
		}
		else{
			$('.header').css('display','none')
		}
	})
})


function checkLoginForm() {
	var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    if (username == null || username == "") {
        alert("用户名不能为空！");
        document.getElementById("username").focus();
        return false;
    }
    if (password == null || password == "") {
        alert("密码不能为空！");
        document.getElementById("password").focus();
        return false;
    }
	/*if(password.length < 2) {
        alert("密码长度必须为2-16位");
        $("password").focus();
        return false;
    }*/
    return true;
}

function checkRegistForm(){
	if(myform.name.value==""){
		 alert("请输入用户名");
		 myform.name.focus();
		 return false;
	 }
	
	 if (myform.pwd.value==""){
		 alert("请输入密码");
		 myform.pwd.focus();
		 return false;
	 }
	 if(myform.pwdconfirm.value==""){
		 alert("请再一次输入密码");
		 myform.pwdconfirm.focus();
		 return false;
	 }
	 if(myform.pwd.value != myform.pwdconfirm.value){
		 alert("你输入的两次密码不一致，请重新输入！");
		 myform.pwd.focus();
		 return false;
	 }
	 if (myform.yzm.value==""){
		 alert("请输入验证码");
		 myform.yzm.focus();
		 return false;
	 }
}
