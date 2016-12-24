<?php

/**
 * 会员中心
 */
namespace User\Controller;
use Common\Controller\HomebaseController;
class ProfileController extends HomebaseController {
	
	protected $users_model,$acti_model,$topic_model,$acti_join_model,$interestModel;
	function _initialize(){
		parent::_initialize();
		$this->users_model=D("Common/Users");
		$this->acti_model = M('activity');
		$this->topic_model = M('topic');
		$this->acti_join_model = M('activity_join');
		$this->interestModel = M('interest');
	}

	/**
	 * 感兴趣的活动tpl
	 */
	public function ucenter_act_interest()
	{
		if(!sp_is_user_login()){
			$this->error('请登陆后重试');
		}
		$uid = sp_get_current_userid();
		$this->assign('interests', $this->isinterest($uid));
		$this->display();
	}
	/**
	 * 参加的活动tpl
	 */
	public function ucenter_activity(){
		if(!sp_is_user_login()){
			$this->error('请登陆后重试');
		}
		$uid = sp_get_current_userid();
		$this->assign('joins', $this->joined_acti($uid));
		$this->display();
	}
	/**
	 * 我加入的小组tpl
	 */
	public function ucenter_joined_gp()
	{
		if(!sp_is_user_login()){
			$this->error('请登陆后重试');
		}
		$uid = sp_get_current_userid();

		$this->assign('IjoinsGroup', $this->iJoin($uid));
		$this->display();
	}
	/**
	 * 我创建的话题tpl
	 */
	public function ucenter_tp_create()
	{
		if(!sp_is_user_login()){
			$this->error('请登陆后重试');
		}
		$uid = sp_get_current_userid();
		$this->assign('IcreateTopics', $this->iCreateTopic($uid));
		$this->display();

	}
	/**
	 * 取消感兴趣的活动
	 */
	public function cancelActInterest()
	{
		if(!sp_is_user_login()){
			$this->error('请登陆后重试');
		}
		$uid = sp_is_user_login();
		$aid = $_GET['id'];
		$results = $this->interestModel->where(array('user_id'=>$uid,'activity_id'=>$aid))->find();
		if($results){
			$this->interestModel->where(array('user_id'=>$uid,'activity_id'=>$aid))->delete();
			$this->success('取消成功');
		}else{
			$this->error('取消失败，该条记录已经不存在');
		}
	}
	/**
	 * 组织用户详情页
	 */
	public function space()
	{
		$uid = I('get.id');
		$users = $this->users_model->alias('a')
			->where(array('a.id'=>$uid))
			->find();
		$this->assign('users', UserAvatar($users));

		$this->assign('participant',$this->acti_participant($uid));

		$this->assign('join_actis', $this->joined_acti($uid));

		$this->assign('interests', $this->isinterest($uid));

		$this->assign('joins', $this->iJoin($uid));

		$this->assign('createGroups', $this->iCreate($uid));

		$this->display();
	}

