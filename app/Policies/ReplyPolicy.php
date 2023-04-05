<?php

namespace App\Policies;

use App\Models\Reply;
use App\Models\User;

class ReplyPolicy
{
    public function update(User $user, Reply $reply)
    {
        return $user->id === $reply->user_id; // true, false
    }
}
