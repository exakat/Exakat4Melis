<?php

namespace Test\Melis;

use Test\Analyzer;

include 'Test/Analyzer.php';

class CheckRegex extends Analyzer {
    /* 2 methods */

    public function testMelis_CheckRegex01()  { $this->generic_test('Melis/CheckRegex.01'); }
    public function testMelis_CheckRegex02()  { $this->generic_test('Melis/CheckRegex.02'); }
}
?>