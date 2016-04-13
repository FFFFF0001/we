/**
 * Created by mj on 2016/3/23.
 */
define(['jquery','bootstrap'],function(){
        function num_name(name,min,max){    //name jq对象
            if(name.val().length<min || name.val().length>max) {
                var text="请输入"+min+"-"+max+"个字符串";
                name.popover({placement:"top",title:text});
                name.popover('show');
            }
            else{
                name.popover('hide');
            }
        }
    }
)