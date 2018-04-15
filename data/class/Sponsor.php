<?php 
class Sponsor{
   private $id_sponsor;
   private $name;
   private $picture;
   private $position;
   const Table = 'sponsors';
  //Getters
   public function getId() {
      return $this->id_sponsor;
   }
   public function getName() {
      return $this->name;
   }
   public function getPicture() {
      return $this->picture;
   }
   public function getPosition() {
      return $this->position;
   }
  //Setters
   public function setName($name) {
      $this->name = $name;
   }
   public function setPicture($picture) {
      $this->picture = $picture;
   }
   public function setPosition($position) {
      $this->position = $position;
   }
  //Construct
  public function __construct($name, $picture, $position=null, $id_sponsor=null) {
      $this->name = $name;
      $this->picture = $picture;
      $this->position = $position;
      $this->id_sponsor = $id_sponsor;
   }
   //Get first sponsor logo
   public static function getFirstSponsorLogo(){
       $connect = new Connect();
       $query = $connect->prepare('SELECT picture  FROM ' . self::Table . ' WHERE position = 1');
       $query->execute();
       $response = $query->fetch();
       if($response){
          return new self(null,$response['picture'],null,null);
       }else{
          return false;
       }
    }
    //Get first sponsor logo
   public static function getSecondSponsorLogo(){
       $connect = new Connect();
       $query = $connect->prepare('SELECT picture  FROM ' . self::Table . ' WHERE position = 2');
       $query->execute();
       $response = $query->fetch();
       if($response){
          return new self(null,$response['picture'],null,null);
       }else{
          return false;
       }
    }
}
?>