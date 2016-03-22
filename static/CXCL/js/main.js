/**
 * Created by mj on 2016/3/19.
 */
requirejs.config({
    baseUrl: './js/lib',
    paths:{
        jquery:"jquery-2.2.1.min",
        bootstrap:"bootstrap.min"
    }
});

require(['jquery','bootstrap','../login'], function($,bs,login) {
    $("#login_btn").click(function(){
    	var un = $("#user").val(),
    	ps = $("#password").val();
    	
    	login.checkUserName(un);
    	login.checkPass(ps);
    })
});