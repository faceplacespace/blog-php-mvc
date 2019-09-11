<?php

namespace app\models;

use PDO;

class Comment extends BaseModel
{
    
    public function getAll($postId) 
    {
        
        $select = $this->queryFactory->newSelect();
        $select->cols(['c.id,DATE_FORMAT(c.creation_date, \'%M, %w, %Y at %l:%i %p\')AS creation_date, c.text, u.username, u.avatar'])
            ->from('comment AS c')
             ->join(
                'INNER',
                'users AS u',
                'c.author_id = u.id'
            )
            ->where('c.post_id = :postId')
            ->bindValue('postId', $postId);
        
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
        
    }
    
}