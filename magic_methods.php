<?php

//class Connection
//{
//    protected $pdoObject;
//    private $dsn, $username, $password;
//
//    public function __construct($dsn, $username, $password)
//    {
//        $this->dsn = $dsn;
//        $this->username = $username;
//        $this->password = $password;
//        $this->connect();
//    }
//
//    private function connect()
//    {
//        $this->pdoObject = new PDO($this->dsn, $this->username, $this->password);
//    }
//
//    public function __sleep()
//    {
//        return array('dsn', 'username', 'password');
//    }
//
//    public function __wakeup()
//    {
//        $this->connect();
//    }
//}
//$connect = new Connection('mysql:host=db;dbname=test', 'root', 'secret');
//
//$serialized = serialize($connect);
//d($serialized);
//
//$unserialized = unserialize($serialized);
//
//dd($unserialized);
//
//class Test
//{
//    public string $text = 'test';
//
//    public function __sleep(): array
//    {
//        throw new Exception('Denied!');
//    }
//}
//
//class SerTest
//{
//    public Test $test;
//
//    public function __construct()
//    {
//        $this->test = new Test();
//    }
//}
//
//$serTest = new SerTest();
//
//$serTestString = serialize($serTest);
//dd(unserialize($serTestString));

//class User
//{
//    public string $email = 'user@email.com';
//    protected string $password = 'test1234';
//
//    public function __sleep(): array
//    {
//        return ['email', 'password'];
//    }
//
//    public function __serialize(): array
//    {
//        return [
//            'email' => $this->email,
//            'password' => password_hash($this->password, PASSWORD_BCRYPT)
//        ];
//    }
//
//    public function checkPass(string $pass)
//    {
//        return password_verify($pass, $this->password);
//    }
//}
//
//$user = new User();
//$serializedUser = serialize($user);
//d($serializedUser);
//d(unserialize($serializedUser));
//$newUser = unserialize($serializedUser);
//
//d($newUser->checkPass('test1234'));

//class ClassToString
//{
//    public function __toString(): string
//    {
//        return self::class;
//    }
//}
//
//$toStringObj = new ClassToString();
//echo $toStringObj;

//class Calc
//{
//    public function __invoke()
//    {
//        return $this->sayProcess();
//    }
//
//    protected function sayProcess():string
//    {
//        return 'sum smth';
//    }
//}
//
//$calc = new Calc();
//echo $calc();



