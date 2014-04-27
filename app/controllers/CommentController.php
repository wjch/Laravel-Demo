<?php
class CommentController extends BaseController
{

    public function getAll()
    {

        $all_comment = DB::table('comments')->where('title', '!=', '')->paginate(3);
        return View::make('comment.list')->with(array('all_comment' => $all_comment));
    }

    public function getManage()
    {
        Session::put('last_url','/comment/manage');
        if (Sentry::getUser() == null) {
            return Redirect::to('/user/login');
        }
        $user = Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if (!$user->inGroup($admin)) {
            return Redirect::to('/user/login');
        }
        $comments = DB::table('comments')->paginate(10);
        return View::make('comment.manage')->with(array('comments' => $comments));
    }

    public function getShow($id)
    {

        $comment = Comment::find($id);
        $replys = DB::table('comments')->where('reply_to', '=', $id)->get();
        return View::make('comment.view')->with(array('replys' => $replys,
            'comment' => $comment));
    }

    public function getNew()
    {
        Session::put('user_url','/comment/new');
        Session::put('last_url','/comment/new');
        if (Sentry::getUser() == null) {
            return Redirect::to('/user/login');
        }
        return View::make('comment.new');
    }

    public function postStore()
    {
        if (Sentry::getUser() == null) {
            return Redirect::to('/user/login');
        }
        $session_code = Session::get("authcode");
        if(Input::get('authcode')!=$session_code){
            return "验证码不正确";
        }
        $comment = new Comment;
        $comment->title = Input::get('title');
        $comment->content = Input::get('content');
        $replyid = Input::get('replyid');
        $comment->reply_to = $replyid;
        $comment->user_id = Session::get('user')->id;
        $comment->save();
        Return Redirect::action('CommentController@getShow', array($replyid));
    }

    public function getTest()
    {
        return View::make('comment.test');
    }

    public function getDel($id)
    {
        Session::put('user_url','/comment/all');
        if (Sentry::getUser() == null) {
            return Redirect::to('/user/login');
        }
        $user = Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if (!$user->inGroup($admin)) {
            return Redirect::to('/user/login');
        }
        Comment::find($id)->delete();
        return Redirect::action('CommentController@getAll');
    }

    public function getAuthcode() {
        //随机生成一个4位数的数字验证码
        $num="";
        for($i=0;$i<4;$i++){
            $num .= rand(0,9);
        }
        //4位验证码也可以用rand(1000,9999)直接生成
        //将生成的验证码写入session，备验证页面使用
        Session::put("authcode", $num);
        //创建图片，定义颜色值
        Header("Content-type: image/png");
        srand((double)microtime()*1000000);
        $im = imagecreate(60,20);
        $black = ImageColorAllocate($im, 0,0,0);
        $gray = ImageColorAllocate($im, 200,200,200);
        imagefill($im,0,0,$gray);

        //随机绘制两条虚线，起干扰作用
        $style = array($black, $black, $black, $black, $black, $gray, $gray, $gray, $gray, $gray);
        imagesetstyle($im, $style);
        $y1=rand(0,20);
        $y2=rand(0,20);
        $y3=rand(0,20);
        $y4=rand(0,20);
        imageline($im, 0, $y1, 60, $y3, IMG_COLOR_STYLED);
        imageline($im, 0, $y2, 60, $y4, IMG_COLOR_STYLED);

        //在画布上随机生成大量黑点，起干扰作用;
        for($i=0;$i<80;$i++)
        {
            imagesetpixel($im, rand(0,60), rand(0,20), $black);
        }
        //将四个数字随机显示在画布上,字符的水平间距和位置都按一定波动范围随机生成
        $strx=rand(3,8);
        for($i=0;$i<4;$i++){
            $strpos=rand(1,6);
            imagestring($im,5,$strx,$strpos, substr($num,$i,1), $black);
            $strx+=rand(8,12);
        }
        ImagePNG($im);
//        ImagePNG($im,public_path()."/images/authcode.png");
//        ImageDestroy($im);
    }
}