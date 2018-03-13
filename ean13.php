<?php

function ean13($ean12)
{
	//L'utilisateur a préalablement saisi un code EAN à 12 chiffres sous la forme "303792016200". Ce code est stocké dans le parametre $ean12.
	
	//Initialisation des variables temporaires
	$result = str_split($ean12);//On sépare les caracteres du code EAN12 dans le tableau $result
	$somme = $cle = $reste = 0;
	
	for($i=0; $i<count($result); $i++)//On calcule la somme
	{
		if(($i+1)%2 == 1)//Si le rang est impair
			$somme += $result[$i];
		else
			$somme += $result[$i]*3;
	}
	
	$reste = $somme%10;
	
	if($reste != 0)
		$cle = 10 - $reste;
	
	$result[12] = $cle;
	
	return implode($result);//On retourne le code EAN13 sous forme de chaîne
}


$eanScan = "403792016200";
$ean13 = ean13($eanScan);

echo $ean13;//On affiche le code EAN13

?>
