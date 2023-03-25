<!-- On peut écrire du HTML dans un fichier avec l'extension '.php' MAIS l'inverse N'EST PAS POSSIBLE !! -->
<style>
    h2{
        background: black;
        color: white;
        font-size: 20px;
    }
</style>

<h2>Ecriture et affichage</h2>

<?php //balise ouvrante php

//Ici, on ouvre passage PHP, pour y faire des traitements php
/*
    commentaires
    sur plusieurs
    lignes
*/
//CHAQUE INSTRUCTION DOIT SE TERMINER PAR UN POINT VIRGULE !

?> <!-- balise fermante php -->

<p>Voici des balises html</p>

<?php
echo 'Bonjour tout le monde'; //echo est une instruction qui permet d'effectuer un affichage
echo '<br><hr>'; //On peut y mettre du HTML

print '<strong>Hello</strong>'; //print est aussi une instruction qui permet d'effectuer un affichage
?>

<?= '<br> salut <br>'; //le '=' remplace le 'php echo'  ?>
<?php echo 'salut <br>'; //meme rendu que la ligne du dessus  ?>
<h2>Les Variables: types, déclaration, affectation</h2>
<?php
//Une variable est un espace nommé qui permet de conserver une ou plusieurs valeur

//Déclaration d'une variable, avec le signe '$' (convention : on ne doit pas nommer notre variable en commencant par un '_' ou un chiffre)

$a = 456;
echo gettype( $a ) . '<br>';
//gettype() : fonction prédéfinie qui permet de connaitre le type d'une variable (ici, 'integer')

$a = 1.2;
echo gettype( $a ) . '<br>'; //affiche 'double' (car c'est nombre à virgule)

$a = 'Une chaine de caractères';
echo gettype( $a ) . '<br>'; //affiche 'string' (equivalent à VARCHAR)

$a = "456";
echo gettype( $a ) . '<br>'; //affiche 'string', car le nombre est entre guillemets et est donc interprété comme une chaine de caractères

$a = true; //ou 'false'
echo gettype( $a ) . '<br>'; //affiche boolean

//-------------------------------------------------------------
echo '<h2>La concaténation</h2>';
//On concatène avec le symbole '.'

$x = 'Bonjour';
$y = 'tout le monde.';

echo $x . ' => ' . $y . '<br>';

//----------------------------------------
//Les doubles quotes (guillemets) permettent d'interpréter les variables alors que les quotes simples (apostrophe) n'interprètent pas les variables et renverra une chaine de caractères.

echo '$x $y <br>'; //affiche : $x $y (=> quotes simples)
echo "$x $y <br>"; //affiche : Bonjour tout le monde (=>quotes doubles)

echo '<strong>' , $x , '</strong><br>'; //Concaténation possible avec le symbole virgule ','

//-------------------------------------------------------------
echo '<h2>La concaténation lors de l\'affecation</h2>';

$prenom = 'Marco'; //declaration et affectation
echo $prenom . '<br>'; //Affiche Marco

$prenom = 'Polo'; //Reaffectation (ecrase et remplace) de la variable prenom
echo $prenom . '<br>'; //affiche Polo

$prenom2 = 'Anne';
$prenom2 .= ' Marie'; //Affectation de la valeur 'Marie' sur la variable $prenom2 MAIS cela s'ajoute SANS remplacer la valeur précédente grâce à l'opérateur '.='

echo $prenom2 . '<br>'; //Affiche Anne Marie

//-------------------------------------------------------------
echo '<h2>Constantes et constantes magiques</h2>';
//Une constante : est un espace nommé qui permet de conserver un valeur SAUF QUE comme l'indique son nom, la valeur est CONSTANTE !

define('CAPITALE', 'Paris'); //Par convention, une constante se déclare TOUJOURS EN MAJUSCULE
//define(arg1, arg2);
//arg1 : nom de la constante
//arg2 : la valeur de la constante

