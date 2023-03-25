<?php
final class Application{ // 'final' indique que la classe Application ne pourra pas être herité.

    public function lancementApp(){
        return "l'appli se lance comme ça !";
    }
}

//-----------------------------------------------------------//
//class Extension extends Application{} // ERROR, on ne peut pas hériter d'une classe 'final'

$app = new Application();

echo $app->lancementApp(). '<br>';

//-----------------------------------------------------------//
class Application2{

    final public function lancementApp(){

        return "l'appli s'execute comme cela ! <br>";
    }
}

//-----------------------------------------------------------//
class Extension2 extends Application2{

    // public function lancementApp(){}// ERROR, on ne peut pas surcharger ou redéfinir la methode car elle est "final" dans la classe parente
}

$extension2 = new Extension2();
echo $extension2->lancementApp();

//-----------------------------------------------------------//
/*
    Une classe 'final' ne peut être herité !!

    Une classe 'final' aura forcément des methodes qui ne pourront pas être surchargées ou redéfinies. (Pas d'intérêt à mettre le mot-clé 'final' sur la methodes d'une classe 'final')

    Une classe 'final' peut contenir des methodes normales (mais cela n'a aucun intérêt car on ne peut pas hérité d'une classe 'final' donc il n'y a aucun risque que les methodes soient redéfinies)

    Une methode 'private' avec le mot-clé 'final' n'a aucun intérêt (car on peux les modifier qu'à l'intérieur de la classe, elles ne risquent donc pas de pouvoir être surchargé)

    Une classe 'final' reste instanciable !

    une methode 'final' peut être présente dans la classe 'normale'

    une methode 'final' permet  qu'elle soit redéfinie ou surchargé.

    L'intérêt du mot-clé 'final' sur une methode est vérouiller afin d'empêcher toute 'sous-class' de la reéfinir (quand nous voulons être sur que le comportement d'une methode est préservée durant l'héritage).

*/

//-----------------------------------------------------------//
