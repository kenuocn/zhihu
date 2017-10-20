<?php

namespace App;

use Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Naux\Mail\SendCloudTemplate;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar' , 'confirmation_token' , 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'confirmation_token'
    ];


    public function sendPasswordResetNotification($token)
    {
        // 模板变量
        $data = ['url'  => route('password.reset',$token)];

        $template = new SendCloudTemplate('zhihu_app_reset', $data);

        Mail::raw($template, function ($message)
        {
            $message->from('1402992668@qq.com', 'zhihu');
            $message->to($this->email);
        });
    }
}
