<?php
namespace OCFram;
 
class PDOFactory
{
  public static function getMysqlConnexion()
  {
    
    $bdd = new \PDO('mysql:host=localhost;dbname=news;charset=utf8', 'root', 'root');

    
    
    //$bdd = new \PDO('mysql:host=db725682133.db.1and1.com;dbname=db725682133;charset=utf8', 'dbo725682133', 'Colmoschin.80');
    $bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
 
    return $bdd;
  }
}




