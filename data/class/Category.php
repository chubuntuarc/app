<?php
require_once 'data/conection.php';
class Category{
   private $id_category;
   private $name;
   private $photo;
   const Table = 'categories';
//Getters
   public function getId() {
      return $this->id_category;
   }
   public function getName() {
      return $this->name;
   }
   public function getPhoto() {
      return $this->photo;
   }
//Setters
   public function setName($name) {
      $this->name = $name;
   }
   public function setPhoto($photo) {
      $this->photo = $photo;
   } 
//Construct
  public function __construct($name, $photo, $id_category=null) {
      $this->name = $name;
      $this->photo = $photo;
      $this->id_category = $id_category;
   }
//Get all categories
    public static function getAllCategories(){
       $connect = new Connect();
       $query = $connect->prepare('SELECT id_category, name, photo  FROM ' . self::Table );
       $query->execute();
       $response = $query->fetchAll();
       return $response;
    }
}
?>