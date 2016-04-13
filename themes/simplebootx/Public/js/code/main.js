/**
 * Created by mj on 2016/3/19.
 */
requirejs.config({
    paths:{
        jquery:"./lib/jquery-2.2.1.min",
        bootstrap:"./lib/bootstrap.min",
        login:"./login"
    }
});

require(['jquery','bootstrap','login'], function($,bs,login) {
	var lbtn = $("#login_btn"),
	lf= $("#logFm");
    lbtn.click(function(){
    	var un = $("#input_username").val(),
    	ps = $("#input_password").val(),
    	vr = $("#input_verify").val(),
    	btn = $(this);
    	
    	var usrRst = login.checkUserName("input_username",un);
    	var pwdRst = login.checkPass("input_password",ps);
    	var vfyRst = login.checkVerfiy("input_verify",vr);
    	if(usrRst&&pwdRst&&vfyRst){
//  		aj(lf.attr("action"),{username:un,password:ps,verify:vr});
			//btn.addClass("js-ajax-submit").trigger("click");
    	}
    })
});

