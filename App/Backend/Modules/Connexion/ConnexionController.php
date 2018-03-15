<?php
namespace App\Backend\Modules\Connexion;
 
use \OCFram\BackController;
use \OCFram\HTTPRequest;

//use Nonce\{Nonce,Config};
//require __DIR__ . '../../../../vendor/autoload.php';



 
class ConnexionController extends BackController
{
  
  
  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Connexion');
    
    if ($request->postExists('login'))
    {
      
    	//if ( isset( $_POST['login'] ) && Nonce::verify( $_POST['login'], 'signup-form' ) ) {}
      
      
      $login = $request->postData('login');
      $password = $request->postData('password');
 
      
      if ( hash_equals($login, $this->app->config()->get('login')) && hash_equals($password, $this->app->config()->get('passw')) )
      {
        $_SESSION['name'] = "admin";
		$_SESSION['connected'] = true;
        $this->app->user()->setAuthenticated(true);
        $password = '';
        $login = '';
        $this->app->httpResponse()->redirect('.');
      }
      $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect.');
      
    
    }
  }
  
  
  
  public function executeDisconnectAdmin()
  {
		$this->app->user()->UnAuthenticate();
		$this->app->httpResponse()->redirect('http://localhost/~alexei/FlyWithMeOC2/Web/articles');
  }
  
  
  
  
  
  
  
  
}









