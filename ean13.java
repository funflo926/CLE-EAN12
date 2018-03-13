String ean13(int[] ean12)
{
	//Initialisation des variables temporaires
	int result[] = ean12;
	int somme = cle = reste = 0;
	String resultat = "";
		
	for(int i=0; i<result.length-1; i++) //On calcule la somme
	{
		if((i+1)%2 == 1) //Si le rang est impair
			somme += result[i];
		else
			somme += result[i]*3;
	}
		
	reste = somme%10;
		
	if(reste != 0)
		cle = 10 - reste;
		
	result[12] = cle;

	for(i=0; i<result.length; i++)
		resultat += parseChar(result[i]);
	
	return resultat;
}

/*L'utilisateur a préalablement saisi un code EAN à 12 chiffres. Ce code est stocké dans le tableau ean12.
(De l'indice 0 à 11, l'indice 12 est gardé pour la clé)

int ean12[13] = ... ;*/

System.out.println(ean13(ean12)); //On affiche le code EAN13