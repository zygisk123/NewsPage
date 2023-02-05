<?php

class Author
{
    public $id;
    public $name;
    public $surname;

    public function __construct($id = null, $name = null, $surname = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
    }

    public static function getAll()
    {
        $authors = [];
        $db = new DB();
        $query = "SELECT `id`, `name`, `surname` FROM `authors`";
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc())
        {
            $authors[] = new Author($row['id'], $row['name'], $row['surname']);
        }
        $db->conn->close();
        return $authors;
    }

    // public static function getAuthor($id)
    // {
    //     $Author = new Author();
    //     $db = new DB();
    //     $query = "SELECT `a`.`id`, `a`.`headline`, `a`.`text`, `a`.`categoryID`, `c`.`category`, `a`.`authorID`, `auth`.`name` FROM `Authors` `a` join `categories` `c` on `c`.`id` = `a`.`categoryID` join `authors` `auth` on `auth`.id = `a`.`authorID` WHERE `a`.`id` = " . $id;
    //     $result = $db->conn->query($query);
    //     while ($row = $result->fetch_assoc())
    //     {
    //         $Author = new Author($row['id'], $row['headline'], $row['text'], $row['categoryID'], $row['category'], $row['authorID'], $row['name']);
    //     }
    //     $db->conn->close();
    //     return $Author;
    // }
}
?>