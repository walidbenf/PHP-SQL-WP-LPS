<?php

echo '<h2>Classes existantes</h2>';

print '<pre>';
    print_r(get_declared_classes());
print '</pre>';

echo '<h2>Interfaces existantes</h2>';

print '<pre>';
    print_r(get_declared_interfaces());
print '</pre>';