echo CAPITALE . '<br>'; //Affiche le contenu de ma constante, ici 'Paris'

//Constantes magiques :
echo __FILE__ . '<br>'; // chemin complet vers le fichier
echo __LINE__ . '<br>'; // affiche le numéro de la ligne
echo __DIR__ . '<br>'; // affiche le chemin vers le dossier

//-------------------------------------------------------------
echo '<h3 style="color:red;">Exercice:</h3>';
//Afficher: 'bleu-blanc-rouge' (avec les tirets) en mettant chaque couleur dans une variable :

$a = 'bleu';
$b = 'rouge';
$c = 'blanc';

echo "$a-$c-$b <br>";

print $a . '-' . $c . '-' . $b .'<br>';

//-------------------------------------------------------------
echo '<h2>Guillemets et quotes</h2>';

$texte = "Bonjour";

echo $texte . ' tout le monde<br>'; //concaténation

echo "$texte tout le monde<br>"; //affichage entre guillemets où la variable est interprétée !!

echo '$texte tout le monde<br>'; //affichage entre quotes où la variable n'est pas interprétée

//-------------------------------------------------------------
echo '<h2>Opérateurs arithmétiques</h2>';

$a = 10;
$b = 2;

echo $a + $b . '<br>'; //Affiche : 12
echo $a - $b . '<br>'; //Affiche : 8
echo $a * $b . '<br>'; //Affiche : 20
echo $a / $b . '<br>'; //Affiche : 5

//Opération et affectation :

$a += $b; //equivaut à : $a = $a + $b
echo $a . '<br>'; //affiche 12

$a -= $b; //equivaut à : $a = $a - $b
echo $a . '<br>'; //affiche 10

$a *= $b; //equivaut à : $a = $a * $b
echo $a . '<br>'; //affiche 20

$a /= $b; //equivaut à : $a = $a / $b
echo $a . '<br>'; //affiche 10

//-------------------------------------------------------------
echo '<h2>Structures conditionnelles (if/else)</h2>';

// isset() et empty()
// isset() : teste si ca existe (si c'est défini)
// empty() : teste si c'est vide (ou 0, si c'est pas défini)

$vara = 0;
$varb = '';

if( empty( $vara ) ){ //SI c'est vide, 0 ou non défini

    echo 'vara : 0, vide ou non défini <br>';
}

if( isset( $varb ) ){ //Si la variable $varb existe

    echo 'varb : existe et est défini par rien <br>';
}

//------------------------------------
//IF /ELSEIF /ELSE :
$a = 10;
$b = 5;
$c = 2;

if( $a > $b ){ //Si A (10) est supérieur à B (5)

    echo 'A est bien supérieur à B <br>';
}
else{ //Sinon... (cas par défaut)

    echo "A n'est pas supérieur à B<br>";
}

//-------------------------------------
// => ET : &&
if( $a > $b && $b > $c ){ //Si A est supérieur à B ET (&&) que B est supérieur à C

    echo 'Ok pour les deux conditions <br>';
}
//-------------------------------------
// => OU : || (AltGr + 6)
if( $a == 9 || $b > $c ){ //Si A est égal à 9 OU (||) que B est supérieur à C

    echo 'Ok pour au moins une des deux conditions <br>';
}
//-------------------------------------
if( $a == 8 ){ //SI A est égal à 8

    echo '1 - A est égal à 8<br>';
}
elseif( $a != 10 ){ //SINON SI A est différent de 10

    echo '2 - A est différent de 10 <br>';
}
else{ //SINON ...

    echo '3 - Tout est faux <br>';
}
//-------------------------------------
// XOR : seulement une des deux conditions doit etre vraie
if( $a == 10 XOR $b == 6 ){

    echo 'Ok pour une condition exclusive <br>';
    //Si les deux conditions sont vraies ou que les deux sont fausses, on ne rentre pas dans le if !
}
//-------------------------------------
//Forme contractée (condition ternaire)
//Le '?' remplace le 'if' et les ':' remplace le 'else'

