<?php

class Users
{
  protected $db;

  public function __construct()
  {
    $this->db = Database::instance();
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



  // insert method to insert values in db
  public function insert($table, $fields = array()) 
  {
    // This is an alternative way for the insert
    // $sql_alternative = printf("INSERT INTO %s (%s) VALUES %s",
    // "$table", "$columns", "$values");

    $columns = implode(", ", array_keys($fields));
    $values = ":".implode(", :", array_keys($fields));
    // sql query
  $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
  // check if sql is prepared
  if ($stmt = $this->db->prepare($sql)) {
  // bind values to placeholders
    foreach ($fields as $key => $value) {
      $stmt->bindValue(":{$key}", $value);
    }
    // execute the query
      $stmt->execute();
      // return user_id
     return $this->db->lastInsertId();
    }    

  }

  // Check if the email exists in the users table
  public function emailExist($email)
  {
    $email = $this->get('users', array('email' => $email));
    return ((!empty($email))) ? $email : false;
  }

  // Check if the username exists in the users table
  public function usernameExist($username)
  {
    $username = $this->get('users', array('username' => $username));
    return ((!empty($username))) ? $username : false;
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
  public function delete($username)
  {
    $statement = $this->db->prepare("DELETE FROM users WHERE username = ?");
    $username = $username;
    $statement->execute(array($username));

    // Delete all the stored information
    $_SESSION = array();
    // log user out
    session_destroy();
    // redirect user to 'home' route. if _GET['deleted'] == 1 then show succesfull deleted message
    Header('Location: home?deleted=1');
    
  }

  // hash password to verify with input password - $password
  public function hash($password)
  {
    return password_hash($password, PASSWORD_BCRYPT);
  }

  // redirect a user to location that is given in the parameters of the object
  public function redirect($location)
  {
    header("Location: " . $location);
  }

  // select a user based on id and make it possible to select all of it's rows
  // example $user = $userObj->userData($user_id) and then get data with $user->firstName
  public function userData($user_id = int)
  {
    return $this->get('users', array('user_id' => $user_id));
  }


  // remove all stored data, log user out and redirect to 'home'
  public function logout()
  {
    $_SESSION = array();
    session_destroy();
    $this->redirect('home');
  }

  // check if the user_id session exists, if yes then true
  public function isLoggedIn()
  {
    return ((isset($_SESSION['user_id']))) ? true : false;
  }
}

?>