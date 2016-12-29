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

use DP\Adapter\SimpleOne\ExternalLibraries\Facebook;
use DP\Adapter\SimpleOne\Adapters\FacebookAdapter;
use DP\Adapter\CompositionAdapter\Desktop;
use DP\Adapter\CompositionAdapter\Adapters\Mobile;
use DP\Adapter\CompositionAdapter\Adapters\MobileAdapter;

echo 'Adapter (simple):' . '<br>'. '<br>';

// Once facebook changes something, so it becomes no longer compatible to our application
// we need to adapt these changes in FacebookAdapter class
// Caution! Adapter with API changes should be used with caution! (it might not work as expected, depends on the API change)
$facebook = new FacebookAdapter(new Facebook);
$facebook->myPost('some msg again');

echo '<br>'. '<br>';

echo 'Adapter (composition):' . '<br>'. '<br>';

$desktop = new Desktop;
$desktop->formatCss();
$desktop->horizontalLayout();

$mobileAdapter = new MobileAdapter(new Mobile);
$mobileAdapter->formatCss();
$mobileAdapter->horizontalLayout(); // thanks to adapter we can call this function, which then calls verticalLayout() instead

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

use DP\Decorator\ExampleOne\Shapes\Circle;
use DP\Decorator\ExampleOne\Shapes\Rectangle;
use DP\Decorator\ExampleOne\Decorators\CircleWithCustomBorder;
use DP\Decorator\ExampleTwo\RegularSector;
use DP\Decorator\ExampleTwo\CustomSector1;

echo 'Decorator (ExampleOne):' . '<br>'. '<br>';

$normal_circle = new Circle;
$normal_circle->draw();

echo '<br>';

$normal_rectangle = new Rectangle;
$normal_rectangle->draw();

echo '<br>';

$special_version_of_circle = new CircleWithCustomBorder(new Circle);
$special_version_of_circle->draw();

echo '<br>' . '<br>';

echo 'Decorator (ExampleTwo):' . '<br>'. '<br>';

$regularSector = new RegularSector;
echo 'Sector: ' . $regularSector->getSector() . ' Name: ' . $regularSector->getName() . '<br>';

$customSector = new CustomSector1(new RegularSector);
echo 'Sector: ' . $customSector->getSector() . ' Name: ' . $customSector->getName() . '<br>';

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

#### TEMPLATE ####
# eBook, OReilly Learning PHP Design Patterns, quote:
# "Perhaps a better way of thinking about the Hollywood Principle is in terms of teacherstudent relations in a
# kindergarten class—the Kindergarten Principle. The teacher sets up a number of projects for the kids to
# carry out in a certain order—counting, telling time, vocabulary. The teacher sets the order,
# but the way it is actually carried out, or implemented by the kids depends on the kids.
#  However, the kids cannot change the order set up by the teacher.
#  In other words, a kid cannot say in the middle of a counting exercise, “I want to do vocabulary now.” "
#
#  Parent (abstract class) establishes the operations and sets their order, and the child class implements the operations.
#  “Don’t call us; we’ll call you”

use DP\Template\SpecificImplWatermark;

echo 'Template:' . '<br>'. '<br>';

$watermarkCreator = new SpecificImplWatermark;
$watermarkCreator->createWatermark('www.someurl.com', 'Copyrights by');

echo '<hr>';
#### END OF TEMPLATE

#### STATE ####
# eBook, OReilly Learning PHP Design Patterns, quote:
# The Context instantiates instances of all states and sets the default state.
# It has methods to trigger different states by calling the parallel methods in the concrete states.
# Triggers are called to initiate a transition from the current state to a different state
# A setter method keeps track of which state is the current one.
#
# To help keep track of the current state, Context has getters for each state when calls for changes in state occur.
# Imagine a 3x3 matrix, and, if the current state is Cell 4, the system needs to know the available
# transitions to other states. This is the job of the Context class.
#
# The most important role for the Context class is to keep track of the current state
#
# The Client makes all requests through the Context.
# There is absolutely no direct connection between the Client and any of the state classes, including the IState interface.

use DP\State\ExampleOne\Context as ContextOne;
use DP\State\ExampleTwo\Context as ContextTwo;

echo 'State (ExampleOne):' . '<br>'. '<br>';

$contextOne = new ContextOne;
$contextOne->turnOnLight();
$contextOne->turnOnLight();
$contextOne->turnOffLight();
$contextOne->turnOffLight();

echo '<br>'. '<br>';

echo 'State (ExampleTwo, more states):' . '<br>'. '<br>';

$contextTwo = new contextTwo;
$contextTwo->turnOnLight();
$contextTwo->turnOnLight();
$contextTwo->turnOffLight();
$contextTwo->turnBrightest();
$contextTwo->turnBrighter();
$contextTwo->turnOnLight();
$contextTwo->turnOffLight();
$contextTwo->turnBrightest();
$contextTwo->turnOffLight();

echo '<hr>';
#### END OF STATE ####
