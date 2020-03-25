<?php

function chargerUneClasse($classe) {
    require 'Core' . '.php'; 
}
spl_autoload_register('chargerUneClasse'); 