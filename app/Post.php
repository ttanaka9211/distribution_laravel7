<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id');
    }

    /**
     * 投稿にいいね！！がついているかの判定.
     *
     * @return bool true:ついている false:ついていない
     */
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $likers = [];
        foreach ($this->likes as $like) {
            array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
