
 <!-- simple callback function. -->
 <!-- static class callback function. -->
 <!-- Object method callback function, __invoke. -->
 <!-- Callback using a Closure // Anonymes function callback (diract). -->

<?php

// simple callback
function my_callback_function()
{
    echo " Hello from the callback function. <br/>";
}
call_user_func('my_callback_function');




// Static class method call: 
// If we need to callback a function in a class, this is the way to go. However, the callback function must be static, else PHP will return an error.
class main
{
    static function mycallbackFunction()
    {
        echo "Hello from the static class callback function. <br/>";
    }
}
call_user_func(array('main', 'mycallbackFunction'));
//syntax is used because PHP needs to know both:
// The object instance ($obj)
// The method name ('mycallbackFunction2')
// The array format tells PHP:
// First element: Which object to use
// Second element: Which method to call on that object
// This is necessary because when calling object methods dynamically, PHP needs both pieces of information to properly locate and execute the method. It's similar to doing $obj->mycallbackFunction2() but in 


call_user_func('main::mycallbackFunction');




// Object method callback
class main2
{
    function mycallbackFunction2() // here static in optional.
    {
        echo "Hello from the object method callback. <br/>";
    }
     function mycallbackFunction21($name) // here static in optional.
    {
        echo "Hello from the object method callback 21, my name is: " . $name . "<br/>";
    }
}
$obj = new main2();
call_user_func(array($obj, 'mycallbackFunction2'));
call_user_func(array($obj, 'mycallbackFunction21'), 'Madhav');

// with the __Invoke function: In the __Invoke function we have to pass only the object of that class and we get the result no need to make an `array($obj, "mycallbackfunction")`;
// At the time of pass the object of the class in the call_user_function(), __invoke was autometically call them self if there are no arguments. 
class main3
{
    function mycallbackFunction2() // here static in optional because we create a object.
    {
        echo "Hello from the object method callback but in the main3 class . <br/>";
    }

    function __invoke($name) // static is optional.
    {
        echo "Hello from __invoke and my name is: " . $name . "<br/>";
    }
}
$obj2 = new main3();
// call_user_func($obj2, 'Madhav');
$obj2('Madhav');




// Callback using a Closure
$number = function ($num) {
    echo $num ** 2 . ",";
};
$range = range(1, 10);

$squre = array_map($number, $range);
print implode('', $squre);

$name = function ($data) {
    echo "<br/> hello from the another closure function callback, My name is : " . $data;
};

$name('Madhav');



// $string_array = array(10, 4, 7);
