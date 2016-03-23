/**
 * Created by mj on 2016/3/23.
 */
requirejs.config({
    baseUrl: '../../js',
    paths:{
        jquery:"lib/jquery-2.2.1.min",
        bootstrap:"lib/bootstrap.min"
    }
});
require(['jquery'], function($) {
    require(['bootstrap','num','pwd_auth'],function(bs,n,pa){
        //code goes here
        $(document).ready(function(){
            $('#name').blur(function(){     //字符个数验证
                n($('#name'),2,9);
            })
            $('#password').blur(function(){        //两次密码验证
                n($('#password'),6,36);
            })
            $('#again_pwd').blur(function(){        //两次密码验证
                pa($('#password'),$('#again_pwd'));
            })
        })
    })
});