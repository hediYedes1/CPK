<?php
class reponse
{
    private ?int $id_rep = null;
    private ?string $contenu = null;
    private ?string $date = null ;
    

    public function __construct($id = null, $c, $d=null)
    {
        $this->id_rep = $id;
        
        $this->contenu = $c;
       
        $this->date = $d;
        
    }


    public function getIdreponse()
    {
        return $this->id_rep;
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