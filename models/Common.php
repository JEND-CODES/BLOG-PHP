<?php

class Common
{
    
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    
    // Méthode hydrate - L'hydratation consiste à transformer le contenu d'une base de données en objets 
    // Voir tuto OpenC https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php/1666289-manipulation-de-donnees-stockees
    
    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
           
        {
            $method = 'set'.ucfirst($key);
            
            if(method_exists($this, $method))
                $this->$method($value);
        }
    }
}
    