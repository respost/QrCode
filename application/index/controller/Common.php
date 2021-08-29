<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Cache;
use think\Session;
use think\Request;

class Common extends Controller
{
	protected $user = null;   
    public function _initialize(){	
        parent::_initialize(); 
        if(!Session::has('userid')){
            $this->redirect(url('@index/login'));exit;
        }else{
            $uid = session('userid');
			$this->user = Db::name('user')->where('id',$uid)->find();
            empty($this->user) && $this->redirect(url('@index/login')); 
            $this->user['status'] == 0 && $this->redirect(url('@index/login')); 
            unset($this->user['password']); 
            $this->assign(['user'=>$this->user]); 
        }   
	} 
}
