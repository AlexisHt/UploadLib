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

* fileName
* fileSize
* fileType
* fileFolder
* rectHeight
* rectWidth
* squareDim
* fileShape
* fileCropPosition


###Arguments de la methode construct

Cette methode va permettre de initialiser toutes les données strictement nécessaires à un upload

* fileName
* fileSize
* fileType
* fileFolder


###Arguments de la methode resize

Cette methode va permettre de redimensionner les images si voulu

* rectHeight
* rectWidth
* squareDim
* fileShape
* fileCropPosition


###methode upload

Cette methode va permettre d'uploader le fichier
