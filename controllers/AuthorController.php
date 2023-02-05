<?php
include $_ADMIN_PATH . "/models/Author.php";

class AuthorController 
{
    public static function getAll()
    {
        return Author::getAll();
    }
}
?>