/**
 * Created by mj on 2016/3/23.
 */
/*
* 两次密码输入验证
* */
define(['jquery','bootstrap'],function(){
        function pwd_auth(pwd1,pwd2){    //pwd1 第一次输入,pwd2 第二次输入
<<<<<<< HEAD
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
=======
            if(pwd1.val().length!=pwd2.val().length) {
                pwd2.popover({placement:"top",title:"两次密码输入不一致"});
                pwd2.popover('show');
            }
            else{
                pwd2.popover('hide');
>>>>>>> 628f19fcc23b24f7e965ef2c748624957ffd37e5
            }
        }
        return pwd_auth;
    }
)