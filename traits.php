<?php

trait SimpleOperations
{
    protected function plus(float $a, float $b)
    {
        return $a + $b;
    }

    protected function minus(float $a, float $b)
    {
        return $a - $b;
    }
}

trait AdvancedOperations
{
    protected function division(float $a, float $b): float
    {
        if ($b == 0) {
            throw new DivisionByZeroError();
        }

        return $a / $b;
    }

    protected function plus(float $a, float $b): float
    {
        return $a * $b;
    }

}

abstract class Calculator
{
    public function operate(string $type, float $a, float $b): mixed
    {
        if (array_key_exists($type, $this->getTypes())) {
            $method = $this->getTypes()[$type];
            if (method_exists($this, $method)) {
                return call_user_func_array([$this, $method], [$a, $b]);
            }
        }

        return false;
    }

    abstract protected function getTypes(): array;
}

class SimpleCalc extends Calculator
{
    use SimpleOperations;

    protected function getTypes(): array
    {
        return [
            '+' => 'plus',
            '-' => 'minus'
        ];
    }
}

//$simpleCalc = new SimpleCalc();
//dd($simpleCalc->operate('+', 2, 2));

class AdvancedCalc extends Calculator
{
    use SimpleOperations, AdvancedOperations {
        SimpleOperations::plus insteadof AdvancedOperations;
        AdvancedOperations::plus as multiply;
    }

    protected function getTypes(): array
    {
        return [
            '+' => 'plus',
            '-' => 'minus',
            '/' => 'division',
            '*' => 'multiply'
        ];
    }
}

$simpleCalc = new AdvancedCalc();
d($simpleCalc->operate('/', 2, 4));
d($simpleCalc->operate('+', 2, 4));
d($simpleCalc->operate('*', 2, 4));
d($simpleCalc->operate('-', 2, 4));
class AnotherCalc extends Calculator
{

    protected function getTypes(): array
    {
        return [
        ];
    }
}
