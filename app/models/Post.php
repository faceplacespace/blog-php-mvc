<?php

namespace app\models;

use PDO;

class Post extends BaseModel
{
    
    const ITEMS_PER_PAGE = 5;
    
    public function getPostsByPage($page)
    {
        
        $select = $this->queryFactory->newSelect();
        $select->cols(['p.id, DATE_FORMAT(p.creation_date, \'%M %w, %Y\') AS creation_date, '
            . 'p.title, p.content, p.photo, c.title AS category, u.username AS author'])
            ->from('post AS p')
            ->join(
                'INNER',
                'users AS u',
                'p.author_id = u.id'
            )
            ->join(
                'INNER',
                'category AS c',
                'p.category_id = c.id'
            )
            ->setPaging(self::ITEMS_PER_PAGE)
            ->page($page);
        
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
        
    }
    
    public function getAllPosts() {
        
        $select = $this->queryFactory->newSelect();
        $select->cols(['p.id, DATE_FORMAT(p.creation_date, \'%M %w, %Y\') AS creation_date, '
            . 'p.title, p.content, p.photo, c.title AS category, u.username AS author'])
            ->from('post AS p')
            ->join(
                'INNER',
                'users AS u',
                'p.author_id = u.id'
            )
            ->join(
                'INNER',
                'category AS c',
                'p.category_id = c.id'
            );
        
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
        
    }

    public function getOnePost($id) 
    {
        
        $select = $this->queryFactory->newSelect();
        $select->cols(['p.id, DATE_FORMAT(p.creation_date, \'%M %w, %Y\') AS creation_date, '
            . 'p.title, p.content, p.photo, c.title AS category, u.username AS author'])
            ->from('post AS p')
            ->join(
                'INNER',
                'users AS u',
                'p.author_id = u.id'
            )
            ->join(
                'INNER',
                'category AS c',
                'p.category_id = c.id'
            )
            ->where('p.id = :id')
            ->bindValue('id', $id);
        
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        
        return $result;
        
    }
    
    public function getNext($id)
    {
        
        $subSelect = $this->queryFactory->newSelect();
        $subSelect->cols(['min(id)'])
            ->from('post')
            ->where('id > :id');
        
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from('post')
            ->where('id = ('.$subSelect->__toString().')')
            ->bindValue('id', $id);
        
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        
        return $result;
        
    }
    
    public function getPrev($id)
    {
        
        $subSelect = $this->queryFactory->newSelect();
        $subSelect->cols(['max(id)'])
            ->from('post')
            ->where('id < :id');
        
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from('post')
            ->where('id = ('.$subSelect->__toString().')')
            ->bindValue('id', $id);
        
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        
        return $result;
        
    }
    
    public function getLatest($limit)
    {
        
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from('post')
            ->orderBy(['creation_date DESC'])
            ->limit($limit);
        
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
        
    }
    
    public function getPopular($limit)
    {
        
        $select = $this->queryFactory->newSelect();
        $select->cols(['id, title, photo, DATE_FORMAT(creation_date, \'%M %w, %Y\') AS creation_date'])
            ->from('post')
            ->orderBy(['views DESC'])
            ->limit($limit);
        
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
        
    }
    
    public function getPostsByCategory($categoryId)
    {
        
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from('post')
            ->where('category_id = :categoryId')
            ->bindValue('categoryId', $categoryId);
        
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
        
    }
    
    public function getPostsCount()
    {
        
        $select = $this->queryFactory->newSelect();
        $select->cols(['COUNT(*) AS count'])
            ->from('post');
        
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        
        $result = $sth->fetchColumn();
        
        return $result;
        
    }
    
    public function getImage($id)
    {
        
        $select = $this->queryFactory->newSelect();
        $select->cols(['photo'])
            ->from('post')
            ->where('id = :id')
            ->bindValue('id', $id);
        
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        
        $result = $sth->fetchColumn();
        
        return $result;
        
    }
    
}