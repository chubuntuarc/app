<?php
 require_once 'data/conection.php';
 class User {
   private $id_user;
   private $username;
   private $first_name;
   private $second_name;
   const Table = 'users_list';
   //Getters
   public function getId() {
      return $this->id_user;
   }
   public function getUserName() {
      return $this->username;
   }
   public function getFirstName() {
      return $this->first_name;
   }
   public function getSecondName() {
      return $this->second_name;
   }
   //Setters
   public function setUserName($username) {
      $this->username = $username;
   }
   public function setFirstName($first_name) {
      $this->first_name = $first_name;
   } 
   public function setSecondName($second_name) {
      $this->second_name = $second_name;
   }
   public function __construct($username, $first_name, $second_name=null, $id_user=null) {
      $this->username = $username;
      $this->first_name = $first_name;
      $this->second_name = $second_name;
      $this->id_user = $id_user;
   }
   //Functions
   public function save(){
      $connect = new Connect();
      if($this->id_user) /*Update*/ {
         $query = $connect->prepare('UPDATE ' . self::Table .' SET username = :username, first_name = :first_name, second_name = :second_name WHERE id_client = :id_user');
         $query->bindParam(':username', $this->username);
         $query->bindParam(':first_name', $this->first_name);
         $query->bindParam(':second_name', $this->second_name);
         $query->bindParam(':id_user', $this->id_user);
         $query->execute();
      }else /*Insert*/ {
         $query = $connect->prepare('INSERT INTO ' . self::Table .' (username, first_name, second_name) VALUES(:username, :first_name, :second_name)');
         $query->bindParam(':username', $this->username);
         $query->bindParam(':first_name', $this->first_name);
         $query->bindParam(':second_name', $this->second_name);
         $query->execute();
         $this->id_user = $connect->lastInsertId();
      }
      $connect = null;
   }
   
 //Search user by ID
   public static function searchById($id_user){
       $connect = new Connect();
       $query = $connect->prepare('SELECT username, first_name, second_name FROM ' . self::Table . ' WHERE id_client = :id_user');
       $query->bindParam(':id_user', $id_user);
       $query->execute();
       $response = $query->fetch();
       if($response){
          return new self($response['username'], $response['first_name'], $response['second_name'], $id_user);
       }else{
          return false;
       }
    }
   
 //Search all user values
   public static function getAll(){
       $connect = new Connect();
       $query = $connect->prepare('SELECT id_client, username, first_name, second_name FROM ' . self::Table . ' ORDER BY first_name');
       $query->execute();
       $response = $query->fetchAll();
       return $response;
    }
  
 //Delete user by ID
   public static function deleteById($id_user){
       $connect = new Connect();
       $query = $connect->prepare('DELETE FROM ' . self::Table . ' WHERE id_client = :id_user');
       $query->bindParam(':id_user', $id_user);
       $query->execute();
    }
   
 //User liked categories
   public static function getUserLikedCategories($id_user){
       $connect = new Connect();
       $query = $connect->prepare('SELECT id_category FROM likes_list WHERE id_client = :id_user');
       $query->bindParam(':id_user', $id_user);
       $query->execute();
       $response = $query->fetchAll();
       return $response;
    }
   
 //User current inventory
   public static function getUserInventory($id_user){
       $connect = new Connect();
       $query = $connect->prepare('SELECT DISTINCT id_ingredient FROM inventory_list WHERE id_client = :id_user');
       $query->bindParam(':id_user', $id_user);
       $query->execute();
       $response = $query->fetchAll();
       return $response;
    }
   
//Get users's shopping list
   public static function getUserShoppingList($id_user){
       $connect = new Connect();
       $query = $connect->prepare('SELECT s.id_ingredient as id, i.name as ingredient_name FROM shopping_ingredients s LEFT JOIN ingredients i ON i.id_ingredient = s.id_ingredient WHERE s.id_list = :id_user');
       $query->bindParam(':id_user', $id_user);
       $query->execute();
       $response = $query->fetchAll();
       return $response;
    }
   
//Add ingredients to user's shopping list
   public function addToShoppingList($options=null,$checked=null,$shopping_list=null){
       if($checked){
          $unchecked = array_diff($options, $checked);
          $insert_ingredients = "INSERT INTO shopping_ingredients (id_ingredient, id_list) VALUES ";
            foreach($unchecked as $result) {
              $insert_ingredients .= "(".$result.", ".$shopping_list."),";
              }
             $insert_ingredients = substr_replace($insert_ingredients, "", -1);
          $connect = new Connect();
             $query = $connect->prepare($insert_ingredients);
             $query->execute();
          $connect = null;
          header('Location: /app/list.php');  
      }else{
        $insert_ingredients = "";
      }
   }
 }
?>