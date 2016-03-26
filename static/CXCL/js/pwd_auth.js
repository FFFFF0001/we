/**
 * Created by mj on 2016/3/23.
 */
/*
* 两次密码输入验证
* */
define(['jquery','bootstrap'],function(){
        function pwd_auth(pwd1,pwd2){    //pwd1 第一次输入,pwd2 第二次输入
            if(pwd1.val().length!=pwd2.val().length) {
                pwd2.popover({placement:"top",title:"两次密码输入不一致"});
                pwd2.popover('show');
            }
            else{
                pwd2.popover('hide');
            }
        }
        return pwd_auth;
    }
)