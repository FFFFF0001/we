/**
 * Created by mj on 2016/4/2.
 */
requirejs.config({
    baseUrl: './public/js/self',
    paths:{
    	wind:"../wind",
    	frontend:"../frontend",
        jquery:"../jquery",
        bootstrap:"./lib/bootstrap.min",
        num:"./num",
        pwd_auth:"./pwd_auth"
    }
});
require(['jquery','wind'], function($) {
    require(['frontend','bootstrap','num','pwd_auth'],function(frontend,bs,n,pa){
        $(document).ready(function(){
            $("#upd").click(function(){      //点击提交验证
                if( n($('#new_pwd'),6,36) && pa($('#new_pwd'),$('#new_pwd1')))  //缺少旧密码验证
                {
                    $('#form').submit();
                }
            });
        })
    })
});