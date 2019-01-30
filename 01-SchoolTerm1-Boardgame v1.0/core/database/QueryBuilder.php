<?php

/**
 * Created by: Veggiecoder - Akash 2018
 * phpoop
 */

class QueryBuilder
{
    protected $pdo;
    /**
     * @inheritDoc
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table, $intoClass)
    {
        /**
         * @var $statement all data for given table
         * @var $intoClass define class for output
         */
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, $intoClass);

    }

    
    public function countTotalPlayers()
    {
        // Count all players in the users table
        $sql = "SELECT count(*) FROM `users`";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        // store the number of rows in a variable
        $number_of_rows = $result->fetchColumn(); 
        return $number_of_rows;
    }

    public function checkUsername($username)
    {
        /**
         * @var $statement all data for given table
         * @var $intoClass define class for output
         */
        $statement = $this->pdo->prepare("SELECT COUNT(username) AS num FROM username WHERE username = $username");

            //Bind the provided username to our prepared statement.
        $statement->bindValue(':username', $username);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // all the given parameters (name, username, email) will be put into the table
    public function insert($table, $parameters)
    {
        // create a query and bind the parameters
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table, 
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        // try to prepare and execute the sql query
        try {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($parameters);
        } catch (Exception $e) {
            echo "Whoops, something went wrong.";
        }
    }


}