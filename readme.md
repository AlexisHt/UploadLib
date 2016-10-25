#Groupe1 : D'Harcourt & Angehrn

Création d'une fonction d'upload modulable et réutilisable en POO.


##Adresse de Prod

[prod](http://angehrn.etudiant-eemi.com/perso/prod/groupe1_dharcourt_angehrn)

##Adresse de Preprod

[test](http://angehrn.etudiant-eemi.com/perso/test/groupe1_dharcourt_angehrn)


###Fonctionnalités Générales

* Multi upload
* Vérification de format
* Renommage de fichier et choix du dossier de destination
* Pour des images possibilité de redimension
-> Avec choix du crop (largeur, hauteur, position du crop)


###Attributs de la class upload

* fileName  - correspond au nom du fichier
* fileTmpName  - correspond au nom du fichier temporaire
* fileSize  - correspond au poid du fichier
* fileMaxSize  - correspond au poid maximum du fichier
* fileCode  - correspond au code du nouveau nom du projet
* fileType  - correspond au type du fichier
* fileFolder  - correspond au nom du dossier de destination
* rectHeight  - correspond a la hauteur du rectangle voulu
* rectWidth  - correspond a la largeur du rectangle voulu
* squareDim  - correspond a la longueur d'un coté du carré voulu
* fileShape  - correspond à la forme de l'image finale voulue
* fileCropPosition - correspond au point de position du crop
* fileExtension  - correspond a l'extension du fichier
* fileAllExtension  - correspond au tableau des extensions choisies
* fileAdress  - correspond a l'adresse finale du fichier

 Tous ces attributs sont private


###Arguments de la methode construct

Cette methode va permettre de :
* initialiser toutes les données
* gérer les extensions
* gérer la taille du fichier
* déplacer le fichier
* vérifier si c'est une image

Si c'est une image :
* redimensionner l'image ou la rogner
