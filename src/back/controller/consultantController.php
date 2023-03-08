<?php 

class ConsulantController
{
    public $repo;

    function __construct()
    {
        $this->repo = new Repository();
    }

    public function activateCandidat($idCandidat) : bool {
        try {
           if ($this->repo->activateCandidat($idCandidat))
           {
            header("Location: /sucessPage");
           } else 
           {
            header("Location: /errorPage");
           }
            
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }

        return true;
    }
}