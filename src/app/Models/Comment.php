<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'user_id',
        'comment',
    ];

    // リレーション：このコメントが属する商品
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // リレーション：このコメントを書いたユーザー
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
