<?php

namespace App\Repositories;

use App\Model\Comment;
use App\Repositories\Contracts\CommentInterface;
use Illuminate\Support\Facades\Auth;

class CommentRepository extends BaseRepository implements CommentInterface
{
    /**
     * CommentRepository constructor.
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        parent::__construct($comment);
    }

    /**
     * @param $input
     */

    public function CreateComment($input)
    {
        $data = $input->only('film_id', 'description', 'parent');
        $data['user_id'] = Auth::user()->id;
        $this->create($data);
    }
}
