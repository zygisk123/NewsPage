<?php
include $_ADMIN_PATH . "/models/Category.php";

class CategoryController 
{
    public static function getAll()
    {
        return Category::getAll();
    }
}
?>