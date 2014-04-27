<?php

class VideoController extends BaseController {
	public function getManage(){
        if (Sentry::getUser() == null) {
            return Redirect::to('/user/login');
        }
        $user = Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if (!$user->inGroup($admin)) {
            return Redirect::to('/user/login');
        }
		$videos=Video::orderBy('id')->paginate(2);
		return View::make('video.list')->with(array('videos'=>$videos));
	}
    public function getAll(){
        $videos = DB::table('videos')->paginate(3);
        return View::make('video.gallery')->with(array('videos'=>$videos));
    }
	public function getPlay($id){
		$video = Video::find($id);
		$path =$video->vpath;
		$play_url = base_path().'/uploaded/'.trim($path);
		return View::make('video.play')->with(array('video'=>$video,'play_url'=>$play_url));
	}
	public function getFi()
	{
        Session::put('last_url','/video/fi');
        if(Sentry::getUser()==null){
            return Redirect::to('/user/login');
        }
        $user=Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if(!$user->inGroup($admin)){
            return Redirect::to('/user/login');
        }
		return View::make('video.add');
	}
	public function postUpload()
	{
        if(Sentry::getUser()==null){
            return Redirect::to('/user/login');
        }
        $user=Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if(!$user->inGroup($admin)){
            return Redirect::to('/user/login');
        }
		// 			$name=iconv("UTF-8","GBK",$file['name']);
		// 		if(true==move_uploaded_file($file['tmp_name'],$fpath.$name)){
		// 			$success='Success!地址为:'.$fpath.iconv("GBK","UTF-8",$name
		$up_info=$_FILES['filen'];
		$max=0;//文件总大小
		for($i=0;$i<count($up_info['name']);$i++)
		{
			if($up_info['type']="video/mpeg" ||$up_info['type']="video/quicktime" || $up_info['type']="video/mp4"){
				$filename=trim($up_info['name'][$i]);
				$tmp_name=trim($up_info['tmp_name'][$i]);
				$tmp_size=$up_info['size'][$i];
				$fpath=trim('');
				if($up_info['error'][$i]==0 || $up_info['error'][$i]==7){
					if(is_uploaded_file($tmp_name)){
						$name=iconv("UTF-8","GBK",$filename);
						$allpath=$fpath.$name;
						move_uploaded_file($tmp_name,$allpath);
						$video = new Video;
						$video->vname= $filename;
						$video->vpath=$filename;
						$video->addauthor="admin";
						$video->filetype="mp4";
						$video->save();	
					}
				}

				$videos=Video::all();
				return View::make('video.list')->with(array('videos'=>$videos));
			}else{
				return  Redirect::to('video/fi')->with('info',"不能上传未允许的文件");
			}
		}
	}
	public function getDel($id){
        if(Sentry::getUser()==null){
            return Redirect::to('/user/login');
        }
        $user=Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if(!$user->inGroup($admin)){
            return Redirect::to('/user/login');
        }
		Video::find($id)->delete();
		return Redirect::action("VideoController@getAll");
	}

}