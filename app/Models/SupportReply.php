<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportReply extends Model
{
    protected $guarded = [];
    public function supportMessage()
    {
        return $this->belongsTo(SupportMessage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
