<?php
/*
relation transitive:

Si B hérite de A - ET - Si C hérite de B - ALORS - C hérite de A
*/
class A{
  public function test1() {
    return 'test1';

  }
}

class B extends A{
  public function test2() {
    return 'test2';

  }
}

class C extends B {
  public function test3() {
    return 'test3';
  }
}

$c = new C;

echo $c->test1() . '<br />';
echo $c->test2() . '<br />';
echo $c->test3() . '<br />';

echo '<hr />';

//Retourne tout les méthodes de la classe C
print '<pre>';

print_r(get_class_methods('C'));

print '</pre>';
 ?>
