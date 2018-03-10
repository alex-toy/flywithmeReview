<?php
namespace Entity;
 
use \OCFram\Entity;
 
class Articles extends Entity
{
  protected $depart,
            $arrivee,
            $contenu,
            $dateAjout,
            $dateModif,
            $titre;
            
 
  const AUTEUR_INVALIDE = 1;
  const TITRE_INVALIDE = 2;
  const CONTENU_INVALIDE = 3;
  const DEPART_INVALIDE = 4;
  const ARRIVEE_INVALIDE = 5;
  
 
  public function isValid()
  {
    return !(empty($this->depart) || empty($this->arrivee) || empty($this->contenu));
  }
 
 
  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }
 
    $this->contenu = $contenu;
  }
 
  public function setDateAjout(\DateTime $dateAjout)
  {
    $this->dateAjout = $dateAjout;
    //echo 'dateAjout : ' . $this->dateAjout . '<br>';
  }
 
  public function setDateModif(\DateTime $dateModif)
  {
    $this->dateModif = $dateModif;
  }
  
  public function setDepart($depart)
  {
    if (!is_string($depart) || empty($depart))
    {
      $this->erreurs[] = self::DEPART_INVALIDE;
    }
 
    $this->depart = $depart;
  }
  
  public function setArrivee($arrivee)
  {
    if (!is_string($arrivee) || empty($arrivee))
    {
      $this->erreurs[] = self::ARRIVEE_INVALIDE;
    }
 
    $this->arrivee = $arrivee;
  }
  
  public function setTitre($titre)
  {
    if (!is_string($titre) || empty($titre))
    {
      $this->erreurs[] = self::TITRE_INVALIDE;
    }

    $this->titre = $titre;
  }
  
  
 
  
 
  public function auteur()
  {
    return $this->auteur;
  }
 
  public function titre()
  {
    return $this->titre;
  }
 
  public function contenu()
  {
    return $this->contenu;
  }
 
  public function dateAjout()
  {
    return $this->dateAjout;
  }
 
  public function dateModif()
  {
    return $this->dateModif;
  }
  
  public function depart()
  {
    return $this->depart;
  }
  
  public function arrivee()
  {
    return $this->arrivee;
  }
  
  
  
  
}