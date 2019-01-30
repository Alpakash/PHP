<?php

class Games
{
  protected $db;

  public function __construct()
  {
    $this->db = Database::instance();
  }

  public function gameData($game_id = int)
  {
    return $this->get('games', array('game_id' => $game_id));
  }
  
  public function get($table, $fields = array())
  {
    $columns = implode(', ', array_keys($fields));
    //SQL query to the DB
    $sql = "SELECT * FROM `{$table}` WHERE `{$columns}` = :{$columns}";
  // Check if the sql is set
    if ($stmt = $this->db->prepare($sql)) {
      foreach ($fields as $key => $value) {
      //bind columns in the select query
        $stmt->bindValue(":{$key}", $value);
      }
      // execute the query
      $stmt->execute();
      // fetch the query and put the rows in an object
      return $stmt->fetch(PDO::FETCH_OBJ);
    }
  }

  // Update the values of the table, enter all fields (keys) and values
  public function update($table, $fields, $condition)
  {
    $columns = '';
    $where = " WHERE ";
    $i = 1;
    // create columns
    foreach ($fields as $name => $value) {
      $columns .= "`{$name}` = :{$name}";
      if ($i < count($fields)) {
        $columns .= ", ";
      }
      $i++;
    }
      // creating a sql query to understand this BS
    $sql = "UPDATE {$table} SET {$columns}";
    // adding where condition to sql query
    foreach ($condition as $name => $value) {
      $sql .= "{$where} `{$name}` = :{$name}";
      $where = " AND ";

    }

    // check if sql query is prepared
    if ($stmt = $this->db->prepare($sql)) {
      foreach ($fields as $key => $value) {
    //bind the columns to sql query
        $stmt->bindValue(":{$key}", $value);
        foreach ($condition as $key => $value) {
        // bind where conditions to sql query
          $stmt->bindValue(":{$key}", $value);
        }
      }
    // execute this fucking shit #!@$
      $stmt->execute();
    }


  }

  // Delete the user by using the $_SESSION. Find username in database and delete from users table
  public function delete($gamename)
  {
    $statement = $this->db->prepare("DELETE FROM games WHERE name = ?");
    $gamename = $gamename;
    $statement->execute(array($gamename));    
  }

  // redirect a user to location that is given in the parameters of the object
  public function redirect($location)
  {
    header("Location: " . $location);
  }

}

?>