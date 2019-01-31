<?php

namespace App\Models;

use App\Services\Mail\Mail;

class User extends Model
{
	protected $table = 'user';

	public function getUser()
	{
		$query = $this->query_builder
			->select('*')
			->from($this->table)
			->where('id = :id')
			->setParameter('id', $_SESSION['user_id'])
			->execute();

		return $query->fetch(\PDO::FETCH_OBJ);
	}

	public function getVerifyUser(string $hash)
	{
		$query = $this->query_builder
			->select("*")
			->from($this->table)
			->where('hash = :hash')
			->setParameter('hash', $hash)
			->execute();

		return $query->fetch(\PDO::FETCH_OBJ);
	}

	public function verifyUser(int $user_id)
	{
		$query = $this->query_builder
			->update($this->table)
			->where('id = :user_id')
			->set('is_verified', true)
			->setParameter('user_id', $user_id)
			->execute();

		return;
	}

    public function getUsers()
    {
        $result = $this->connection->prepare("SELECT *, u.id AS user_id FROM user u LEFT JOIN user_has_role uhr ON uhr.user_id = u.id LEFT JOIN user_role ur ON ur.id = uhr.user_role_id");
        $result->execute();
        return $result->fetchAll();
    }

    public function get($table, $fields = array())
    {
        $columns = implode(', ', array_keys($fields));
        //SQL query to the DB
        $sql = $this->connection->prepare("SELECT * FROM `{$table}` WHERE `{$columns}` = :{$columns}");
        // Check if the sql is set
        if ($stmt = $sql) {
            foreach ($fields as $key => $value) {
                //bind columns in the select query
                $stmt->bindValue(":{$key}", $value);
            }
            // execute the query
            $stmt->execute();
            // fetch the query and put the rows in an object
            return $stmt->fetchAll();
        }
    }

    public function getOuders()
    {
      $result = $this->connection->prepare("SELECT *, u.id AS user_id FROM user u LEFT JOIN user_has_role uhr ON uhr.user_id = u.id LEFT JOIN user_role ur ON ur.id = uhr.user_role_id WHERE name = 'Ouder'");
      $result->execute();
      return $result->fetchAll();
    }

    public function getPlayers()
    {
        $result = $this->connection->prepare("SELECT *, u.id AS user_id FROM user u JOIN user_has_role uhr ON uhr.user_id = u.id JOIN user_role ur ON ur.id = uhr.user_role_id WHERE name = 'Player'");
        $result->execute();
        return $result->fetchAll();
    }

    public function getTrainers()
    {
        $result = $this->connection->prepare("SELECT *, u.id AS user_id FROM user u JOIN user_has_role uhr ON uhr.user_id = u.id JOIN user_role ur ON ur.id = uhr.user_role_id WHERE name = 'Trainer'");
        $result->execute();
        return $result->fetchAll();
    }

    public function checkLogin($email, $password)
    {
	    $query = $this->query_builder
		    ->select('*')
		    ->from($this->table)
		    ->where('email = :email')->andWhere('password = :password')
		    ->setParameter('email', $email)
		    ->setParameter('password', $password)
		    ->execute();
	    // insert method to insert values in db
    }

    public function insert($table, $fields = array())
    {
        $columns = implode(", ", array_keys($fields));
        $values = ":".implode(", :", array_keys($fields));
        // sql query
        $sql = $this->connection->prepare("INSERT INTO {$table} ({$columns}) VALUES ({$values})");
        // check if sql is prepared
        if ($stmt = $sql) {
            // bind values to placeholders
            foreach ($fields as $key => $value) {
                $stmt->bindValue(":{$key}", $value);
            }
            // execute the query
            $stmt->execute();
            // return user_id
            return $this->connection->lastInsertId();
        }

        return $query->fetch();
    }

