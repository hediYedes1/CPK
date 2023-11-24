<?php
class reponse
{
    private ?int $id_rep = null;
    private ?string $contenu = null;
    private ?string $date = null ;

    private ?string $id_rec = null;
    

    public function __construct($id = null, $c, $d=null ,$i=null)
    {
        $this->id_rep = $id;
        
        $this->contenu = $c;
       
        $this->date = $d;

        $this->id_rec = $i;
        
    }


    public function getIdrec()
    {
        return $this->id_rec;
    }
    public function setIderc($id_rec){
        $this->id_rec = $id_rec;
    }
    public function getdate(){
        return $this->date;
    }
    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function getcontenu()
    {
        return $this->contenu;
    }


    public function setcontenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }


    
}
    
?>