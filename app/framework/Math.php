<?php
class Math extends Utilities{
    //%  5dh (100%) -> 1 pesonne
    //%  5dh ( 200% ) -> 2 personnes
    public static function pourcentage($nombre,$pourcentage)
	{ 
    
	  $resultat = $nombre * $pourcentage/100;
	  return round($resultat); // Arrondi la valeur
	}
}

$framework_math = new Math();