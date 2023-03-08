<?php 

class AdministrateurController
{
    public $repo;

    function __construct()
    {
        $this->repo = new Repository();
    }

    public function activateConsultant($idConsultant) : bool {
        try {
           if ($this->repo->activateConsultant($idConsultant))
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