	public function organ_space()
	{
		$oid = I('get.organ_id');

		$users = $this->users_model->alias('a')
					->join('RIGHT JOIN '.C('DB_PREFIX').'organization b ON a.id=b.users_id')
					->where(array('a.id'=>$oid))
					->find();
		$users = UserAvatar($users);
		$this->assign('users', $users);
		$nullElse = $this->created_acti($oid);
		$this->assign('creates',$nullElse);

		$this->assign('participant',$this->acti_participant($oid));

		$this->assign('joins', $this->iJoin($oid));

		$this->assign('createGroups', $this->iCreate($oid));

		$this->display();
	}
	/**
	 * 活动参与者
	 */
	public function acti_participant($uid)
	{

		//$uid = sp_get_current_userid();
		$peoples = $this->users_model->alias('a')
					->join('RIGHT JOIN '.C('DB_PREFIX').'activity_join b ON a.id=b.user_id')
					->join(C('DB_PREFIX').'activity c ON b.activity_id=c.id')
					->where(array('c.user_id'=>$uid))
					->field('a.id,user_nicename,a.avatar')
					->select();
		return UserAvatar($peoples);
	}
	/**
	 * 创建的活动
	 */
	public function created_acti($uid)
	{
		$uid = empty($uid)?sp_get_current_userid():$uid;
		$creates = $this->users_model->alias('a')
			->join('RIGHT JOIN '.C('DB_PREFIX').'activity as b ON a.id = b.user_id')
			->join(C('DB_PREFIX').'organization as c ON a.id = c.users_id')
			->where(array('a.id'=>$uid))
			->field('b.cover,b.id,activity_name,start_time,end_time,b.create_time,area,manager_name,avatar,join_count,act_zan_count')
			->select();
		return NullActivityCover($creates);
	}
	/**
	 * 参加的活动
	 */
	public function joined_acti($uid)
	{

		$joins = $this->users_model->alias('a')
					->join('RIGHT JOIN '.C('DB_PREFIX').'activity_join as b ON a.id = b.user_id')
					->join(C('DB_PREFIX').'activity as c ON c.id = b.activity_id')
					->join(C('DB_PREFIX').'organization as d ON d.users_id = a.id')
					->where(array('a.id'=>$uid))
					->field('c.id,activity_name,start_time,end_time,c.create_time,area,manager_name,join_count,act_zan_count,join_id,join_status')
					->select();
		return NullActivityCover($joins);
	}
	/**
	 * 感兴趣的活动
	 */
	public function isinterest($uid)
	{
		$interests = $this->users_model->alias('a')
			->join(C('DB_PREFIX').'interest as b ON a.id = b.user_id')
			->join(C('DB_PREFIX').'activity as c ON b.activity_id = c.id')
			->where(array('a.id'=>$uid))
			->select();
		return NullActivityCover($interests);
	}
	/**
	 * 我创建的小组
	 */
	public function iCreate($uid)
	{
		$groupCreates = $this->users_model->alias('a')
			->join(C('DB_PREFIX').'group as b ON a.id = b.user_id')
			->where(array('a.id'=>$uid))
			->select();
		return NullGroupCover($groupCreates);
	}
	/**
	 * 我加入的小组
	 */
	public function iJoin($uid)
	{

		$groupsJoins = $this->users_model->alias('a')
			->join('RIGHT JOIN '.C('DB_PREFIX').'join as b ON a.id = b.user_id')
			->join(C('DB_PREFIX').'group as c ON b.group_id = c.group_id')
			->where(array('a.id'=>intval($uid)))
			->field('c.group_id,group_cover,group_total,chat_count,group_create,group_name,b.create_time,group_type')
			->select();
		return NullGroupCover($groupsJoins);
	}
	/**
	 * 发起的话题
	 */
	public function iCreateTopic($uid)
	{

		$topicCreates = $this->users_model->alias('a')
			->join(C('DB_PREFIX').'topic as b ON a.id = b.user_id')
			->where(array('a.id'=>intval($uid)))
			->select();
		foreach ($topicCreates as $key => $topicCreate) {
			$topicCreates[$key]['topic_content'] = strip_tags($topicCreate['topic_content']);
		}
		$topics = substring($topicCreates, 'topic_content', 100);
		return NullTopicCover($topics);
	}
	/**
	 * 回应的话题
	 */
	public function iAnswerTopic()
	{
		$uid = sp_get_current_userid();
		$AnswerTopics = $this->users_model->alias('a')
			->join(C('DB_PREFIX').'comments as b ON a.id = b.uid')
			->join(C('DB_PREFIX').'topic as c ON b.post_id = c.topic_id')
			->where(array('b.post_table' => 'topic', 'a.id' => $uid))
			->select();
		var_dump($AnswerTopics);
	}
    //编辑用户资料
	public function edit() {
		if(!sp_is_user_login()){
			$this->error('请登陆后重试');
		}
		$userid=sp_get_current_userid();
		$user=$this->users_model->where(array("id"=>$userid))->find();
		$this->assign($user);
    	$this->display();
    }
    
    public function edit_post() {
		if(!sp_is_user_login()){
			$this->error('请登陆后重试');
		}
    	if(IS_POST){
    		$userid=sp_get_current_userid();
    		$_POST['id']=$userid;
    		if ($this->users_model->create()) {
				if ($this->users_model->save()!==false) {
					$user=$this->users_model->find($userid);
					sp_update_current_user($user);
					$this->success("保存成功！",U("user/profile/edit"));
				} else {
					$this->error("保存失败！");
				}
			} else {
				$this->error($this->users_model->getError());
			}
    	}
    	
    }
	/**
	 * 删除话题
	 */
	public function deleteTopic(){
		$tid = $_GET['id'];
		$results  = $this->topic_model->where(array('topic_id'=>$tid))->find();
		if($results){
			$this->topic_model->where(array('topic_id'=>$tid))->delete();
			$this->success('删除成功');
		}else{
			$this->error('找不到该条话题记录，非法操作');
		}
	}
	/**
	 * 取消报名活动
	 */
	public function cancelJoinAct()
	{
		if(!sp_is_user_login()){
			$this->error('请登陆后重试');
		}
		$jid = $_GET['id'];

		$results = $this->acti_join_model->where(array('join_id'=>$jid))->find();

		$aid = $results['activity_id'];

		if($results){
			$this->acti_join_model->where(array('join_id'=>$jid))->delete();
			$this->success('你已成功取消',U('portal/Activity/activity_detail',array('id'=>$aid)));
		}else{
			$this->error('你已经取消过报名');
		}

	}
    public function password() {
		if(!sp_is_user_login()){
			$this->error('请登陆后重试');
		}
    	$userid=sp_get_current_userid();
    	$user=$this->users_model->where(array("id"=>$userid))->find();
    	$this->assign($user);
    	$this->display();
    }
    
