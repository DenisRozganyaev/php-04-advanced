<?php

abstract class TestAbstract
{
    public int $speed;

    abstract public function someTest();
}

class ChildTest extends TestAbstract
{
    public function someTest()
    {
        // TODO: Implement someTest() method.
    }
}

function testAbstract(TestAbstract $test)
{
    $test->someTest();
}
$childTest = new ChildTest();
testAbstract($childTest);

interface TestContract
{
    public function testA();
    public function testB();
}
interface Test2Contract extends TestContract
{
    public function testC();
}

class InterfaceTest implements Test2Contract
{

    public function testA()
    {
        // TODO: Implement testA() method.
    }

    public function testB()
    {
        // TODO: Implement testB() method.
    }

    public function testC()
    {
        // TODO: Implement testC() method.
    }
}

class SecondInterfaceTest implements TestContract
{

    public function testA()
    {
        // TODO: Implement testA() method.
    }

    public function testB()
    {
        // TODO: Implement testB() method.
    }
}

function testInterfaces(TestContract $test)
{
    $test->testA();
    $test->testB();
}

function testInterfaces2(Test2Contract $test)
{
    $test->testC();
}

$childTest = new SecondInterfaceTest();
testInterfaces($childTest);

$childTest = new InterfaceTest();
testInterfaces($childTest);
testInterfaces2($childTest);