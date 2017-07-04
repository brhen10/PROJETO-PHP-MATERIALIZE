<?php





class Banco {

    private static $connection;
    private $debug;
    private $server;
    private $user;
    private $password;
    private $database;

    public function __construct() {
        $this->debug = true;
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "root";
        $this->database = "modelosql"; 
    }

   //Criar uma conexão de banco de dados ou retornar a ligação já está aberto usando Singleton
    
    public function getConnection() {
        try {
            if (self::$connection == null) {
                self::$connection = new PDO("mysql:host={$this->server};dbname={$this->database};charset=utf8", $this->user, $this->password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                self::$connection->setAttribute(PDO::ATTR_PERSISTENT, true);
            }
            return self::$connection;
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "<b>Error on getConnection(): </b>" . $ex->getMessage() . "<br/>";
            }
            die();
            return null;
        }
    }

    public function Disconnect() {
        $this->Connection = null;
    }

    //Retornar o último ID de instrução de inserção
    
    public function GetLastID() {
        return $this->getConnection()->lastInsertId();
    }

    //Iniciar uma transação de banco de dados
    
    public function BeginTransaction() {
        return $this->getConnection()->beginTransaction();
    }

    //Confirmar as alterações na transação aberta
    
    public function Commit() {
        return $this->getConnection()->commit();
    }

    //Reverter alterações em transação aberta
    public function Rollback() {
        return $this->getConnection()->rollBack();
    }

  // Retorna o resultado de uma consulta (selecionar)
    public function ExecuteQueryOneRow($sql, $params = null) {
        try {
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "<b>Error on ExecuteQueryOneRow():</b> " . $ex->getMessage() . "<br />";
                echo "<br /><b>SQL: </b>" . $sql . "<br />";

                echo "<br /><b>Parameters: </b>";
                print_r($params) . "<br />";
            }
            die();
            return null;
        }
    }

    
     // retorna o resultado de uma consulta (selecione)
     
    public function ExecuteQuery($sql, $params = null) {
        try {
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "<b>Error on ExecuteQuery():</b> " . $ex->getMessage() . "<br />";
                echo "<br /><b>SQL: </b>" . $sql . "<br />";

                echo "<br /><b>Parameters: </b>";
                print_r($params) . "<br />";
            }
            die();
            return null;
        }
    }

    //retorna se a consulta foi bem-sucedida
    
    public function ExecuteNonQuery($sql, $params = null) {
        try {
            $stmt = $this->getConnection()->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "<b>Error on ExecuteNonQuery():</b> " . $ex->getMessage() . "<br />";
                echo "<br /><b>SQL: </b>" . $sql . "<br />";

                echo "<br /><b>Parameters: </b>";
                print_r($params) . "<br />";
            }
            die();
            return false;
        }
    }

}
