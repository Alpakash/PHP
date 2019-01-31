<?php

namespace App\Models;

use App\Application;

Class Image
{
    protected $app;
    protected $pdo;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->pdo = $app->get('conn');
    }

    public function insertImage()
    {
        $errors = [];
        $image = $_FILES['image']['name'];
        $text = $_POST['text'];


        /** Move image into the folder images */

        $target = __DIR__ . "/../../public/uploads/" .basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target))
        {
            echo "<center><span style='color: limegreen'><h1>" ."Het bestand is succesvol geupload! Binnen enkele seconden wordt u doorverwezen." . "</h1></span></center>";
            header("refresh:3;url=./fotos");
        }

        elseif(empty($image))
        {
            // If there is no file selected, display error and die
            array_push($errors, "Selecteer een bestand!" );
            foreach($errors as $error)
            {
                echo "<span style='color: red'><h1>" .$error . "</h1></span>";
                header("refresh:3;url=./uploaden");
            }
            die;
        }


        else
        {
            // If the file is too big to be uploaded to the images folder, display error and die
            array_push($errors, "Het bestand is te groot, upload een kleiner bestand!" );
            foreach($errors as $error)
            {
                echo "<span style='color: red'><h1>" . $error . "</h1></span>";
                header("refresh:3;url=./uploaden");
            }
            die;
        }

        /** If there are no errors, upload file into the database */
        if (count($errors) == 0)
        {
            $query = "INSERT INTO images (image,text) VALUES (:image,:text)";
            $statement = $this->pdo->prepare($query);
            $statement->execute(array(
                ":image" => $image,
                ":text" => $text
            ));
        }
    }

    /** Display image in  photo album */
    public function getImages()
    {
        $query = "SELECT image, text FROM images ORDER BY id DESC";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $images = $statement->fetchAll();
        return $images;
    }

}