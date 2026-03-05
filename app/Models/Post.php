<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Post extends Model
{
    protected $fillable = ["id", "title", "content", "likes", "user_id"];

    private function addLike()
    {
        $this->likes++;
        $this->save();
    }

    private function removeLike()
    {
        $this->likes--;
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
