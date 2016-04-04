/**
 * Created by mj on 2016/4/2.
 */
requirejs.config({
    baseUrl: './public/js/self',
    paths:{
        jquery:"lib/jquery-2.2.1.min",
        bootstrap:"lib/bootstrap.min",
        cityselect:"jquery.cityselect"
    }
});
require(['jquery'],function(){
        require(['cityselect'],function(s){
        	var btnSave = $("#edit-save");
        	//"#edit-form textarea"
        	$("#edit-form input")
        	.add("#edit-form select")
        	.add("#edit-form textarea")
        	.change(function () {
        		btnSave.removeAttr("disabled");
        	});
            $(function(){
                $("#birthplace").citySelect({
                    nodata:"none",
                    prov:'广东',
                    url:'./public/js/self/city.min.js',
                    required:false
            });
        });
    })

});
