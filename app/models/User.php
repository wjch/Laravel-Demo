<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements RemindableInterface {

    //UserInterface,
	/**
	 * The database table used by the model.模型所用的数据库表
	 *
	 * @var string
	 */
	protected $table = 'users';

	public function comments()
    {
        return $this->hasMany('Comment');
    }

	//是否自动添加timestamps
	//public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 * 
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *获取用户的唯一标识符
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *获取用户的密码
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}