    public function password_post() {
		if(!sp_is_user_login()){
			$this->error('请登陆后重试');
		}
    	if (IS_POST) {
    		if(empty($_POST['old_password'])){
    			$this->error("原始密码不能为空！");
    		}
    		if(empty($_POST['password'])){
    			$this->error("新密码不能为空！");
    		}
    		$uid=sp_get_current_userid();
    		$admin=$this->users_model->where("id=$uid")->find();
    		$old_password=$_POST['old_password'];
    		$password=$_POST['password'];
    		if(sp_compare_password($old_password, $admin['user_pass'])){
    			if($_POST['password']==$_POST['repassword']){
    				if(sp_compare_password($password, $admin['user_pass'])){
    					$this->error("新密码不能和原始密码相同！");
    				}else{
    					$data['user_pass']=sp_password($password);
    					$data['id']=$uid;
    					$r=$this->users_model->save($data);
    					if ($r!==false) {
    						$this->success("修改成功！");
    					} else {
    						$this->error("修改失败！");
    					}
    				}
    			}else{
    				$this->error("密码输入不一致！");
    			}
    	
    		}else{
    			$this->error("原始密码不正确！");
    		}
    	}
    	 
    }
    
    
    function bang(){
		if(!sp_is_user_login()){
			$this->error('请登陆后重试');
		}
    	$oauth_user_model=M("OauthUser");
    	$uid=sp_get_current_userid();
    	$oauths=$oauth_user_model->where(array("uid"=>$uid))->select();
    	$new_oauths=array();
    	foreach ($oauths as $oa){
    		$new_oauths[strtolower($oa['from'])]=$oa;
    	}
    	$this->assign("oauths",$new_oauths);
    	$this->display();
    }
    
    function avatar(){
		if(!sp_is_user_login()){
			$this->error('请登陆后重试');
		}
    	$userid=sp_get_current_userid();
		$user=$this->users_model->where(array("id"=>$userid))->find();
		$this->assign($user);
    	$this->display();
    }
    
    function avatar_upload(){
		if(!sp_is_user_login()){
			$this->error('请登陆后重试');
		}
    	$config=array(
    			'FILE_UPLOAD_TYPE' => sp_is_sae()?"Sae":'Local',//TODO 其它存储类型暂不考虑
    			'rootPath' => './'.C("UPLOADPATH"),
    			'savePath' => './avatar/',
    			'maxSize' => 512000,//500K
    			'saveName'   =>    array('uniqid',''),
    			'exts'       =>    array('jpg', 'png', 'jpeg'),
    			'autoSub'    =>    false,
    	);
    	$upload = new \Think\Upload($config);//
    	$info=$upload->upload();
    	//开始上传
    	if ($info) {
    	//上传成功
    	//写入附件数据库信息
    		$first=array_shift($info);
    		$file=$first['savename'];
    		$_SESSION['avatar']=$file;
    		$this->ajaxReturn(sp_ajax_return(array("file"=>$file),"上传成功！",1),"AJAX_UPLOAD");
    	} else {
    		//上传失败，返回错误
    		$this->ajaxReturn(sp_ajax_return(array(),$upload->getError(),0),"AJAX_UPLOAD");
    	}
    }
    
    function avatar_update(){
		if(!sp_is_user_login()){
			$this->error('请登陆后重试');
		}
    	if(!empty($_SESSION['avatar'])){
    		$targ_w = intval($_POST['w']);
    		$targ_h = intval($_POST['h']);
    		$x = $_POST['x'];
    		$y = $_POST['y'];
    		$jpeg_quality = 90;
    		
    		$avatar=$_SESSION['avatar'];
    		$avatar_dir=C("UPLOADPATH")."avatar/";
    		if(sp_is_sae()){//TODO 其它存储类型暂不考虑
    			$src=C("TMPL_PARSE_STRING.__UPLOAD__")."avatar/$avatar";
    		}else{
    			$src = $avatar_dir.$avatar;
    		}
    		
    		$avatar_path=$avatar_dir.$avatar;
    		
    		
    		if(sp_is_sae()){//TODO 其它存储类型暂不考虑
    			$img_data = sp_file_read($avatar_path);
    			$img = new \SaeImage();
    			$size=$img->getImageAttr();
    			$lx=$x/$size[0];
            	$rx=$x/$size[0]+$targ_w/$size[0];
            	$ty=$y/$size[1];
            	$by=$y/$size[1]+$targ_h/$size[1];
    			
    			$img->crop($lx, $rx,$ty,$by);
    			$img_content=$img->exec('png');
    			sp_file_write($avatar_dir.$avatar, $img_content);
    		}else{
    			$image = new \Think\Image();
    			$image->open($src);
    			$image->crop($targ_w, $targ_h,$x,$y);
    			$image->save($src);
    		}
    		
    		$userid=sp_get_current_userid();
    		$result=$this->users_model->where(array("id"=>$userid))->save(array("avatar"=>$avatar));
    		$_SESSION['user']['avatar']=$avatar;
    		if($result){
    			$this->success("头像更新成功！");
    		}else{
    			$this->error("头像更新失败！");
    		}
    		
    	}
    }
    
    
}
    
