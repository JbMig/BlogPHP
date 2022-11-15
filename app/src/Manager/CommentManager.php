<?php

namespace App\Manager;

use App\Entity\Comment;

class CommentManager extends BaseManager
{
    /**
     * @return Comment[]
     */
    public function getAllCommentsForAPost($articleId): array
    {
        $query = $this->pdo->query("SELECT * FROM comment WHERE article_id=$articleId");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new Comment($data);
        }

        return $users;
    }
}
