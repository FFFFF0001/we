define(['jquery'], function($) {

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
	/**
	 * 显示错误
	 * @param {Object} input标签id
	 * @param {Object} 错误内容
	 */
	function showError(selector, cont) {
		var sele = document.getElementById(selector);
		if (sele.nextSibling == null) {
			insert(sele,cont);
		} else { //avoid repeat produce
			sele.nextSibling.remove();
			insert(sele,cont);
		}
		function insert(selector,cont) {
			var tip = document.createElement("p");
			var icon = document.createElement("i");

			tip.setAttribute("class","tipFrame");
			tip.innerHTML = cont;
			
			icon.setAttribute("class","glyphicon glyphicon-remove");
			tip.appendChild(icon);
			//插入到下一节点
			selector.parentNode.insertBefore(tip, selector.nextSibling);
			
		}

	}

	/**
	 * 
	 * @param {Object} selector	input标签id
	 */
	function cancelError(selector) {
		var sele = document.getElementById(selector);
		if(sele.nextSibling != null)
		sele.nextSibling.remove();
	}
	/**
	 * 检查用户名的合法性
	 * @param {String} idName id的名字
	 * @param {Object} str 被检测的string
	 */
	function checkUserName(idName,str) {
		var e = /@/;
		if (isTrimAndNull(str)) {
			showError(idName,"用户名不能为空");
		}else if(e.test(str) || isEmail(str)){
			showError(idName,"邮箱格式不正确");
		}else{
			cancelError(idName);
			return true;
		}
	}
	/**
	 * 检查密码的合法性
	 * @param {String} idName id的名字
	 * @param {Object} str 被检测的string
	 */
	function checkPass(idName,str){
		if (isTrimAndNull(str)) {
			showError(idName,"密码不能为空");
		} else{
			cancelError(idName);
			return true;
		}
	}
	
	function checkVerfiy (idName,str) {
		if (isTrimAndNull(str)) {
			showError(idName,"验证码不能为空");
		} else{
			cancelError(idName);
			return true;
		}
	}
	return {
		checkUserName:checkUserName,
		checkPass:checkPass,
		checkVerfiy:checkVerfiy
	}
})