echo ($a == 10) ? "A est égal à 10 <br>" : "A n'est pas égal à 10<br>";

//Exactement la même chose que l'instruction du dessus
if( $a == 10 ){
    echo "A est égal à 10<br>";
}
else{
    echo "A n'est pas égal à 10<br>";
}

//$maVar = 'okok';
$var1 = isset($maVar) ? $maVar : 'valeur par défaut<br>';
//Si $maVar existe, on affecte à $var1 la valeur de $maVar SINON on affecte l'information par défaut
echo $var1 ;

$var2 = $maVar ?? 'valeur par défaut<br>';
// '??' <=> soit l'un soit l'autre
echo $var2 .'<br>';

//---------------------------------
//Comparaison :

$vara = 1; //int
echo '$vara est un : '. gettype( $vara ) . '<br>';

$varb = "1"; //string
echo '$varb est un : '. gettype( $varb ) . '<br>';

if( $vara == $varb ){ //renvoie true

    echo "Il s'agit de la même chose car la valeur est la même<br>";
}

if( $vara === $varb ){ //renvoie false

    echo "Il s'agit de la même valeur<br>";
}
else{

    echo "L'égalite est fausse, puisque le type est différent alors que la valeur est la même <br>";
}
/* Avec le '===', le test ne fonctionne pas car le type des variables sont différents. L'un est un entier (INT) et l'autre est une chaine (STRING) DONC ce n'est pas égal

	'='   : affectation
	'=='  : comparaison de valeur
	'===' : comparaison de valeur ET du type

*/

//-------------------------------------------------------------
echo '<h2>Condition SWITCH</h2>';

$couleur = 'jaune';

switch( $couleur ){ //Ici, je compare ma variable $couleur aux différents cas du switch

    case 'bleu':
        echo 'Vous aimez le bleu<br>';
        break;
    case 'rouge':
        echo 'Vous aimez le rouge<br>';
        break;
    case 'vert':
        echo 'Vous aimez le vert<br>';
        break;
    default : //cas par défaut si on ne rentre pas dans les cas précédents
        echo "Vous n'aimez pas la couleur<br>";
        break;
}
//----------------------------------
//Exercice : retranscrire le switch en if/elseif/else :
if( $couleur == 'bleu' ){

    echo 'Vous aimez le bleu<br>';
}
elseif( $couleur== 'vert' ){

    echo 'Vous aimez le vert<br>';
}
elseif( $couleur == 'rouge'){

    echo 'Vous aimez le rouge<br>';
}
else{

    echo "Vous n'aimez pas la couleur<br>";
}

//-------------------------------------------------------------
echo '<h2>Fonctions prédéfinies de php</h2>';

echo 'Date : ' . date("d/m/y") . '<br>';

$mail = 'jeremie@poles.fr';

echo strpos($mail, "@") .'<br>'; //strpos() indique la position d'un caractère dans ma chaine
// => ATTENTION : ici, affiche 7 car on commence à compter à partir de ZERO !!

$phrase = "Voici une phrase";
echo iconv_strlen( $phrase ) . '<br>'; //permet de retourner la taille de la chaine

$texte = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

echo substr( $texte, 0, 20) . "...<a href='#'>Lire la suite</a><br>";
//substr( arg1, arg2, arg3 ) permet de retourner une partie d'une chaine
//arg1 : la chaine que l'on souhaite couper
//arg2 : la position de départ
//arg3 : la position de fin

//-------------------------------------------------------------
echo '<h2>Fonctions utilisateurs</h2>';

function separation(){ //Déclaration d'une fonction prévue pour ne pas recevoir d'argument

    echo '<hr><hr><hr>'; //trois traits de séparations
}

separation(); //Appel et exécution de la fonction

//-----------------------------------
function bonjour( $qui ){ //fonction avec argument (ici, $qui)

    return "Bonjour $qui <br>";
}
echo bonjour('marco');

