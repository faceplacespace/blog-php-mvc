<?php

namespace app\models;

use Aura\SqlQuery\QueryFactory;
use PDO;

class BaseModel
{
    
    protected $pdo;
    protected $queryFactory;
    
    public function __construct(PDO $pdo, QueryFactory $queryFactory) 
    {
        $this->pdo = $pdo;
        $this->queryFactory = $queryFactory;
    }
    
    public function getAll($table) 
    {
        
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table);
        
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
        
    }
    
    public function insert($table, $data)
    {
        
        $insert = $this->queryFactory->newInsert();
        $insert
            ->into($table)
            ->cols($data);
        
        $sth = $this->pdo->prepare($insert->getStatement());
        
        return $sth->execute($insert->getBindValues());      
        
    }
    
    public function update($table, $data, $id)
    {
        
        $update = $this->queryFactory->newUpdate();
        
        $update
            ->table($table)
            ->cols($data)
            ->where('id = :id')
            ->bindValue('id', $id);
        
        $sth = $this->pdo->prepare($update->getStatement());
        
        return $sth->execute($update->getBindValues());
        
    }
    
    public function delete($table, $id)
    {
        
        $delete = $this->queryFactory->newDelete();
        
        $delete
            ->from($table)
            ->where('id = :id')
            ->bindValue('id', $id);
        
        $sth = $this->pdo->prepare($delete->getStatement());

        return $sth->execute($delete->getBindValues());
        
    }
    
    public function getOne($table, $id)
    {
        
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table)
            ->where('id = :id')
            ->bindValue('id', $id);
        
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        
        return $result;
        
    }
    
}