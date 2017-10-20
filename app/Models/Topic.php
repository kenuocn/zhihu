<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['name', 'bio', 'questions_count', 'followers_count'];

    /**
     * 定义问题模型关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions()
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }
}
