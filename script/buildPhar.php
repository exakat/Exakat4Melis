<?php

$begin = microtime(true);

function build_ext($name) {
//    if (!file_exists($name)) { print "No such directory : '$name'. Aborting\n"; return; }
//    if (!is_dir($name)) { print "Not a directory : '$name'. Aborting\n"; return ; }

    // create with alias "project.phar"
    if (file_exists("$name.phar")) {
        unlink("$name.phar");
    }

    shell_exec('rm -rf exakat');
    mkdir('exakat', 0755);
    mkdir('exakat/Exakat', 0755);
    
    shell_exec('cp -r human exakat/human');
    shell_exec('cp -r Analyzer exakat/Exakat/');
    copy('analyzers.ini', 'exakat/Exakat/Analyzer/analyzers.ini');
    shell_exec('cp -r Reports exakat/Exakat/');

    $phar = new Phar("$name.phar", 0, "$name.phar");
    $phar->buildFromDirectory('exakat');
    /*
    
    TODO : set a stub for avoiding direct call
    $stub = <<<'PHP'
    #!/usr/bin/env php
    <?php
    Phar::mapPhar();
    include 'phar://exakat.phar/exakat';
    __HALT_COMPILER();
    PHP;
    $phar->setStub($stub);
    */
    print "Build $name.phar : ".filesize($name.'.phar')."o \n";
    
    shell_exec('rm -rf extract');
    $phar2 = new phar("$name.phar");
    $phar2->extractTo('extract');
    print "phar://".dirname(__DIR__)."/Melis.phar/Exakat/Analyzer/$name/{$name}Usage.php";
    var_dump(file_exists("phar://".dirname(__DIR__)."/Melis.phar/Exakat/Analyzer/$name/{$name}Usage.php"));
    var_dump(file_exists("phar://".dirname(__DIR__)."/Melis.phar/Exakat/Analyzer/$name/MissingLanguage.php"));
}

build_ext('Melis');

$end = microtime(true);
print 'Done ('.number_format(($end - $begin) * 1000, 2).' ms)'.PHP_EOL;

?>