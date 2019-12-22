<?php

function controllers_autoload($classname){
    include 'controllers/' . $classname . '.php';       
}                                                       

spl_autoload_register('controllers_autoload');	//entra a la carpeta controllers y hace un include de cada uno de los controladores