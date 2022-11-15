<?php

namespace App\Entity;

class Comment extends Post
{
    private int $post;				// Will contain the id of the post we're commenting
    private int $parentComment;		// Will contain the id of the comment we're responding to

    /**
     * @return int
     */
    public function getPost(): int
    {
        return $this->post;
    }

    /**
     * @param int $post
     * @return Comment
     */
    public function setPost(int $post): Comment
    {
        $this->post = $post;
        return $this;
    }

    /**
     * @return int
     */
    public function getParentComment(): int
    {
        return $this->parentComment;
    }

    /**
     * @param int $parentComment
     * @return Comment
     */
    public function setParentComment(int $parentComment): Comment
    {
        $this->parentComment = $parentComment;
        return $this;
    }
}
