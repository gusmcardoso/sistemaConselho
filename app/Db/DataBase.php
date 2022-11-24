<?php
namespace App\Db;
use PDO;
use PDOException;

class DataBase{
    const HOST = '192.168.102.77';
    const DBNAME = 'ifto';
    const USER = 'dba';
    const PASS = '123';
    
    private $table;
    private $connection;
    
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    public function execute($query, $params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    public function insert($values){
        $fields = array_keys($values);
        $binds = array_pad([], count($fields),'?');

        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
        
        $this->execute($query, array_values($values));
        return $this->connection->lastInsertId();

    }

    public function update($where, $values){
        $fields = array_keys($values);
       
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
        $this->execute($query, array_values($values));
        return true;

    }

    public function delete($where){
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        $this->execute($query);
        return true;
    }

    public function select($where = null, $order = null, $limit=null, $fields = '*'){
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : ''; 

        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
       /* 
        echo "<pre>";
        print_r($query);
        echo "</pre>";
         */    
        return $this->execute($query);
    }

    public function select2($tabela2, $chave1, $chave2, $where = null, $order = null, $limit=null, $fields = '*', $fields2 = 'tipo_ocorrencia'){
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : ''; 

        $query = 'SELECT '.$this->table.'.'.$fields.','.$tabela2.'.'.$fields2.' as tp FROM '.$this->table.' INNER JOIN '.$tabela2.' ON '.$this->table.'.'.$chave1.' = '.$tabela2.'.'.$chave2.' '.$where.' '.$order.' '.$limit;
        
        echo "<pre>";
        print_r($query);
        echo "</pre>";
              
        
        return $this->execute($query);
    }
    
}