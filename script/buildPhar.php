<?php

if (!file_exists('./config.ini')) {
    die("No configuration available. Please, create the config.ini file.\n");
}

$ini = parse_ini_file('config.ini');
if ($ini === null) {
    die("Couldn't read the config.ini file. Please, replace it and try again.\n");
}

if (!isset($ini['name'])) {
    die("Couldn't read the name of the extension in the config.ini file. Please, update it and try again.\n");
}
$name = $ini['name'];

$ini['build'] = (int) $ini['build']  + 1;
$ini['last_build'] = date('Y-m-d');

$begin = microtime(true);
if (file_exists("$name.phar")) {
    unlink("$name.phar");
}

shell_exec('rm -rf exakat');
mkdir('exakat', 0755);
mkdir('exakat/Exakat', 0755);

shell_exec('cp -r human exakat/human');
shell_exec('cp -r Analyzer exakat/Exakat/');
copy('README.md', 'exakat/Exakat/Analyzer/README.md');
copy('LICENCE.txt', 'exakat/Exakat/Analyzer/LICENCE.txt');
copy('script/stub.php', 'exakat/stub.php');
shell_exec('cp -r Reports exakat/Exakat/');

$iniFinal = <<<INI
name        = "$ini[name]"
version     = "$ini[version]"
build       = $ini[build]
last_build  = $ini[last_build]

INI;
file_put_contents('exakat/config.ini', $iniFinal);

$phar = new Phar("$name.phar", 0, "$name.phar");
$phar->buildFromDirectory('exakat');
$phar->setStub($phar->createDefaultStub('stub.php'));

print "Build $name.phar : ".filesize($name.'.phar')."o \n";
$end = microtime(true);
shell_exec('rm -rf exakat');

$iniFinal = <<<INI
name       = "$ini[name]"
version    = "$ini[version]"
build      = $ini[build]
last_build = $ini[last_build]
exakat_path = '$ini[exakat_path]';

INI;
file_put_contents('config.ini', $iniFinal);


print 'Done with version '.$ini['version'].' (Build '.$ini['build'].') in '.number_format(($end - $begin) * 1000, 2).' ms'.PHP_EOL;

?>