	public function role()
	{
//		$_SESSION['user_id'] = 1;
        if (isset($_SESSION['user_id'])) {
            $result = $this->connection->prepare("SELECT ur.name FROM `user_has_role` uhr 
                                              JOIN user_role ur ON ur.id = uhr.user_role_id WHERE uhr.user_id = :user_id");
            $result->execute(['user_id' => $_SESSION['user_id']]);
            return $result->fetch();
        }
        return false;
	}

	public function getRoleName()
	{
		return $this->role()['name'];
	}

	public function isAdmin() {
	    $roles = $this->role();
	    if (in_array("Admin", $roles)) {
               return True;
	    }
        return false;
    }

    public function isTrainer() {
        $roles = $this->role();
        if (in_array("Trainer", $roles)) {
            return True;
        }
        return false;
    }

    public function isPlayer() {
        $roles = $this->role();
        if (in_array("Player", $roles)) {
            return True;
        }
        return false;
    }

    public function isOuder() {
        $roles = $this->role();
        if (in_array("Ouder", $roles)) {
            return True;
        }
        return false;
    }

    public function getAllUsers($user_id = int)
    {
        $query = $this->query_builder
            ->select('*')
            ->from($this->table)
            ->where("id = $user_id")
            ->execute();

        return $query->fetchAll();

    }

    // hash password to verify with input password - $password
    public function hash($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function userRegister($errors = [])
    {
        if ($this->isLoggedIn()) {
            $this->redirect('home');
        }

        if (isset($_POST['register'])) {
            $required = array('firstName', 'lastName', 'email', 'birth', 'gender', 'password', 'passwordAgain');
            foreach ($_POST as $key => $value) {
                if (empty($value) && in_array($key, $required) === true) {
                    if (!empty($errors)) {
                        $error['allFields'] = 'All fields are required.';
                    }
                    break;
                }
            }

            if (empty($error['allFields'])) {
                // validate form
                $firstName = Validate::escape(ucfirst($_POST['firstName']));
                $lastName = Validate::escape(ucfirst($_POST['lastName']));
                $email = Validate::escape(ucfirst($_POST['email']));
                $date_birth = $_POST['birth'];
                $gender = $_POST['gender'];
                $password = $_POST['password'];
                $rePassword = $_POST['passwordAgain'];


                if (Validate::length($firstName, 2, 20)) {
                    if (!empty($errors)) {
                        $error = "De voornaam kan alleen tussen de 2 en 20 letters zijn";
                        return $error;
                    }
                } else if (Validate::length($lastName, 2, 20)) {
                    if (!empty($errors)) {
                        $error = "De achternaam kan alleen tussen de 2 en 20 letters zijn";
                        return $error;
                    }
                } else if (!Validate::filterEmail($email)) {
                    if (!empty($errors)) {
                        $error = "Het ingevulde email is niet geldig";
                        return $error;
                    }
                } else if ($this->emailExist($email)) {
                    if (!empty($errors)) {
                        $error = 'Het emailadres bestaat al in het systeem';
                        return $error;
                    }
                } else if ($password != $rePassword) {
                    if (!empty($errors)) {
                        $error = "De wachtwoorden zijn niet gelijk";
                        return $error;
                    }
                } else {

                    $hash = $this->hash($password);
                    // method to insert a user (create)
                    $user_id = $this->insert("user", array(
                        "first_name" => $firstName,
                        "last_name" => $lastName,
                        "email" => $email,
                        "password" => $hash,
	                    "hash" => sha1(mt_rand(1, 90000) . 'SALT'),
                        "is_verified" => 0,
                        "gender" => $gender,
                        "date_birth" => $date_birth,
	                    "created_at" => date("Y-m-d h:i:s")
                    ));

//                    $user = $this->getAllUsers($user_id);
//
//                    /** @var Mail $mail */
//                    $mail = $this->app->get('mail');
//
//                    /** @var \Twig_Environment $content */
//                    $content = $this->app->get('view');
//
//                    $result = $content->render('email/activate-account.twig', ['user' => $user]);
//
//                    $mail->to($email, "{$firstName} {$lastName}")
//	                    ->subject("Bedankt voor het registreren")
//	                    ->content($result)
//	                    ->send();

                    $this->redirect('login');
                }
            }
        }
    }


	public function userLogin($errors = []) {

	    if ($this->isLoggedIn()) {
	        $this->redirect('home');
	    }


	    if (isset($_POST['login'])) {
	        $email = Validate::escape(ucfirst($_POST['email']));
	        $password = Validate::escape($_POST['password']);

	        if (empty($email) or empty($password)) {
	            if (!empty($errors)) {
	                $error = "Vul een email en wachtwoord in om in te loggen.";
	                return $error;
	            }
	        } else {
	            // check in the database with the Users->method if the email or username that the user did input in the $_POST['email'] exists in the database
	            if ($users = $this->emailExist($email)) {
	                // store the hashed password in db in $hash
	                foreach ($users as $user) {
	                    $hash = $user['password'];
	            }
	                // if the given password matches with the hashed password in DB then redirect to players (logged in) page
	                if (password_verify($password, $hash)) {
	                    foreach($users as $user) {
	                    $_SESSION['user_id'] = $user['id'];
	                    }

	                    $this->redirect('home');
	                } else {
	                    if (!empty($errors)) {
	                        $error = "Het email of wachtwoord is niet juist!";
	                        return $error;
	                    }
	                }

	            } else {
	                if (!empty($errors)) {
	                    $error = "Er is geen account gekoppeld aan het ingevulde email.";
	                    return $error;
	                }
	            }
	        }

	    }
	}

    // Check if the email exists in the users table
    public function emailExist($email)
    {
        $email = $this->get('user', array('email' => $email));
        return ((!empty($email))) ? $email : false;
    }

    // remove all stored data, log user out and redirect to '/'
    public function logout()
    {
        $_SESSION = array();
        session_destroy();
        $this->redirect('/AS80/');
    }

    // redirect a user to location that is given in the parameters of the object
    public function redirect($location)
    {
        header("Location: " . $location);
    }

    // check if the user_id session exists, if yes then return true
	public function isLoggedIn()
	{
		return isset($_SESSION['user_id']) ? true : false;
	}

}