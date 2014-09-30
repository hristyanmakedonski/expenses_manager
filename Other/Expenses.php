<?php
require_once '../Models/db.php';
class Expenses{
    public static $db; 
    public static function GetExpensesCategories(){
        self::$db = new Db();
        return self::$db->select('SELECT * FROM expenses_categories');
    }    
}
