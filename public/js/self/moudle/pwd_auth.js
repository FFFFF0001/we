/*
* 验证两次密码输入是否相同
* 返回pwd_auth方法
*参数是两次密码输入的jq对象
*
* */
define(['jquery','bootstrap'],function(){
        function pwd_auth(pwd1,pwd2){    //pwd1 第一次输入,pwd2 第二次输入
            if($.trim(pwd1.val())!=$.trim(pwd2.val()))
            {
                pwd2.parent().addClass("has-error");
                pwd2.popover({placement:"top",content: '<div id="content" style="color:#a94442">两次密码不一致</div>',trigger:"manual",html: true});
                pwd2.popover('show');
                return false;
            }
            else{
                pwd2.parent().removeClass("has-error");
                pwd2.popover('hide');
                return true;
            }
        }
        return pwd_auth;
    }
);