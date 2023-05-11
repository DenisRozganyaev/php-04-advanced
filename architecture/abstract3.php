<?php

interface Employee
{
    public function doWork();
}

class Designer implements Employee
{
    public function doWork()
    {
        echo 'do design <br>';
    }
}
class Developer implements Employee
{
    public function doWork()
    {
        echo 'write code <br>';
    }
}
class Tester implements Employee
{
    public function doWork()
    {
        echo 'test app <br>';
    }
}

class Artist implements Employee
{
    public function doWork()
    {
        echo 'make art <br>';
    }
}

class SoundProducer implements Employee
{
    public function doWork()
    {
        echo 'make sound <br>';
    }
}

abstract class Company
{
    protected array $employees = [];

    abstract protected function getEmployees(): array;

    public function createSoftware()
    {
        /** @var Employee $employee */
        foreach($this->getEmployees() as $employee) {
            $employee->doWork();
        }
    }
}

class Startup extends Company
{

    protected function getEmployees(): array
    {
        return [
            new Developer(),
            new Developer(),
            new Developer(),
            new Developer(),
            new Tester(),
            new Tester(),
        ];
    }
}


class GameCompany extends Company
{

    protected function getEmployees(): array
    {
        return [
            new Designer(),
            new Artist(),
            new SoundProducer(),
            new Developer(),
            new Developer(),
            new Tester(),
            new Tester(),
        ];
    }
}

$startup = new Startup();
$startup->createSoftware();

d('');

$game = new GameCompany();
$game->createSoftware();
