<?php

class ArticleController extends \BaseController {


	function _construct(){
		$this->filter('before','auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        Session::put('last_url','/article');
        if(Sentry::getUser()==null){
            return Redirect::to('/user/login');
        }
        $user=Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if(!$user->inGroup($admin)){
            return Redirect::to('/user/login');
        }
		$all_article =DB::table('articles')->paginate(3);

		return View::make('article.index')->with('aa',$all_article);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        if(Sentry::getUser()==null){
            return Redirect::to('/user/login');
        }
        $user=Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if(!$user->inGroup($admin)){
            return Redirect::to('/user/login');
        }
		return View::make('article.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        if(Sentry::getUser()==null){
            return Redirect::to('/user/login');
        }
        $user=Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if(!$user->inGroup($admin)){
            return Redirect::to('/user/login');
        }
		$new_article = new Article;
		$new_article->title=Input::get('title');
		$content=Input::get('content');
		$new_article->content=$content;
        $the_user=Sentry::getUser();
		$new_article->author=$the_user->first_name.$the_user->last_name;
		$new_article->type=1;
		$new_article->summary = Input::get('summary');
		$new_article->save();

		return Redirect::action("ArticleController@index")->with(array('message'=>"文章已经添加"));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$article = Article::find($id);

		return View::make('article.one')->with('article',$article);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        if(Sentry::getUser()==null){
            return Redirect::to('/user/login');
        }
        $user=Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if(!$user->inGroup($admin)){
            return Redirect::to('/user/login');
        }
		$article = Article::find($id);
		return View::make('article.edit')->with(array('article'=>$article,'id'=>$id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        if(Sentry::getUser()==null){
            return Redirect::to('/user/login');
        }
        $user=Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if(!$user->inGroup($admin)){
            return Redirect::to('/user/login');
        }
		$article = Article::find($id);
		$article->title= Input::get('title');
		$article->content=Input::get('content');
        $article->summary=Input::get('summary');
        $the_user=Sentry::getUser();
        $article->author=$the_user->first_name.$the_user->last_name;
		$article->save();
		return Redirect::action("ArticleController@index")->with(array('message'=>"文章已经更新"));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function destroy($id)
	// {

	// }

}