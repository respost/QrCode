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

/**
 * 首页控制器
 */
class Index extends Controller{

    /**
     * 图片目录
     * @var [type]
     */
    private $path = ROOT_PATH . 'public/static/images/';
	private $uploads = ROOT_PATH . 'public/uploads/';

    /**
     * 首页
     * @return [type] [description]
     */
    public function index(){
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        $count = Db::name('code')->where('time','>',$beginToday)->where('time','<',time())->count();
        $total = Db::name('code')->count();
        $number = Db::name('code')->sum('number');
        $this->assign([
            'count' => $count,
            'total' => $total,
            'number' => $number
        ]);
        return $this->fetch();
    }
	/*
     * 登录
     */
	public function login(){
        if(request()->isPost()){
            $data=input('post.');					
            (!isset($data['username']) || !isset($data['password'])) && $this->error('参数错误');
			$username=trim($data['username']);
			$password=trim($data['password']);
            $user = Db::name('user')->where('username',$username)->find();
            empty($user) && $this->error('用户不存在,请重新输入'); 
            md5($password) != $user['password'] && $this->error('密码错误');
            $user['status'] == 0 && $this->error('账号已被冻结（禁用）');        
            Db::name('user')->where('id',$user['id'])->setField('lastdate',date('Y-m-d H:i:s')); 
            session('userid',$user['id']);
			$remflag = trim($data['remflag']);
			if($remflag=="1"){
				//添加cookie
				setcookie("userCookie",$username."-".$password,time()+3600);
			}else{
				//删除cookie
				setcookie("userCookie","",time()-3600);
			}
            $this->success('登录成功',url('@main/index'));
        }else{		
            return view();
        }
    }
	/*
     * 注册
     */
	public function register(){
		if(request()->isPost()){
            $data=input('post.');  
            (!isset($data['username']) || !isset($data['password'])) && $this->error('参数错误');
            $username=trim($data['username']);
			$password=trim($data['password']);
			//用户名（手机号码）
			!preg_match('/^1[0-9]{10}$/i', $username)&& $this->error('请输入11位的手机号码');
			//密码
			!preg_match('/^[\S]{6,12}$/i', $password)&& $this->error('密码必须6到12位，且不能出现空格');		
            trim($data['password']) != trim($data['repassword']) && $this->error('两次输入的密码不匹配');	
            Db::name('user')->where('username',trim($data['username']))->find() && $this->error('用户名已经存在,请更换手机号码注册');         

			$resultid = null;
            Db::startTrans();
            try{
                $insert_data = ['username'=>trim($data['username']),'password'=>md5(trim($data['password'])),'status'=>1,'regdate'=>date('Y-m-d H:i:s'),'lastdate'=>date('Y-m-d H:i:s')];			
			    //生成商户ID号
				$insert_data['number']=date("Y").$this->getRandNumber(); 
				//生成商户密钥
				$insert_data['token']=	$this->createSecret();
				//生成算法密钥
				$insert_data['deskey']=	$this->createDesKey();
				Db::name('user')->insertGetId($insert_data);        
                Db::commit();
			} catch (\Exception $e) {
                Db::rollback();
				$this->error('注册失败');
			}

            if(!empty($resultid)){
                session('userid',$resultid);
                $this->success('注册成功',url('@main/index'));	
            }           
        }
        return view();
    }
	/*
     * 退出
     */
    public function logout(){
        session('userid',null);
        $this->redirect(url('@index'));
    }
    /**
     * 二维码上传
     * @return [type] [description]
     */
    public function uploads($pay){
        ini_set('memory_limit','1024M');
        $path = $this->uploads . 'temp/';
		if(!file_exists($path)){
			mkdir($path,0777,true);
		}
        $file = request()->file('file');
        $info = $file->rule(function(){return md5(microtime(true));})->validate(['size'=>2097152,'ext'=>'jpg,png,jpeg,bmp'])->move($path);			
        if($info){
            $name = $info->getFilename(); 
            unset($info);
            $qrcode = new QrReader($path.$name); 
            $url = $qrcode->text();
			//thinkphp使用unlink删除文件，参数是文件的路径
            @unlink($path.$name);		
            if (!$url) {
                return [ 'status' => 1, 'msg' => '二维码识别失败' ];
            }
            if($pay == 'alipay' && stripos ($url,'ALIPAY.COM') === false) {
                return [ 'status' => 1, 'msg' => '请上传正确的支付宝收款码'];
            }elseif ($pay == 'qq' && stripos($url,'qianbao.qq') === false) {
                return [ 'status' => 1, 'msg' => '请上传正确的QQ收款码'];
            }elseif ($pay == 'wechat' && (stripos($url,'wxp://') === false && stripos($url,'wx.tenpay.com') === false)) {
                return [ 'status' => 1, 'msg' => '请上传正确的微信收款码'];
            }
            return [ 'status' => 0, 'msg' => $url];
        }
        return [ 'status' => 1, 'msg' => $file->getError()];
    }

