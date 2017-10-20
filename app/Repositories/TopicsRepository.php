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
 * Date: 2017/10/19
 * Time: 上午8:33
 */

namespace App\Repositories;


use App\Models\Topic;

class TopicsRepository
{

    /**
     * @param array $param
     * @return mixed
     */
    public function create(array $param)
    {
        return Topic::create($param);
    }

    /**
     * @param $param
     * @return mixed
     */
    public function topics($param)
    {
        return Topic::where('name','like','%'.$param.'%')->get();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function ById($id)
    {
        return Topic::find($id);
    }


    /**
     * @param $name
     * @return mixed
     */
    public  function ByName($name)
    {
        return Topic::where('name',$name)->first();
    }
}