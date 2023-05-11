<?php

interface Engine
{
    public function start();
}

class CombustionEngine implements Engine
{

    public function start()
    {
        d("Start on patrol");
    }
}

class ElectroEngine implements Engine
{

    public function start()
    {
        d("Start on electricity");
    }
}

interface Driver
{
    public function drive();
}

class ManualDriver implements Driver
{
    public function drive()
    {
        d("Drive manually");
    }
}

class AutoPilot implements Driver
{
    public function drive()
    {
        d("Drive by autopilot");
    }
}

class Transport
{
    public function __construct(protected Engine $engine, protected Driver $driver)
    {
    }

    public function travel()
    {
        $this->engine->start();
        $this->driver->drive();
    }
}

$car = new Transport(new ElectroEngine(), new AutoPilot());
$car->travel();
$truck = new Transport(new CombustionEngine(), new ManualDriver());
$truck->travel();
