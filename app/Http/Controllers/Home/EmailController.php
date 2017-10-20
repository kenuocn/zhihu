<?php

namespace App\Http\Controllers\Home;

use Auth;
use App\Service\UsersService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    protected $usersService;

    /**
     * EmailController constructor.
     * @param $userService
     */
    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
    }

    public function verify($token)
    {
        $user = $this->usersService->ByconfirmationToken($token);

        if (is_null($user)) {
            flash('邮箱验证失败!')->error()->important();

            return redirect('/');
        }

        $user->update([
            'is_active'          => 1,
            'confirmation_token' => str_random(40),
        ]);

        flash('邮箱验证成功!')->success()->important();

        //登录用户
        Auth::login($user);

        return redirect('/user');

    }
}
