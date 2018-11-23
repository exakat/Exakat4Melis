<?php

namespace Test\Melis;

use Test\Analyzer;

include 'Test/Analyzer.php';

class RouteConstraints extends Analyzer {
    /* 2 methods */

    public function testMelis_RouteConstraints01()  { $this->generic_test('Melis/RouteConstraints.01'); }
    public function testMelis_RouteConstraints02()  { $this->generic_test('Melis/RouteConstraints.02'); }
}
?>