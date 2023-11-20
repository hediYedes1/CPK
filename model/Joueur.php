<?php
class Produit
{
    private ?int $idProduit = null;
    private ?string $nom = null;
    private ?string $prix = null;
    private ?string $image = null;

    public function __construct($id = null, $n, $p, $i)
    {
        $this->idProduit = $id;
        $this->nom = $n;
        $this->prix = $p;
        $this->image =$i;
    }


    public function getidProduit()
    {
        return $this->idProduit;
    }


    public function getNom()
    {
        return $this->nom;
    }

    public function getPrix()
    {
        return $this->prix;
    }
    public function getimage()
    {
        return $this->image;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }



    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }


    public function setImage($image)
    {
        return $this->image;
    }
}
