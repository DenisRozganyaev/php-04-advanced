<?php

class CustomException extends Exception
{

}

class AnotherOneCustomException extends Exception
{}

class SaySmthException extends Exception
{}

class SaySmthLibrary
{
    public static function saySmth()
    {
        //..
        throw new Exception("Error");
    }
}

class Test
{
    public function __construct(public string $text = '')
    {
        if (empty($text)) {
            throw new CustomException("The text is empty");
        }
        echo 'It works<br>';
    }

    public function saySmth()
    {
        try {
            SaySmthLibrary::saySmth();
        } catch (SaySmthException $exception) {
            echo __METHOD__ . " <br>";
            echo "SaySmthException catch <br>";
            var_dump($exception->getMessage());
        }
    }
}

try {
    $test = new Test('some text');

    //....

    $test->saySmth();

    echo 'continue <br>';
    ///.....

} catch (CustomException $exception) {
    echo "CustomException <br>";
    var_dump($exception->getMessage());
} catch (AnotherOneCustomException $exception) {
    echo "AnotherOneCustomException <br>";
    var_dump($exception->getMessage());
} catch (Exception $exception) {
    echo "Exception <br>";
    var_dump($exception->getMessage());
}

