/**
 * Created by mj on 2016/3/23.
 */
requirejs.config({
    baseUrl: '../../js/moudle/',
    paths:{
        jquery:"../lib/jquery-2.2.1.min",
        bootstrap:"../lib/bootstrap.min"
    }
});
require(['jquery'], function($) {
    require(['bootstrap','num','pwd_auth','email_check'],function(bs,n,pa,ec){
        //code goes here
        $(document).ready(function(){
            $('#name').blur(function(){     //字符个数验证
                n($('#name'),2,9);
            });
            $('#password').blur(function(){        //密码个数验证
                n($('#password'),6,36);
            });
            $('#again_pwd').blur(function(){        //两次密码验证
                pa($('#password'),$('#again_pwd'));
            });
            $('#email').blur(function(){        //两次密码验证
               ec($('#email'));
            });
            $('input').click(function(){
                if($(this)!=$('#email')){
                    $(this).popover('destroy');
                }
            });
            $("#register").click(function(){      //点击提交再次验证
                if(n($('#name'),2,9) && ec($('#email')) && n($('#password'),6,36) && pa($('#password'),$('#again_pwd')))
                {
                $('#form').submit();
                }
            });

        })
    })
});