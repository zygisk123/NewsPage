<?php

class Category
{
    public $id;
    public $category;

    public function __construct($id = null, $category = null)
    {
        $this->id = $id;
        $this->category = $category;
    }

    public static function getAll()
    {
        $categories = [];
        $db = new DB();
        $query = "SELECT `id`, `category` FROM `categories`";
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc())
        {
            $categories[] = new Category($row['id'], $row['category']);
        }
        $db->conn->close();
        return $categories;
    }

    // public static function getcategory($id)
    // {
    //     $category = new category();
    //     $db = new DB();
    //     $query = "SELECT `a`.`id`, `a`.`headline`, `a`.`text`, `a`.`categoryID`, `c`.`category`, `a`.`categoryID`, `auth`.`name` FROM `categorys` `a` join `categories` `c` on `c`.`id` = `a`.`categoryID` join `categorys` `auth` on `auth`.id = `a`.`categoryID` WHERE `a`.`id` = " . $id;
    //     $result = $db->conn->query($query);
    //     while ($row = $result->fetch_assoc())
    //     {
    //         $category = new category($row['id'], $row['headline'], $row['text'], $row['categoryID'], $row['category'], $row['categoryID'], $row['name']);
    //     }
    //     $db->conn->close();
    //     return $category;
    // }
}
?>