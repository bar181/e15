<?php

echo "Hello Student class";


// class Student
// {
//     private $id;

//     public function __construct($id)
//     {
//         $this->id = $id;
//     }

//     public function getId()
//     {
//         return $id;
//     }
// }

// $student = new Student(99);
// $id = $student->getId();

// var_dump($id);


class Student
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}


$student = new Student(99);

var_dump($student);

echo "<br><br>";



// $id = $student->getId();


// var_dump($id);