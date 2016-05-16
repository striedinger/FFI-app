<?php

namespace App\Policies;

use App\User;
 
use App\ProjectComment;

use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectCommentPolicy
{
    use HandlesAuthorization;

    public function destroy($user, $comment){
        return $user->id == $comment->user_id;
    }
}