//Si la fonction est prévue pour recevoir un argument ALORS il faut lui envoyer un argument en paramètre
//Quand il a y 'return' dans la fonction, il faut faire un 'echo' de la fonction pour avoir un affichage.

$prenom = 'Bob';
echo bonjour($prenom);

//-----------------------------------
function jourSemaine(){

    $jour = "mercredi"; //variable locale

    return $jour; //La fonction va retourner quelque chose ET A CE MOMENT LA ON QUITTE LA FONCTION

    echo 'salut'; //Cette ligne ne fonctionne pas car il y a un "return" avant !
}
echo jourSemaine() .'<br>'; //ici, on demande l'affichage, on appel et exécute la fonction

//echo $jour; // error undefined car elle n'est pas définie dans l'espace global mais uniquement dans le scope de ma fonction (local)

//------------------------------------
function tva( $nombre ){

    return $nombre*1.2;
}

echo '100 € avec un taux de 20% est égal à : ' . tva(100) . '€<br>';
//-------------------------------------
//Exercice : améliorez la fonction tva() afin que l'on puisse calculer un nombre avec le taux de notre choix :
//(bonus: mettre un taux par défaut)

//=> IMPOSSIBLE DE NOMMER 2 FONCTIONS DE LA MEME FACON !

function tva2( $nombre, $taux = 1.2 ){

    return $nombre*$taux;
}

$salaire = 1000;
$tx = 1.3;

echo "$salaire € avec un taux de $tx % est égal à :". tva2( $salaire) . '€<br>';

//-------------------------------------
meteo( "hiver", 12 ); //Il est possible d'exécuter une fonction avant qu'elle ne soit déclarée dans le code

function meteo( $saison, $temperature ){

    echo "<br> Nous sommes en $saison et il fait $temperature degré(s) <br>";
}

//-------------------------------------
//Exercice : Gérer le 's' de degré si on est au dessus de 1° ou en dessous de -1° et l'article 'au' si la saison est 'printemps' :

function meteo2( $saison, $temperature ){

    if( $temperature > 1 || $temperature < -1 ){ //Si la temperature est strictement supérieur à 1 OU que la température est strictement inférieur à -1 on declare une varaible avec le 's' à degré.

        $degre = 'degrés';
    }
    else{ //Sinon (on se trouve dans l'intervale [-1 : 1]) on crée une variable sans le 's'

        $degre = 'degré';
    }

    if( $saison == 'printemps'){ //Si saison est égale à printemps, on déclare une variable avec 'au'

        $article = 'au';
    } //Sinon, on crée une variable avec 'en'
    else{
        $article ='en';
    }

    //Ici, on affiche la phrase avec les varaibles issues des conditions
    echo "<br> Nous sommes $article $saison et il fait $temperature $degre <br>";
}

meteo2( "hiver", 1 );
meteo2( "ete", -12 );
meteo2( "printemps", 1 );
meteo2( "printemps", 12 );
meteo2( "ete", -1 );

//-------------------------------------
//Les opérateurs : Pour tester les variables, on peut utiliser TOUS les opérateurs de comparaison
/*
	égal : '==' renvoie TRUE si les opérandes sont égales
	différent de : '!=' renvoie TRUE si les opérandes NE SONT PAS EGALES
	strictement égal : '===' renvoie TRUE si les opérandes sont EGALES ET DU MEME TYPE
	strictement différent : '!==' renvoie TRUE si les opérandes sont NE SONT PAS EGALES OU NE SONT PAS DU MEME TYPE
	plus grand que : '>'
	plus grand ou égal à : '>='
	plus petit que : '<'
	plus petit ou égal à : '<='
*/
//Les instructions renvoient toujours TRUE ou FALSE et les instructions de la condition de seront exécutées QUE si la valeur renvoie TRUE !

//-------------------------------------
$pays = 'France'; //Déclaration d'une variable dans l'espace global

