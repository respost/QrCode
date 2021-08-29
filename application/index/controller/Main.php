<?php
/**
 *  ┏┻━━━━━┻┓
 *  ┃　　　　　　  ┃
 *  ┃ ┳┛　  ┗┳ ┃
 *  ┃　　　┻　　  ┃
 *  ┗━┓　┏━━━┛
 *      ┃　┃神兽 保佑
 *      ┃　┃代码无BUG
 *      ┃　┗━━━━━━━━━┓
 *      ┃  资源驿站 zy13.net   ┣┓
 *      ┃　　 QQ:97886526　  ┏┛
 *      ┗━┓  ┏━━━┓  ┏┛
 *          ┗━┛      ┗━┛
 */ 
namespace app\index\controller;
use think\Controller;
use think\Image;
use think\Db;
use think\Request;
use Zxing\QrReader;
use phpqrcode\QRcode;

class Main extends Common{
	
	public function _initialize(){	
        parent::_initialize(); 
	} 
    /**
     * 首页
     */
    public function index(){
		$uid=session('userid');		
		if(request()->isPost()){
			$data=input('');
			!isset($data['id']) && $this->error('参数非法');
			!isset($data['url']) && $this->error('二维码链接不能为空');	
			$id=trim($data['id']);
			$url=trim($data['url']);
			empty($id) && $this->error('参数非法');
			empty($url) && $this->error('二维码链接不能为空');
			try{
				$updata= array();
				$updata['url'] = $url;
				$updata['count'] = 0;
				$result = Db::name('poster')->where('id',$id)->update($updata);	
			} catch (\Exception $e) {
				$this->error('保存失败');
			}
			$this->success('保存成功');			
        }else{
			$code = Db::name('poster')->field('id,url,count')->where('uid',$uid)->find();
			$this->assign('code',$code);	
			return view();
	   }
    }	  
}
