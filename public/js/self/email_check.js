/**
 * Created by mj on 2016/3/24.
 */
/*
 * 邮箱验证
 * */
define(['jquery','bootstrap'],function(){
    function isEmail(str) {
        var re = /([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,5})+/;
        if (re.test(str)) {
            return true;
        } else {
            return false;
        }
    }

    function isTrimAndNull(str) {
        var re = /(\s)+/;
        if (re.test(str) || str.length == 0) {
            return true;
        } else {
            return false;
        }
    }

    function email_check(email){    //用户名
        if(isTrimAndNull(email.val())) {
            email.parent().addClass("has-error");
            email.popover({placement: "top",content: '<div id="content" style="color:#a94442">邮箱不能为空</div>',trigger:"manual",html: true});
            email.popover('show');
            return false;
        }
        else {
            if(!isEmail(email.val())) {
                email.parent().addClass("has-error");
                email.popover({placement: "top",content: '<div id="content" style="color:#a94442">邮箱格式不正确</div>',trigger:"manual",html: true});
                email.popover('show');
                return false;
            }
            else {
                email.parent().removeClass("has-error");
                email.popover('hide');
                return true;
            }
        }
    }
    return email_check;
})