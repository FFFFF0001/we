/**
 *
 * Created by Administrator on 2016/4/30.
 */
define(['jquery'],function ($) {

    var obj = {
        addInterestDom:function addInterestDom () {
                var pNode = $("#wrapper-act-active"),
                    parseUsr = JSON.parse(localStorage.usrmsg),//解析json对象
                    src = parseUsr.src,//用户avatar
                    nickname = parseUsr.user;//用户名
                pNode.append(
                    "<div class='right_third'>"
                    +"<div class='right_third_img'><img src='"+src+"' alt=''></div>"
                    +"<div class='right_third_p'>"
                    +"<p class='r-avatar-username jieduan'>"+nickname+"</p>"
                    +"<p class='right_third_span_font'>对这个活动感兴趣</p>"
                    +"</div>"
                    +"<span class='right_third_span'>刚刚</span>"
                    +"</div>"
                );
            },
        tab:function actDetailTab(ind,eachContent,btn,ClassN) {

            btn.removeClass(ClassN);
            eachContent.hide();
            
            btn.eq(ind).addClass(ClassN);
            eachContent.eq(ind).show();

        }

    };

    return obj;
});
