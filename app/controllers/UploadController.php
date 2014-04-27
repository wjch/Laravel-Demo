<?php

class UploadController extends BaseController
{

    public function getAll()
    {
        $docs = DB::table('uploads')->paginate(5);
        return View::make('file.gallery')->with(array('docs' => $docs));
    }

    public function getShow($id)
    {
        $doc = Upload::find($id);
        return View::make('file.download')->with(array('doc' => $doc));
    }

    public function getDownload($id)
    {
        $fpath = Upload::find($id)->fpath;
        return Response::download($fpath);
//        return View::make('file.download')->with(array('doc' => $doc));
    }

    public function getFi()
    {
        Session::put('last_url', '/upload/fi');
        if (Sentry::getUser() == null) {
            return Redirect::to('/user/login');
        }
        $user = Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if (!$user->inGroup($admin)) {
            return Redirect::to('/user/login');
        }
        return View::make('file.upload');
    }

    public function postUpload()
    {
        if (Sentry::getUser() == null) {
            return Redirect::to('/user/login');
        }
        $user = Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if (!$user->inGroup($admin)) {
            return Redirect::to('/user/login');
        }
        // 			$name=iconv("UTF-8","GBK",$file['name']);
        // 		if(true==move_uploaded_file($file['tmp_name'],$fpath.$name)){
        // 			$success='Success!地址为:'.$fpath.iconv("GBK","UTF-8",$name
        $up_info = $_FILES['filen'];
        $max = 0; //文件总大小
        for ($i = 0; $i < count($up_info['name']); $i++) {
            if ($up_info['type'] = "application/vnd.ms-powerpoint" || $up_info['type'] = "application/msword" ||
                    $up_info['type'] = "application/zip" || $up_info['type'] = "application/x-gzip") {
                $filename = trim($up_info['name'][$i]);
                $tmp_name = trim($up_info['tmp_name'][$i]);
                $tmp_size = $up_info['size'][$i];
                $fpath = trim(base_path() . '/uploaded/');
                if ($up_info['error'][$i] == 0 || $up_info['error'][$i] == 7) {
                    if (is_uploaded_file($tmp_name)) {
//                        $name = iconv("UTF-8", "GBK", $filename);
                        $ext=  substr($filename, strrpos($filename, '.')+1);
                        $uid=uniqid('file_');
                        $allpath = $fpath.$uid.'.'.$ext;
                        move_uploaded_file($tmp_name, $allpath);
                        $af = new Upload;
                        $af->fname = $filename;
                        $af->fpath = $allpath;
                        $af->addauthor = 'admin';
                        $af->filetype = '文档';
                        $af->uid=uniqid('file_');
                        $af->save();
                    }
                }else{
                    return View::make('file.show')->with(array('info' => "上传了不允许的文件"));
                }


            } else {
                return View::make('file.show')->with(array('info' => "上传了不允许的文件"));
            }
        }
        return View::make('file.show')->with(array('info' => $up_info));
    }

}