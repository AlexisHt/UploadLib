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

##Utilisation de la fonction

Vous pourrez utiliser la fonction de la manière suivante :
```
  include('Upload.php');

    $upload = new Upload($file['name'],$file['tmp_name'],$file['size'],$size,$file['type'],$dossier,$rectangleHeight,$rectangleWidth,$carreDim,$form,$position,$ext,$name);

```
Avec comme arguments :
* $file['name'] étant le nom du fichier uploadé ($\_FILES["name"])
* $file['tmp_name'] étant le nom temporaire du fichier uploadé ($\_FILES["tmp_name"])
* $file['size'] étant le poid du fichier uploadé ($\_FILES["tmp_name"])
* $size étant le poid maximum que peut avoir un fichier uploadé
* $file['type'] étant le type du fichier uploadé ($\_FILES["tmp_name"])
* $dossier étant le nom du dossier de destination
* $rectangleHeight étant la hauteur du rectangle resizé si l'image est au format portrait
* $rectangleWidth étant la largeur du rectangle resizé si l'image est au format paysage
* $carreDim étant la largeur d'un coté du carré resizé
* $form étant la forme finale voulue de l'image (carré ou rectangle)
* $position Indiquez ici soit :
    * la valeur: « gauche » si votre image d’origine est en format paysage et que vous souhaitez une image finale faisant un crop à partir de la partie la plus à gauche de l’image de base
    * la valeur: « centre » si votre image d’origine est en format paysage et que vous souhaitez une image finale faisant un crop à partir de la partie la plus eau centre de l’image de base
    * la valeur: « droite » si votre image d’origine est en format paysage et que vous souhaitez une image finale faisant un crop à partir de la partie la plus à droite de l’image de base
    * la valeur: « haut » si votre image d’origine est en format portrait et que vous souhaitez une image finale faisant un crop à partir de la partie la plus haute de l’image de base
    * la valeur: « centre2 » si votre image d’origine est en format portrait et que vous souhaitez une image finale faisant un crop à partir de la partie la plus centrée de l’image de base
    * la valeur: « bas » si votre image d’origine est en format portrait et que vous souhaitez une image finale faisant un crop à partir de la partie la plus basse de l’image de base
* $ext étant la forme finale voulue de l'image (carré ou rectangle)
* $name étant le nom choisit pour le fichier final (optionnel)
