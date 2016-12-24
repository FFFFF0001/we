/**
 * Created by Administrator on 2016/4/30.
 */
requirejs.config({
    baseUrl: './public/js/self',
    paths: {
        jquery: "../jquery",
        activity:'./_activity'
    }
});

require(['jquery','activity'],function ($,act) {
    
    /**
     * 感兴趣ajax添加DOM
     */
    $(".three_two").on("click",function () {
        var hiddenId = $("#hiddenId").val();
        $.post("./index.php?g=portal&m=Activity&a=do_interest",
            {actid:hiddenId},
            function(result){
                if(result.status==0){
                    alert(result.info);
                }else{
                    act.addInterestDom();
                    alert(result.info);
                }
            },'json');
    });
    /**
     * tab显示活动回顾
     */
    $("a.btn-activity").click(function () {

        var ind = $(this).index(),
        	content = $(".act-show"),
            btn = $('.top_next a');
        
        act.tab(ind,content,btn,'top_next_first');
    });
    /**
     * space page tab显示不同的回顾
     */
    $(".space-header-nav li").click(function(){
    	var ind = $(this).index(),
        	content = $(".tab-container"),
            btn = $('.space-header-nav li');
        
        act.tab(ind,content,btn,'tab-selected');
    });
    /**
     * 小组下面的tab
     */
    $(".space-content-nav .button").click(function(){
    	var ind = $(this).index(),
        	content = $(".group-child-tab"),
            btn = $('.space-content-nav .button');
        
        act.tab(ind,content,btn,'tab-g-child-selected');
    });
    
});