    /**
     * 生成二维码
     * @return [type] [description]
     */
    public function make(){
        $file_name = md5(time()).'.png';
		$dir=$this->uploads .'qr/';
		if(!file_exists($dir)){
			mkdir($dir,0777,true);
		}
        $file = $dir. $file_name;
        $name = input('post.name');
        $name = $name=='' ? config('title','收款码'): $name;
		$template = input('post.template');
		$template = $template=='' ? '001': $template;
        $len = mb_strlen($name, 'UTF-8');
        if ($len > 5) {
            return [ 'status' => 1, 'msg' => '昵称最大限制5个字数'];
        }
        $id = Db::name('code')
            ->insertGetId([
                'qr' => $file_name,
                'alipay' => input('post.alipay'),
                'qq' => input('post.qq'),
                'wechat' => input('post.wechat'),
                'time' => time(),
                'name' => $name,
                'ip' => get_client_ip()
            ]);
		//二维码大小
		$size=20;
		//白色边框大小
		$boder=2;
		//是否添加文本
		$wenzi=false;
		//根据图片不同，调整位置
		switch ($template){
		case '001':
			$position=[160,200];
			$wenzi=true;
		  break;  
		case '002':
			$position=[160,330];
		  break;
		case '003':
			$position=[190,600];
			$size=18;
		  break;
		case '004':
			$position=[135,150];
			$size=22;
		  break;
		case '005':
			$position=[190,90];
			$size=18;
		  break;
		case '006':
			$position=[262,555];
			$size=13;
		  break;
		case '007':
			$position=[265,560];
			$size=13;
		  break;
		case '008':
			$position=[270,440];
			$size=13;
			$boder=1;
		  break;
		case '009':
			$position=[210,420];
			$size=16;
		  break;
		case '010':
			$position=[140,480];
			$size=22;
		  break;
		case '011':
			$position=[210,800];
			$size=18;
			$boder=1;
		  break;
		case '012':
			$position=[285,355];
			$size=12;
			$boder=1;
		  break;
		case '013':
			$position=[255,980];
			$size=16;
			$boder=0;
		  break;
		case '014':
			$position=[325,432];
			$size=10;
			$boder=0;
		  break;
		case '015':
			$position=[235,350];
			$size=15;
		  break;
		case '016':
			$position=[290,300];
			$size=13;
			$boder=0;
		  break;
		}
		//生成二维码图片（倒数第二个参数为二维码大小,最后一个参数为白色边框大小）
        QRcode::png(url('index/qr','id='.$id,'html',true),$file,'L', $size, $boder);
        $font_path = ROOT_PATH.'public/static/font/HYQingKongTiJ.ttf';
		//读取背景图片
        $image = Image::open($this->path.'template/'.$template.'.png');
		//将二维码作为水印，添加到背景图片上
        $image->water($file,$position)->save($file);
		if($wenzi){
			$image->text('扫码向 “'.$name.'” 付款',$font_path,50,'#ffffff',[200-($len-1)*30,60])->save($file);
			$image->text(config('title'),$font_path,60,'#5A91EB',[350,1115])->save($file);
		}		
        return [ 'status' => 0, 'msg' => $file_name];
    }

    /**
     * 二维码展示
     * @return [type] [description]
     */
    public function qr($id){
        $res = Db::name('code')->where('id',$id)->find();
        if (!$res) {
            abort(404,'查找不到商户收款信息');
        }
		//更新次数
        Db::name('code')->where('id',$id)->setInc('number');
        $ua = $_SERVER['HTTP_USER_AGENT'];
		//微信
        if (strpos($ua, 'MicroMessenger')) {
            $this->assign([
                'pay_url' => $res['wechat'],
                'pay_name' => $res['name']
            ]);
            return $this->fetch('wx');
		//支付宝	
        } elseif (strpos($ua, 'AlipayClient')) {
            header('location: ' . $res['alipay']);
            exit();
		//QQ	
        } elseif (strpos($ua, 'QQ/')) {
            $this->assign([
                'pay_url' => urlencode($res['qq']),
                'pay_name' => $res['name']
            ]);
            return $this->fetch('qq');
        } else {
            $this->assign('url',$res['qr']);
            return $this->fetch('qr');
        }
    }
    /*
     * 二维码生成
     */
    public function api($text=''){
        if($text==''){
            return json([ 'status' => 1, 'msg' => '请输入内容']);
        }
        ob_clean();
        QRcode::png($text,false, 'L',5, 2);  
        $content = ob_get_clean();
        return response($content,200,[
            'Content-length'=>strlen($content)
        ])->contentType('image/png');
    }
	/*
     * 赞助开发者
     */
	public function support(){
		 return view();
	}
    /**
     * 生成海报二维码
     */
    public function code($id){
        $res = Db::name('poster')->where('id',$id)->find();
        if (!$res) {
            abort(404,'查找不到二维码信息');
        }
		//更新次数
        Db::name('poster')->where('id',$id)->setInc('count');
        header('location: ' . $res['url']);
        exit();
    }
	/**
     * 生成海报
     */
    public function poster($id){
        $file_name = md5(time()).'.png';
		$dir=$this->uploads .'qr/';
		if(!file_exists($dir)){
			mkdir($dir,0777,true);
		}
        $file = $dir . $file_name;
		//二维码大小
		$size=20;
		//白色边框大小
		$boder=2;
		//二维码位置
		$position=[160,350];
		//生成二维码图片（倒数第二个参数为二维码大小,最后一个参数为白色边框大小）
        QRcode::png(url('index/code','id='.$id,'html',true),$file,'L', $size, $boder);
        $font_path = ROOT_PATH.'public/static/font/HYQingKongTiJ.ttf';
		//读取背景图片
        $image = Image::open($this->path.'template/pdd.png');
		//将二维码作为水印，添加到背景图片上
        $image->water($file,$position)->save($file);		
        return [ 'status' => 0, 'msg' => $file_name];
    }
}
