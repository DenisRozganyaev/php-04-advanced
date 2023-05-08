<?php

class CustomException extends Exception
{

}

class AnotherOneCustomException extends Exception
{}

class Test
{
    public function __construct(public string $text = '')
    {
        if (empty($text)) {
            throw new CustomException("The text is empty");
        }
        echo 'It works';
    }
}

$reflection = new ReflectionClass(Test::class);
dd($reflection->getMethods());

