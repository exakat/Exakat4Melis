<?php

if (isset($argv[1]) && ($argv[1] == '-json')) {
    $ini = parse_ini_file(__DIR__.'/config.ini');
    
    print json_encode($ini);
} else {
    print "I am an Exakat extension. Please, drop in in the 'ext' folder of your Exakat installation. Get more help at https://www.exakat.io/. \n";
}

?>