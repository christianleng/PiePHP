<?php
// function callback quand il veut chercher une instance
function chargerUneClasse($classe) {
    require 'Core' . '.php'; 
}

spl_autoload_register('chargerUneClasse'); 