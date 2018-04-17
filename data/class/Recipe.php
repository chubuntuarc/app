<?php
require_once 'data/conection.php';
require_once 'data/class/User.php';
class Recipe {
   private $id_recipe;
   private $category;
   private $name;
   private $description;
   private $main_pic;
   private $sec_pic;
   private $stars;
   private $diners;
   private $sponsor;
   private $times;
   const Table = 'recipe';
  //Getters
   public function getId() {
      return $this->id_recipe;
   }
   public function getCategory() {
      return $this->category;
   }
   public function getName() {
      return $this->name;
   }
   public function getDescription() {
      return $this->description;
   }
   public function getMainPic() {
      return $this->main_pic;
   }
   public function getSecPic() {
      return $this->sec_pic;
   }
   public function getStars() {
      return $this->stars;
   }
   public function getDiners() {
      return $this->diners;
   }
   public function getSponsor() {
      return $this->sponsor;
   }
   public function getTime() {
      return $this->times;
   }
  //Setters
   public function setCategory($category) {
      $this->category = $category;
   }
   public function setName($name) {
      $this->name = $name;
   } 
   public function setDescription($description) {
      $this->description = $description;
   }
   public function setMainPic($main_pic) {
      $this->main_pic = $main_pic;
   }
   public function setSecPic($sec_pic) {
      $this->sec_pic = $sec_pic;
   }
   public function setStars($stars) {
      $this->stars = $stars;
   }
   public function setDiners($diners) {
      $this->diners = $diners;
   }
   public function setTime($time) {
      $this->times = $time;
   }
  //Construct
  public function __construct($category, $name, $description=null, $main_pic, $sec_pic=null, $stars=null, $diners, $sponsor, $times, $id_recipe=null) {
      $this->category = $category;
      $this->name = $name;
      $this->description = $description;
      $this->main_pic = $main_pic;
      $this->sec_pic = $sec_pic;
      $this->stars = $stars;
      $this->diners = $diners;
      $this->sponsor = $sponsor;
      $this->times = $times;
      $this->id_recipe = $id_recipe;
   }
  
 //Day's recipe
   public static function daysRecipe(){
       $connect = new Connect();
       $query = $connect->prepare('SELECT id_recipe, name, main_pic  FROM ' . self::Table . ' WHERE day_recipe = 1');
       $query->execute();
       $response = $query->fetch();
       if($response){
          return new self(null,$response['name'],null, $response['main_pic'],null,null,null,null,null,$response['id_recipe']);
       }else{
          return false;
       }
    } 
  
 //First sponsored recipe
   public static function getFirstSponsor(){
       $connect = new Connect();
       $query = $connect->prepare('SELECT id_recipe, main_pic, sponsor  FROM ' . self::Table . ' WHERE sponsor = 1');
       $query->execute();
       $response = $query->fetch();
       if($response){
          return new self(null,null,null, $response['main_pic'],null,null,null,$response['sponsor'],null,$response['id_recipe']);
       }else{
          return false;
       }
    }
  
  //Second sponsored recipe
    public static function getSecondSponsor(){
       $connect = new Connect();
       $query = $connect->prepare('SELECT id_recipe, main_pic, sponsor  FROM ' . self::Table . ' WHERE sponsor = 2');
       $query->execute();
       $response = $query->fetch();
       if($response){
          return new self(null,null,null, $response['main_pic'],null,null,null,$response['sponsor'],null,$response['id_recipe']);
       }else{
          return false;
       }
    }
  
//Get recipes that has some ingredients 
  //Recieve ingredients as string in format this format => 1,3,5,10,3 <=
  public static function getRecipesFromIngredients($ingredients){
       $connect = new Connect();
       $query = $connect->prepare('SELECT DISTINCT id_recipe FROM recipe_ingredient WHERE ingredient IN ('.$ingredients.') LIMIT 12');
       $query->execute();
       $response = $query->fetchAll();
       return $response;
    }
  
//Get recipes according user likes list
    public static function getLikesListRecipes($id_user){
       $user_likes_list = User::getUserLikedCategories($id_user);
       $user_likes_array = array();
      foreach($user_likes_list as $item):
        array_push($user_likes_array, $item['id_category']);
      endforeach;
       $recipes_from_liked_list = implode(",", $user_likes_array);
       $connect = new Connect();
       $query = $connect->prepare('SELECT DISTINCT id_recipe, name, main_pic FROM ' . self::Table . ' WHERE category IN ('.$recipes_from_liked_list.') LIMIT 12');
       $query->execute();
       $response = $query->fetchAll();
       return $response;
    }
  
//Get recipes according user inventory list
    public static function getInventoryListRecipes($id_user){
      //Get inventory list from user
       $user_inventory_list = User::getUserInventory($id_user);
       $user_inventory_array = array();
      foreach($user_inventory_list as $item):
        array_push($user_inventory_array, $item['id_ingredient']);
      endforeach;
       //Get recipes with user ingredients
       $user_ingredients = implode(",", $user_inventory_array);
       $response = getRecipesFromIngredients($user_ingredients);
       return $response;
    }
  
  //Get recomended recipes if has inventory, likes or both
      public static function getRecomendedRecipes($id_user){
      //Get inventory list from user
       $user_inventory_list = User::getUserInventory($id_user);
       $user_inventory_array = array();
      foreach($user_inventory_list as $item):
        array_push($user_inventory_array, $item['id_ingredient']);
      endforeach;
       $user_ingredients = implode(",", $user_inventory_array);
       //Get likes list from user
      $user_likes_list = User::getUserLikedCategories($id_user);
       $user_likes_array = array();
      foreach($user_likes_list as $item):
        array_push($user_likes_array, $item['id_category']);
      endforeach;
       $recipes_from_liked_list = implode(",", $user_likes_array);
         //Evaluate
        if($user_ingredients != '' AND $recipes_from_liked_list == ''){
          $response = getInventoryListRecipes($id_user);
        }elseif($user_ingredients == '' AND $recipes_from_liked_list != ''){
          $response = getLikesListRecipes($id_user);
        }elseif($user_ingredients != '' AND $recipes_from_liked_list != ''){
          $connect = new Connect();
           $query = $connect->prepare('SELECT id_recipe, name, main_pic  FROM ' . self::Table . ' LIMIT 12');
           $query->execute();
           $response = $query->fetchAll();
        }else{
          $liked_recipes = getRecipesFromIngredients($user_ingredients);
          $liked_recipes_array = array();
          foreach($liked_recipes as $item):
            array_push($liked_recipes_array, $item['id_recipe']);
          endforeach;
          $recipes = implode(",", $liked_recipes_array);
          $connect = new Connect();
           $query = $connect->prepare('SELECT id_recipe, name, main_pic  FROM ' . self::Table . ' WHERE id_recipe IN ('.$recipes.') AND category IN ('.$recipes_from_liked_list.') ORDER BY RAND() LIMIT 12');
           $query->execute();
           $response = $query->fetchAll();
        }
       return $response;
    }
  
//Get popular recipes
      public static function getPopularRecipes(){
       $connect = new Connect();
       $query = $connect->prepare('SELECT id_recipe, main_pic FROM ' . self::Table . ' ORDER BY counter desc LIMIT 5');
       $query->execute();
       $response = $query->fetchAll();
       return $response;
    }
  
//Get all ingredients list
   public static function getAllIngredients(){
       $connect = new Connect();
       $query = $connect->prepare('SELECT id_ingredient as id, name FROM ingredients ORDER BY name ASC');
       $query->execute();
       $response = $query->fetchAll();
       return $response;
    }    
  
}
?>