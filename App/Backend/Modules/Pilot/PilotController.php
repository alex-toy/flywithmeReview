<?php
namespace App\Backend\Modules\Pilot;
 
use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Pilot;

use \FormBuilder\CommentFormBuilder;
use \FormBuilder\ArticlesFormBuilder;
use \OCFram\FormHandler;
 
class PilotController extends BackController
{
  public function executeIndex()
  {
    $this->page->addVar('title', 'Gestion des Pilotes');
 
    $pilotmanager = $this->managers->getManagerOf('Pilot');
    
    $this->page->addVar('listePilotes', $pilotmanager->getAllPilots());
    
    
    $NbComByPilotName = $pilotmanager->getCountCommentsFromPilots();
    $this->page->addVar('CountCommentsFromPilotName', $NbComByPilotName);
    
    
  }
  
  
  
  
  public function executeListCommentPilot(HTTPRequest $request)
  {
    $pilotname = $request->getData('pilotname');
    
    $this->page->addVar('title', 'commentaires de ' . $pilotname);
    $this->page->addVar('pilotname', $pilotname);
    
    
    $pilotmanager = $this->managers->getManagerOf('Pilot');
    
    $AllComByPilotName = $pilotmanager->getAllCommentsFromPilots($pilotname);
    $this->page->addVar('AllCommentsFromPilotName', $AllComByPilotName);
    
   }
  
  
  
  
  public function executeDeletePilot(HTTPRequest $request)
  {
    $this->page->addVar('title', 'suppression d\'un pilote');
    
    $piloteId = $request->getData('id');
    $pilotmanager = $this->managers->getManagerOf('Pilot');
    
    $pilotmanager->deletePilot($piloteId);
    
 
    $this->app->user()->setFlash('Le pilote a bien été supprimé !');
 
    $this->app->httpResponse()->redirect('http://localhost/~alexei/FlyWithMeOC2/Web/admin/pilotes/');
  }
 
 
 

  public function executeUpdate(HTTPRequest $request)
  {
    $this->processForm($request);
    
    $title_article = $this->managers->getManagerOf('articles')->getUnique($request->getData('id'))->titre();
    
    $this->page->addVar('title_article', $title_article );
    
    $this->page->addVar('title', 'Modification de l\'article');
  }
 

}



























