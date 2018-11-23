<?php

namespace Test\Melis;

use Test\Analyzer;

include 'Test/Analyzer.php';

class MissingLanguage extends Analyzer {
    /* 2 methods */

    public function testMelis_MissingLanguage01()  { $this->generic_test('Melis/MissingLanguage.01'); }
    public function testMelis_MissingLanguage02()  { $this->generic_test('Melis/MissingLanguage.02'); }
}
?>