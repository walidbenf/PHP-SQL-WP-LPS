<h1>PAGE 2</h1>

<?php
//$_GET  il représente l'url,il s'agit d'une superglobale, etil faut absolument qu'elle soit écrite en majuscule sinon ça ne fonctionne pas !

print '<pre>';
print_r($_GET);
print '</pre>';

if($_GET){//Si il y a une information dans l'url

echo "Paramètre 1:" . $_GET['article'] . '<br>';
echo "Paramètre 2:" . $_GET['couleur'] . '<br>';
echo "Paramètre 3:" . $_GET['prix'] . '<br>';

}

/*
 * fichier.php?couleur=jean&couleur=rouge&prix=123
 * <=>
 * fichier.php?cle=valeur&cle&cle=valeur&cle=valeur
 *
 * Pour récupérer la valeur,il faut préciser la clé entre crochet avec la superglboale $_GET, car totues les superglobales sont des arrays !
 *
 * Pour faire passer des informations dans l'url, il faut commencer par mettre un '?' et ensuite la clé suivi d'un '=' et la valeur correspondante. Si on veut faire passer plusieurs informations dans l'url, je les sépare ensuite d'un '&'
 */

