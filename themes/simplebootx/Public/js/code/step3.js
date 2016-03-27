/**
 * Created by 海枯 on 2016/3/27.
 */
requirejs.config({
	paths:{
		jquery:"./lib/jquery-2.2.1.min",
        bootstrap:"./lib/bootstrap.min"
	}
});
require(['jquery','bootstrap'],function ($,b){
	//倒计时
	var cd = $("#countDown");
	(function countDown () {
		var num = cd.html();
		if(num>0){
			setTimeout(countDown,1000);
			cd.html(--num);
		}else if(num==0){
			window.location="./index.php?g=User&m=login&a=index";
		}
	})();
})
