<?php 

class Database
{

    public  $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = '')
    {

        try {
            $this->connection = new PDO($config, $username, $password, );
        } catch (PDOException $e) {

            echo "=>" . $e;
            die();
        }
    }

    public function query($query, $params = [])
    {

        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }


}

