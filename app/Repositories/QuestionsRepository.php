<?php
/**
 * YICMS
 * ============================================================================
 * 版权所有 2014-2017 YICMS，并保留所有权利。
 * 网站地址: http://www.yicms.vip
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Created by PhpStorm.
 * Author: kenuo
 * Date: 2017/10/17
 * Time: 下午9:02
 */

namespace App\Repositories;

use Auth;
use App\Models\Question;

class QuestionsRepository
{

    /**
     * @param array $param
     * @return mixed
     */
    public function create(array $param)
    {
        return Question::create($param);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function ByIdWithTopics($id)
    {
        return Question::with('topics')->find($id);
    }

}