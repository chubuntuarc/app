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
   public function addToShoppingList($options=null,$checked=null,$shopping_list=null,$id_recipe=null){
       if($checked){
          $unchecked = array_diff($options, $checked);
          $insert_ingredients = "INSERT INTO shopping_ingredients (id_ingredient, quantity, type, id_list) VALUES ";
            foreach($unchecked as $result) {
              $quantity = User::getOnRecipeQuantity($result,$id_recipe);
              $type = User::getOnRecipeType($result,$id_recipe);
              $insert_ingredients .= "(".$result.",".$quantity.", ".$type.",".$shopping_list."),";
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
   
//Get ingredient quantity on recipe
   private function getOnRecipeQuantity($ingredient,$id_recipe){
       $connect = new Connect();
       $query = $connect->prepare('SELECT quantity FROM recipe_ingredient WHERE ingredient = :id_ingredient AND id_recipe = :id_recipe');
       $query->bindParam(':id_ingredient', $ingredient);
       $query->bindParam(':id_recipe', $id_recipe);
       $query->execute();
       $response = $query->fetch();
       return $response['quantity'];
    }

//Get ingredient type on recipe
   private function getOnRecipeType($ingredient,$id_recipe){
       $connect = new Connect();
       $query = $connect->prepare('SELECT type FROM recipe_ingredient WHERE ingredient = :id_ingredient AND id_recipe = :id_recipe');
       $query->bindParam(':id_ingredient', $ingredient);
       $query->bindParam(':id_recipe', $id_recipe);
       $query->execute();
       $response = $query->fetch();
       return $response['type'];
    }
   
   
//Delete from user shopping list
   public static function deleteFromShoppingList($value,$id_user){
       $connect = new Connect();
       $query = $connect->prepare('DELETE FROM shopping_ingredients WHERE id_ingredient = :value AND id_list = :id_user');
       $query->bindParam(':value', $value);
       $query->bindParam(':id_user', $id_user);
       $query->execute();
    }
   
//Get users's inventory list
   public static function getUserInventoryList($id_user){
       $connect = new Connect();
       $query = $connect->prepare('SELECT s.id_ingredient as id, i.name as ingredient_name FROM inventory_list s LEFT JOIN ingredients i ON i.id_ingredient = s.id_ingredient WHERE s.id_client = :id_user ORDER BY name ASC');
       $query->bindParam(':id_user', $id_user);
       $query->execute();
       $response = $query->fetchAll();
       return $response;
    }   
   
//Add ingredients to user's inventory list
   public function addToInventoryList($value,$id_user){
     $connect = new Connect();
     $query = $connect->prepare('INSERT INTO inventory_list(id_ingredient,id_client) VALUES(:value,:id_user)');
     $query->bindParam(':id_user', $id_user);
     $query->bindParam(':value', $value);
     $query->execute();
   } 
   
//Delete ingredients from user's inventory list
   public function deleteFromInventoryList($value,$id_user){
     $connect = new Connect();
     $query = $connect->prepare('DELETE FROM inventory_list WHERE id_ingredient = :value AND id_client = :id_user');
     $query->bindParam(':id_user', $id_user);
     $query->bindParam(':value', $value);
     $query->execute();
   }   
   
 }
?>