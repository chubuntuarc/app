<?php
require_once 'data/conection.php';
class Site{
  const Table = 'site';
  
  public static function putVisit(){
    $connect = new Connect();
     $query = $connect->prepare('UPDATE ' . self::Table .' SET all_visits = all_visits +1, month_visits = month_visits +1, year_visits = year_visits +1');
     $query->execute();
  }
  
  public static function getAllVisits(){
    $connect = new Connect();
     $query = $connect->prepare('SELECT all_visits FROM ' . self::Table );
     $query->execute();
     $response = $query->fetch();
       return $response['all_visits'];
  }
  
  public static function getMonthVisits(){
    $connect = new Connect();
     $query = $connect->prepare('SELECT month_visits FROM ' . self::Table );
     $query->execute();
     $response = $query->fetch();
       return $response['month_visits'];
  } 
  
  public static function getYearVisits(){
    $connect = new Connect();
     $query = $connect->prepare('SELECT year_visits FROM ' . self::Table );
     $query->execute();
     $response = $query->fetch();
       return $response['year_visits'];
  }
}
?>