function affichePays(){

    global $pays; //le echo qui suit ne fonctionnerait pas si nous n'avions pas mis le mot clé 'global' qui permet d'importer tout ce qui est déclaré dans l'espace global à l'intérieur de l'espace local (ici, le scope de ma fonction)

    //$pays = 'Maroc'; //Ok si la variable est déclaré dans l'espace local, cela fonctionne

    echo $pays;
}

affichePays(); //Appel et exécution de la fonction

//-------------------------------------------------------------
echo '<h2>Structures itératives : les boucles</h2>';

//boucle while :
$i = 0; //initialisation

while( $i < 5 ){ //condition : TANT QUE $i est inférieur à 5, on exécute le code entre les accolades

    echo "$i => ";

    $i++; //incrémentation ($i++ <=> $i = $i + 1 )
}
//résultat : 0 => 1 => 2 => 3 => 4 =>
echo '<br>';
//------------------------------------
//Exercice : Enlever la flèche à la fin
//resultat attendu : 0 => 1 => 2 => 3 => 4
$i = 0; //initialisation

while( $i < 5 ){ //condition

    if($i == 4){ //Si $i est égal à 4, on affiche 4
        echo $i;
    }
    else{ //Sinon.. on affiche $i et la fleche
        echo "$i => ";
    }
    $i++; //incrementation
}
echo '<hr>';

//-------------------------------------------
//boucle for :
for($i=0; $i < 11 ; $i++) { //initialisation; condition; incrémentation

    echo $i .'<br>';
}
//-------------------------------------------
//Exercice : Afficher un select avec 31 options via une boucle for et dans le sens inverse

echo '<select>';
for ($i=31; $i > 0 ; $i--) {

    echo "<option>$i</option>";
}
echo '</select>';

//--------------------------------
//Sens "à l'endroit":
echo '<select>';
for ($i=1; $i < 32 ; $i++) {

    echo "<option>$i</option>";
}
echo '</select>';
//-------------------------------------------
//Exercice : Afficher les numéros de 1 à 10 dans un tableau sur UNE ligne
echo '<table border="1">';
echo '<tr>';
for ($i=1; $i < 11 ; $i++) {

    echo "<td>$i</td>";
}
echo '</tr>';
echo '</table>';

//-------------------------------------------
//Boucles imbriquées :
//Objectif : Créer un tableau avec 10lignes contenant 10cellules allant de 1 à 100 via des boucles :
$k = 1;

echo '<hr><table border="1">';
for ($i=1; $i <=10 ; $i++) {  //Création des 10 lignes (10 tours de boucles)

    echo '<tr>';
    for ($j=1; $j <= 10 ; $j++) { //Création des 10 cellules (10 tours de boucles)

        echo "<td>$k</td>";
        $k++;
    }
    echo '</tr>';
}
echo '</table>';

//-------------------------------------------------------------
echo '<hr><h2>Les inclusions</h2>';

echo 'Première fois : ';
include("exemple.inc.php");

echo '<br>Deuxième fois : ';
include_once("exemple.inc.php"); // le 'once' vérifie si le fichier a déjà été inclus. Si c'est le cas, il ne le ré-inclus pas

echo '<hr>Première fois : ';
require("exemple.inc.php");

echo '<br>Deuxième fois : ';
require_once("exemple.inc.php");

//Différence entre include et require :
//Include fait une erreur et continue l'exécution du script
//require fait une erreur et stop l'exécution du script

//-------------------------------------------------------------
echo '<hr><h2>Les Arrays</h2>';
//Déclaration d'un array que l'on stocke dans une variable:

$liste = array('marco', 'polo', 'jean', 123);

var_dump( $liste );

echo '<hr>';

print '<pre>'; //La balise <pre> en HTML permet de formater le texte
print_r( $liste );
print '</pre>';

