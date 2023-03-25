<?php
if($_POST) {
    echo "Destinataire : $_POST[destinataire] <br>";
    echo "Expediteur : $_POST[expediteur] <br>";
    echo "Sujet: $_POST[sujet] <br>";
    echo "Message : $_POST[message] <br>";

    mail($_POST['destinataire'],$_POST['sujet'],$_POST['message'],$_POST['expediteur']);
}
?>
<form  method="post" action="">
    <label for="destinataire">destinataire</label> <br>
    <input type="text" id="destinataire" name="destinataire"> <br> <br>

    <label for="expediteur">expediteur</label> <br>
    <input type="text" id="expediteur" name="expediteur"> <br> <br>

    <label for="sujet">sujet</label> <br>
    <input type="text" id="sujet" name="sujet"> <br> <br>

    <label for="message">message</label> <br>
    <input type="text" id="message" name="message"> <br> <br>
    <input type="submit">
</form>

