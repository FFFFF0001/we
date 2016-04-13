/**
 * Created by mj on 2016/4/2.
 */
requirejs.config({
    baseUrl: './public/js/self',
    paths:{
        jquery:"./lib/jquery-2.2.1.min",
        bootstrap:"./lib/bootstrap.min"
    }
});
require(['jquery'], function($) {
    require(['bootstrap','num','pwd_auth'],function(bs,n,pa){
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