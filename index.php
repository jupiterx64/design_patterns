<?php

require __DIR__ . '/vendor/autoload.php';

#### BASICS ####
# Dependency inject -> very important one to know!

use DP\Basic\Driver;
use DP\Basic\ConcreteClasses\Audi;
use DP\Basic\ConcreteClasses\BMW;

$driver = new Driver(new Audi);
$driver->drive();

$driver = new Driver(new BMW);
$driver->drive();

#### END OF BASICS ####

#### ADAPTER ####
# Adapter adapts two incompatible interfaces!
# Adapter adapts "two things"

use DP\Adapter\ExternalLibraries\Facebook;
use DP\Adapter\Adapters\FacebookAdapter;

// Wrong approach!
// Do not directly call Facebook's methods/functions, call your own instead!
//
// $facebook = new Facebook;
// $facebook->makePost('some msg');

// The correct way
// Now we depend on our own Facebook class which is called FacebookAdapter
// So all changes should be done in OUR FacebookAdapter class
//
$facebook = new FacebookAdapter(new Facebook);
$facebook->myPost('some msg again');

#### END OF ADAPTER ####

#### BUILDER ####
# Builder hides complexity in creating objects!

use DP\Basic\Models\Patient;
use DP\Builder\Builders\PatientBuilder;

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
//
$data = [
    'name' => 'semir mahovkic',
    'email' => 's.m@gmail.com',
    'ssn' => '123123'
];
$patient = (new PatientBuilder)->build($data);
// OR
// $patient_builder = new PatientBuilder;
// $patient = $patient_builder->build($data);

### END OF BUILDER ####

#### DECORATOR ####
# If you need a custom/special version of an object
# Do not touch and the original class which is used all over the project!
# Create a decorator instead, and use it in those special cases!

use DP\Decorator\Shapes\Circle;
use DP\Decorator\Shapes\Rectangle;
use DP\Decorator\Decorators\CircleWithCustomBorder;

$normal_circle = new Circle;
$normal_circle->draw();

$normal_rectangle = new Rectangle;
$normal_rectangle->draw();

$special_version_of_circle = new CircleWithCustomBorder(new Circle);
$special_version_of_circle->draw();

#### END OF DECORATOR ####

#### FACADE ####
# Facade hides complexity just about anything!
# If something (some process) is a bit complicated, use facade to hide its complexity

use DP\Facade\Auth\Login;
use DP\Facade\Auth\Registration;
use DP\Facade\Facades\Auth;

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
//
Auth::register();
// Same class for login process
Auth::login();
// Same class for logout process
Auth::logout();

#### END OF FACADE ####

#### SINGLETON ####
# Single object, static object/instance, single instance
# Use it if you need only one instance of an object

use DP\Singleton\DB;

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
DB::instance()->query("select * from messages");

#### END OF SINGLETON ####
