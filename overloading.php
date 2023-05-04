<?php

class Student
{

    protected int $age;

    public function __construct(public string $name, public string $gender)
    {
    }

    public function __get($varName)
    {
        if (isset($this->$varName)) {
            return $this->$varName;
        }
    }

    public function __set($varName, $value)
    {
        if (property_exists($this, $varName)) {
            $this->$varName = $value;
        }
    }

    public function __call(string $name, array $arguments)
    {
        if (method_exists($this, $name)) {
            call_user_func_array([$this, $name], $arguments);
        }
    }

    public static function __callStatic(string $name, array $arguments)
    {
        if (method_exists(static::class, $name)) {
            call_user_func_array([static::class, $name], $arguments);
        }
    }

    protected static function test($name)
    {
        d("Hello {$name}");
    }
}

$student1 = new Student('Denys', 'male');
$student1->age = 50;
Student::test($student1->name);