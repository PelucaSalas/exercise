<?php

namespace App\Tests\Domain\Entity;

use App\Domain\Entity\example;
use PHPUnit\Framework\TestCase;

class exampleTest extends TestCase
{
    public function testExample()
    {
        $a = new example();
        $this->assertEquals('a', $a->exampleMethod());
    }

    /**
     * @dataProvider exampleProvider
     */
    public function testExampleProvider($caracter, $expected)
    {
        $a = new example();
        $this->assertEquals($expected, $a->exampleProvider($caracter));
    }


    public function exampleProvider(): array
    {
        return [
            'a caracter' => ['a','a'],
            'b caracter' => ['b','b']
        ];
    }
}