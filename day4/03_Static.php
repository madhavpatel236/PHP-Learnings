<!-- Static function: We can access static method anywhere -->

<?php
// class A
// {
//     public static function greeting()
//     {
//         echo "Hello Everyone from the static function inside the parent class->function.";
//     }
// }
// class B
// {
//     public function message()
//     {
//         A::greeting(); // here we can directlly access the Static function which is present at the another class without using the abstract method or interface  
//     }
// }
// $obj = new B();
// $obj->message();
//  A :: greeting(); // Here we directlly access the static method without making the object of that class. 



// Static Properties 
class PI
{
    public static $pi = 3.14;
}

class C extends PI
{
    public function show()
    {
        return parent::$pi; // Here we use the parent class Static keyword with the help of the abstract method so we use the 'parent::'  .
    }
}

echo C :: $pi; // here we extract the static variable from the parent class to the child class directly.
echo "<br>";



?>