//------------------------------
echo '<hr><h2>Boucle foreach + arrays</h2>';
//La boucle foreach fonctionne UNIQUEMENT sur des tableaux et les objets. Elle retournera une erreur si l'on tente de l'exécuter sur une variable d'une autre type qu'un array (ou objet)
//foreach permet de passer en revu les données d'un tableau :

$tableau = ['pomme', 'fraise', 'poire'];

$tableau[] = 'peche'; //Autre moyen d'affecter une valeur à un tableau.

var_dump( $tableau );

print '<pre>';
print_r( $tableau );
print '</pre>';

//Affichez 'poire' :
echo $tableau[2] . '<br>';

//--------------------------------------
//Le mot clé 'AS' est OBLIGATOIRE, il fait parti de la boucle foreach.
//Si il y a deux variables en argument APRES le mot clé 'AS', le premier parcours la colonne des indices et le second parcours la colonne des valeurs

foreach ($tableau as $key => $value) {

    echo $key . ' ---> ' . $value . '<br>';
}

//--------------------------------------
//SI il n'y a qu'une seule variable en argument APRES le mot clé 'AS', alors cette variable (ici, $value parcours les valeurs du tableau)

foreach ($tableau as $value) {

    echo $value . '<br>';
}
//--------------------------------------
//Autre syntaxe : ici, on remplace les accolades par ':' (accolade ouvrante) et endforeach (accolade fermante)
foreach ($tableau as $fruit) :
    echo $fruit . ' / ';

endforeach;

echo '<br>';
//---------------------------------------
//Possibilite de choisir les indices :
$couleur = array('j' => 'jaune', 'b' => 'bleu', 'v' => 'vert');

print '<pre>';
print_r( $couleur );
print '</pre>';

//Afficher 'jaune':
echo $couleur['j'] . '<br>';

//---------------------------------------
//count() et sizeof() : permettent de renvoyer la taille d'un tableau

echo 'Taille du tableau : ' . count( $couleur ) . '<br>';
echo 'Taille du tableau : ' . sizeof( $couleur ) . '<br>';

//-------------------------------------------------------------
echo '<hr><h2>Les Arrays multidimmentionnels</h2>';
//Les Arrays multidimmentionnels sont des tableaux imbriqués dans un autre tableau

$multi = array(
    0 => array('prenom'=>'marco', 'nom'=>'polo'),
    1 => array('prenom'=>'jean', 'nom'=>'paul'),
    2 => array('prenom'=>'oui', 'nom'=>'oui'),
    3 => array('prenom'=>'bob', 'nom'=>'marley')
);

print '<pre>';
print_r( $multi );
print '</pre>';

//Afficher 'bob' :
echo '$multi[3]["prenom"] donne : ' . $multi[3]['prenom'] . '<br>';

for( $i=0; $i < sizeof($multi); $i++ ){

    echo $multi[$i]['prenom'] . '<br>';
}

//-------------------------------------------------------------
echo '<hr><h2>Les objets</h2>';
//Un objet est un autre type de données. Un peu à la manière des arrays, il permet de regrouper des informations.
//Ici, on parle de propriétés (=variables) et de méthodes (=fonctions)

class Etudiant{

    public $prenom = 'Jeremie'; //'public' permet de dire que l'élement sera accessible PARTOUT (il existe aussi 'private' et 'protected')

    public $age = 45;

    public function pays(){

        return 'France';
    }
}

//Un objet est un conteneur symbolique, qui possède sa propre existence et incorpore des informations et des mécanismes

$objet = new Etudiant(); //Le mot clé 'new' permet d'instancier  (déployer) la classe et d'en faire un objet. On se serivra de ce qu'il y a dans la classe via l'objet

print '<pre>';
print_r( $objet );
print '</pre>';

echo $objet->prenom .'<br>';
echo $objet->age .'<br>';
//Dans un array, on va piocher les infos avec des crochets [] alors que pour les objets, on utilise la fleche '->' pour accéder aux infos de la classe.

echo $objet->pays() .'<br>'; //Appel d'une méthode TOUJOURS avec des parenthèses





















?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
