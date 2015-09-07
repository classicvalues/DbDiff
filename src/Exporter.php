<?php

namespace Brzoski;

use Brzoski\Elements\Database as Database;
use Brzoski\Elements\Table as Table;
use Brzoski\Elements\Column as Column;



class Exporter
{

    /*public function getSchema($database)
    {
        $this->pdo = $this->master;

        if($database == 'slave'){
            $this->pdo = $this->slave;
        }

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }*/

    public static function export(\PDO $database, $databaseName)
    {


        try{

            $stmt = $database->query('SHOW TABLES');

            $db = new Database($databaseName);

            foreach($stmt as $k => $v)
            {

                $table = new Table();
                $table->setName($v[0]);

                $query = $database->query('SHOW COLUMNS FROM '.$table->getName());

                $columns = $query->fetchAll(\PDO::FETCH_ASSOC);

                foreach($columns as $c){

                    $column = new Column();
                    $column->setName($c['Field']);
                    $column->setDefault($c['Default']);
                    $column->setExtra($c['Extra']);
                    $column->setKey($c['Key']);
                    $column->setNull($c['Null']);
                    $column->setType($c['Type']);


                    $table->addColumn($column);
                }

                $db->addTable($table);

            }


            $stmt->closeCursor();



        } catch(\PDOException $e){
            echo "Error: ".$e->getMessage();exit;
        }

        return $db;


    }
}