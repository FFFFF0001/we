function omnipotent(t,i,e,n,a,s){a||(a=700),s||(s=500),Wind.use("artDialog","iframeTools",function(){art.dialog.open(i,{id:t,title:e,width:a,height:s,lock:!0,fixed:!0,background:"#CCCCCC",opacity:0,button:[{name:"确定",callback:function(){if(1==n)return!0;var t=this.iframe.contentWindow,i=t.document.getElementById("dosubmit");return i.click(),!1},focus:!0}]})})}function flashupload(t,i,e,n,a,s,l,r){var a=a?"&args="+a:"",u="&module="+s+"&catid="+l;Wind.use("artDialog","iframeTools",function(){art.dialog.open(GV.DIMAUB+"index.php?a=swfupload&m=asset&g=asset"+a+u,{title:i,id:t,width:"650px",height:"420px",lock:!0,fixed:!0,background:"#CCCCCC",opacity:0,ok:function(){n?n.apply(this,[this,e]):submit_ckeditor(this,e)},cancel:!0})})}function change_images(t,i){var e=t.iframe.contentWindow,n=e.$("#att-status").html().substring(1),a=e.$("#att-name").html().substring(1),s=$("#"+i).html(),l=n.split("|"),r=a.split("|");return $("#"+i+"_tips").css("display","none"),""==l?!0:($.each(l,function(t,e){var n=parseInt(1e4*Math.random()+10*t),a=r[t].substr(0,r[t].indexOf("."));s+="<li id='image"+n+"'><input title='双击查看' type='text' name='"+i+"_url[]' value='"+e+"' style='width:310px;' ondblclick='image_priview(this.value);' class='input image-url-input'> <input type='text' name='"+i+"_alt[]' value='"+a+"' style='width:160px;' class='input image-alt-input' onfocus=\"if(this.value == this.defaultValue) this.value = ''\" onblur=\"if(this.value.replace(' ','') == '') this.value = this.defaultValue;\"> <a href=\"javascript:flashupload('replace_albums_images', '图片替换','image"+n+"',replace_image,'10,gif|jpg|jpeg|png|bmp,0','','','')\">替换</a>  <a href=\"javascript:remove_div('image"+n+"')\">移除</a> </li>"}),void $("#"+i).html(s))}function replace_image(t,i){var e=t.iframe.contentWindow,n=e.$("#att-status").html().substring(1),a=e.$("#att-name").html().substring(1),s=($("#"+i).html(),n.split("|")),l=a.split("|");if($("#"+i+"_tips").css("display","none"),""==s)return!0;$("#"+i).find(".image-url-input").val(s[0]);var r=l[0].substr(0,l[0].indexOf("."));$("#"+i).find(".image-alt-input").val(r)}function upload_zip(t,i){var e=t.iframe.contentWindow,n=e.$("#att-status").html().substring(1),a=e.$("#att-name").html().substring(1),s=$("#"+i).html(),l=n.split("|"),r=a.split("|");return $("#"+i+"_tips").css("display","none"),""==l?!0:($.each(l,function(t,e){var n=parseInt(1e4*Math.random()+10*t),a=r[t].substr(0,r[t].indexOf("."));s+="<li id='image"+n+"'><input title='双击查看' type='text' name='"+i+"_url' value='"+e+"' style='width:310px;' ondblclick='image_priview(this.value);' class='input'> <input type='text' name='"+i+"_alt[]' value='"+a+"' style='width:160px;' class='input' onfocus=\"if(this.value == this.defaultValue) this.value = ''\" onblur=\"if(this.value.replace(' ','') == '') this.value = this.defaultValue;\"> <a href=\"javascript:remove_div('image"+n+"')\">移除</a> </li>"}),void $("#"+i).html(s))}function ueAttachment(uploadid,returnid){var d=uploadid.iframe.contentWindow,in_content=d.$("#att-status").html().substring(1);if(""==in_content)return!1;in_content=in_content.split("|");var i,in_filename=d.$("#att-name").html().substring(1),filenames=in_filename.split("|");for(eval("var ue = editor"+returnid),i=0;i<in_content.length;i++)ue.execCommand("inserthtml",'<a href="'+in_content[i]+'" target="_blank">附件：'+filenames[i]+"</a>")}function change_multifile(t,i){var e=t.iframe.contentWindow,n=e.$("#att-status").html().substring(1),a=e.$("#att-name").html().substring(1),s="",l=n.split("|"),r=a.split("|");return $("#"+i+"_tips").css("display","none"),""==l?!0:($.each(l,function(t,e){var n=parseInt(1e4*Math.random()+10*t),a=r[t].substr(0,r[t].indexOf("."));s+="<li id='multifile"+n+"'><input type='text' name='"+i+"_fileurl[]' value='"+e+"' style='width:310px;' class='input'> <input type='text' name='"+i+"_filename[]' value='"+a+"' style='width:160px;' class='input' onfocus=\"if(this.value == this.defaultValue) this.value = ''\" onblur=\"if(this.value.replace(' ','') == '') this.value = this.defaultValue;\"> <a href=\"javascript:remove_div('multifile"+n+"')\">移除</a> </li>"}),void $("#"+i).append(s))}function thumb_images(t,i){var e=t.iframe.contentWindow,n=e.$("#att-status").html().substring(1);return""==n?!1:IsImg(n)?($("#"+i+"_preview").attr("src")&&$("#"+i+"_preview").attr("src",n),void $("#"+i).val(n)):(isalert("选择的类型必须为图片类型！"),!1)}function change_onefile(t,i){var e=t.iframe.contentWindow,n=e.$("#att-status").html().substring(1),a=e.$("#att-name").html().substring(1),s=n.split("|");a.split("|");return $("#"+i+"_tips").css("display","none"),""==s?!0:void $("#"+i).val(s[0])}function isalert(t,i){""!=t&&(i=i||"error",Wind.use("artDialog",function(){art.dialog({id:i,icon:i,fixed:!0,lock:!0,background:"#CCCCCC",opacity:0,content:t,cancelVal:"确定",cancel:!0})}))}function image_priview(t){return""!=t?IsImg(t)?void Wind.use("artDialog",function(){art.dialog({title:"图片查看",fixed:!0,width:"600px",height:"420px",id:"image_priview",lock:!0,background:"#CCCCCC",opacity:0,content:'<img src="'+t+'" />',time:5})}):(isalert("选择的类型必须为图片类型！"),!1):void 0}function input_font_bold(){"700"==$("#title").css("font-weight")||"bold"==$("#title").css("font-weight")?($("#title").css("font-weight","normal"),$("#style_font_weight").val("")):($("#title").css("font-weight","bold"),$("#style_font_weight").val("bold"))}function submit_images(t,i){var e=t.iframe.contentWindow,n=e.$("#att-status").html().substring(1),n=n.split("|");IsImg(n[0])?$("#"+i).attr("value",n[0]):alert("选择的类型必须为图片类型")}function remove_id(t){$("#"+t).remove()}function strlen_verify(t,i,e){for(var n=t.value,e=e?e:200,a=e,s=strlen(n),l="utf-8",r=0;r<n.length;r++)(n.charCodeAt(r)<0||n.charCodeAt(r)>255)&&(a-="utf-8"==l?2:1);a>=s?$("#"+i).html(a-s):t.value=mb_cutstr(n,e,!0)}function strlen(t){return $.browser.msie&&-1!=t.indexOf("\n")?t.replace(/\r?\n/g,"_").length:t.length}function mb_cutstr(t,i,e){var n=0,a="",e=e?"":"...";i-=e.length;for(var s=0;s<t.length;s++){if(n+=t.charCodeAt(s)<0||t.charCodeAt(s)>255?"utf-8"==charset?3:2:1,n>i){a+=e;break}a+=t.substr(s,1)}return a}function remove_div(t){$("#"+t).remove()}function ruselinkurl(){return 1==$("#islink").is(":checked")?($("#linkurl").attr("disabled",null),!1):void $("#linkurl").attr("disabled","true")}function IsImg(t){for(var i,e=!1,n="jpg|gif|png|bmp|jpeg|zip",a=n.toUpperCase().split("|"),s=0;s<a.length;s++)if(i=t.substr(t.length-a[s].length-1),i=i.toUpperCase(),a[s]="."+a[s],a[s]==i){e=!0;break}return e}function IsSwf(t){for(var i,e=!1,n="swf",a=n.toUpperCase().split("|"),s=0;s<a.length;s++)if(i=t.substr(t.length-a[s].length-1),i=i.toUpperCase(),a[s]="."+a[s],a[s]==i){e=!0;break}return e}function add_multifile(t){var i=parseInt(1e4*Math.random()),e="<li id='multifile"+i+"'><input type='text' name='"+t+"_fileurl[]' value='' style='width:310px;' class='input'> <input type='text' name='"+t+"_filename[]' value='附件说明' style='width:160px;' class='input'> <a href=\"javascript:remove_div('multifile"+i+"')\">移除</a> </li>";$("#"+t).append(e)}var str="assssjdssskssalsssriweuouq[ir[eqnzvncdkjsssdss",arr=str.split("");str=arr.sort().join("");var max=0,index=0,re=/(\w)\1+/g;str.replace(re,function(t,i){max<t.length&&(max=t.length,index=i)}),console.log("出现最多的字符是"+index,"出现了"+max+"次");