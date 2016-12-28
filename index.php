<?php

require __DIR__ . '/vendor/autoload.php';

#### BASICS ####
# Dependency inject -> very important one to know!

use DP\Basic\Driver;
use DP\Basic\ConcreteClasses\Audi;
use DP\Basic\ConcreteClasses\BMW;

echo 'Dependency injection:' . '<br>'. '<br>';

$driver = new Driver(new Audi);
$driver->drive();

echo '<br>';

$driver = new Driver(new BMW);
$driver->drive();

echo '<hr>';
#### END OF BASICS ####

#### ADAPTER ####
# Adapter adapts two incompatible interfaces!
# Adapter adapts "two things"

use DP\Adapter\ExternalLibraries\Facebook;
use DP\Adapter\Adapters\FacebookAdapter;

echo 'Adapter:' . '<br>'. '<br>';

// Wrong approach!
// Even you can, you should not directly call Facebook's methods/functions, call our own instead!
//
// $facebook = new Facebook;
// $facebook->makePost('some msg');

// Once facebook changes something, so it becomes no longer compatible to our application
// we need to adapt these changes in FacebookAdapter class
$facebook = new FacebookAdapter(new Facebook);
$facebook->myPost('some msg again');

echo '<hr>';
#### END OF ADAPTER ####

#### BUILDER ####
# Builder hides complexity in creating objects!

use DP\Basic\Models\Patient;
use DP\Builder\Builders\PatientBuilder;

echo 'Builder:' . '<br>'. '<br>';

// Wrong approach!
// It doesnt look really well, it's all messy, it looks ugly
//
// $patient = new Patient;
// $patient->setName('semir mahovkic');
// $patient->setEmail('s.m@gmail.com');
// $patient->doSomeExtraWorkBeforeSSN();
// // do some extra stuff...
// // prepareArchive();
// // haveADinner();
// // doThis();
// // doThat();
// $patient->setSSN('123123');
// var_dump($patient);

// The correct way!
// Data to build Patient object should be adapted to your needs
// This data could come/arrive from any source/destination (depends on the situation!)

$data = [
    'name' => 'semir mahovkic',
    'email' => 's.m@gmail.com',
    'ssn' => '123123'
];

$patient = (new PatientBuilder)->build($data);
var_dump($patient);

// OR
// $patient_builder = new PatientBuilder;
// $patient = $patient_builder->build($data);

echo '<hr>';
### END OF BUILDER ####

#### DECORATOR ####
# If you need a custom/special version of an object
# Do not touch and the original class which is used all over the project!
# Create a decorator instead, and use it in those special cases!

use DP\Decorator\Shapes\Circle;
use DP\Decorator\Shapes\Rectangle;
use DP\Decorator\Decorators\CircleWithCustomBorder;

echo 'Decorator:' . '<br>'. '<br>';

$normal_circle = new Circle;
$normal_circle->draw();

echo '<br>';

$normal_rectangle = new Rectangle;
$normal_rectangle->draw();

echo '<br>';

$special_version_of_circle = new CircleWithCustomBorder(new Circle);
$special_version_of_circle->draw();

echo '<hr>';
#### END OF DECORATOR ####

#### FACADE ####
# Facade hides complexity just about anything!
# If something (some process) is a bit complicated, use facade to hide its complexity

use DP\Facade\Auth\Login;
use DP\Facade\Auth\Registration;
use DP\Facade\Facades\Auth;

echo 'Facade:' . '<br>'. '<br>';

// Wrong approach!
// It looks ugly to call all these methods to register an account
// The process is long, it requires you to call 3 methods!
//
// $registration = new Registration;
// $registration->registerFirstStep();
// $registration->additionalStepRequired();
// $registration->finalStepRequired();
// some additional work might be required as well...

// The correct way!
// Call the facade DP\Facade\Facades\Auth so it looks better and simpler
// Class DP\Facade\Facades\Auth should contain the complex logic!

Auth::register();
echo '<br>';
// Same class for login process
Auth::login();
echo '<br>';
// Same class for logout process
Auth::logout();

echo '<hr>';
#### END OF FACADE ####

#### SINGLETON ####
# Single object, static object/instance, single instance
# Use it if you need only one instance of an object
# Since this is PHP and it belongs to Web world, Database example is probably not the best example,
# because new instances are quite often created, per request

use DP\Singleton\DB;

echo 'Singleton:' . '<br>'. '<br>';

// Wrong approach!
// Do not create database connection more than once!
//
// $db_connection = new DB;
// $db_connection->query("select * from users");

// Say we need to send new query
// $db_connection = new DB;
// $db_connection->query("select * from messages");

// The correct way!
// Re-use the DB object!
//
DB::instance()->query("select * from users");
echo '<br>';
DB::instance()->query("select * from messages");

echo '<hr>';
#### END OF SINGLETON ####

#### FACTORY METHDO ####
# eBook, OReilly Learning PHP Design Patterns, quote:
# "Imagine that you want to order chocolate cupcakes with black and orange frosting for a Halloween party.
# You call the baker (creator) who then makes the cupcakes (product) for you.
# You are not involved with the creation of the object that you requested but you still get the cupcakes requested."

use DP\FactoryMethod\Regular\Factory\BreadFactory;
use DP\FactoryMethod\Regular\Factory\DonutFactory;
use DP\FactoryMethod\ParameterizedFactory\Factory\BakerFactory;
use DP\FactoryMethod\ParameterizedFactory\Products\Bread;
use DP\FactoryMethod\ParameterizedFactory\Products\Donut;

echo 'Factory (regular):' . '<br>'. '<br>';

$breadFactory = new BreadFactory();
$breadFactory->bake();

echo '<br>';

$donutFactory = new DonutFactory();
$donutFactory->bake();

echo '<br>'. '<br>';

echo 'Factory (more "global", parameterized, let the client choose):' . '<br>'. '<br>';

$bakerFactory = new BakerFactory();

$bakerFactory->bake(new Bread);
$bakerFactory->bake(new Donut);

echo '<hr>';
#### END OF FACTORY METHOD ####

#### PROTOTYPE ####
# eBook, OReilly Learning PHP Design Patterns, quote:
# "The Prototype design pattern is interesting in its use of a cloning technique to replicate instantiated objects"
# Create prototype, basic object setup, setup that works in most situations
# and clone it once it's needed to create some "special cases"
# Clones DO NOT call constructors, ever.

use DP\Prototype\ConcretePrototype1;

echo 'Prototype:' . '<br>'. '<br>';

$original = new ConcretePrototype1;
$original->displayName();

$copy = clone $original;
$copy->displayName(); // still keeps the original value! until we change it
$copy->name = 'Changed to copy name'; // should use getters/setters instead of direct access!
$copy->displayName();

echo '<hr>';
#### END OF PROTOTYPE
