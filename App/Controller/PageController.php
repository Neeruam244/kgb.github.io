<?php

namespace App\Controller;

class PageController extends Controller
{
    public function route(): void
    {
        try{
            if (isset ($_GET['action'])){
                switch ($_GET['action']) {
                    case 'about': 
                        // appeler la méthode about() 
                        $this->about();
                        break;
                    case 'home': 
                        // appeler la méthode home()
                        $this->home();
                        break;
                    default : 
                        throw new \Exception("Cette action n'existe pas : ".$_GET['action']);
                        break;
                }
            } else {
                throw new \Exception("Aucune action détectée");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }

        
    }

    protected function about()
    {
        $params = [
            'test' => 'abc',
            'test2' => 'abc2'
        ];

        
        $this->render('page/about', $params);
    }

    protected function home()
    {

        $this->render('page/home', [ 
        ]);
    }
}

//analyser 
//pageController : gère les pages static (home, about)