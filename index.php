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

#### BUILDER ####
# Builder hides complexity in creating objects!

use DP\Creational\Basic\Models\Patient;
use DP\Creational\Builder\Builders\PatientBuilder;

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

use DP\Structural\Decorator\ExampleOne\Shapes\Circle;
use DP\Structural\Decorator\ExampleOne\Shapes\Rectangle;
use DP\Structural\Decorator\ExampleOne\Decorators\CircleWithCustomBorder;
use DP\Structural\Decorator\ExampleTwo\RegularSector;
use DP\Structural\Decorator\ExampleTwo\CustomSector1;

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

use DP\Structural\Facade\Auth\Login;
use DP\Structural\Facade\Auth\Registration;
use DP\Structural\Facade\Facades\Auth;

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

use DP\Creational\Singleton\DB;

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

#### ADAPTER ####
# Adapter adapts two incompatible interfaces!
# Adapter adapts "two things"

use DP\Structural\Adapter\SimpleOne\ExternalLibraries\Facebook;
use DP\Structural\Adapter\SimpleOne\Adapters\FacebookAdapter;
use DP\Structural\Adapter\CompositionAdapter\Desktop;
use DP\Structural\Adapter\CompositionAdapter\Adapters\Mobile;
use DP\Structural\Adapter\CompositionAdapter\Adapters\MobileAdapter;

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

#### FACTORY METHDO ####
# eBook, OReilly Learning PHP Design Patterns, quote:
# "Imagine that you want to order chocolate cupcakes with black and orange frosting for a Halloween party.
# You call the baker (creator) who then makes the cupcakes (product) for you.
# You are not involved with the creation of the object that you requested but you still get the cupcakes requested."

use DP\Creational\FactoryMethod\Regular\Factory\BreadFactory;
use DP\Creational\FactoryMethod\Regular\Factory\DonutFactory;
use DP\Creational\FactoryMethod\ParameterizedFactory\Factory\BakerFactory;
use DP\Creational\FactoryMethod\ParameterizedFactory\Products\Bread;
use DP\Creational\FactoryMethod\ParameterizedFactory\Products\Donut;

echo 'Factory method:' . '<br>'. '<br>';

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

use DP\Creational\Prototype\ConcretePrototype1;

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

use DP\Behavioral\Template\SpecificImplWatermark;

echo 'Template:' . '<br>'. '<br>';

$watermarkCreator = new SpecificImplWatermark;
$watermarkCreator->createWatermark('www.someurl.com', 'Copyrights by');

echo '<hr>';
#### END OF TEMPLATE

#### CHAIN OF RESPONSIBILITY ####
# eBook, OReilly Learning PHP Design Patterns, quote:
# The Request class provides an object that can be passed along the chain with a method for retrieving the request.
# If the $handle variable (concrete handler pre-defined) matches the $request passed from the Client (via the Request helper),
# the query is handled by the concrete handler. Otherwise, it passes the request to the successor in the chain.
#
# When one object/process can be handled by many handlers, but each time it's a different handler but you are not sure which one
# Request A might and should be handled by Handler A, but request C should be handled by Handler C or D...
# Like a chained big switch...case statement

use DP\Behavioral\ChainOfResponsibility\Request;
use DP\Behavioral\ChainOfResponsibility\Handlers\H1;
use DP\Behavioral\ChainOfResponsibility\Handlers\H2;
use DP\Behavioral\ChainOfResponsibility\Handlers\H3;

echo 'Chain of responsibility:' . '<br>'. '<br>';

$clientInput = 'H2';
$h1 = new H1;
$h2 = new H2;
$h3 = new H3;

$h1->nextHandler($h2);
$h2->nextHandler($h3);

$loaded = new Request($clientInput);
$h1->handle($loaded);

echo '<hr>';
#### END OF CHAIN OF RESPONSIBILITY ####

### STRATEGY ####
# eBook, OReilly Learning PHP Design Patterns, quote:
# Each of the concrete strategies is encapsulated so that any changes will not crash the system.
#
# The Client class makes requests through the Context, creating a concrete strategy.
# The request for the different strategies is accomplished with a set of methods.
# The following two lines are key in the request:
# $context=new Context(new ConcreteStrategy());
# $context->algorithm();
#
# The Gang of Four specify the following characteristics:
# • It is configured with a concrete strategy object.
# • It maintains a reference to a Strategy object.
# • It may define an interface that lets the Strategy access its data.

use DP\Behavioral\Strategy\Context;
use DP\Behavioral\Strategy\Strategies\Insert;
use DP\Behavioral\Strategy\Strategies\Update;
use DP\Behavioral\Strategy\Strategies\Delete;
use DP\Behavioral\Strategy\Strategies\Get;

echo 'Strategy:' . '<br>'. '<br>';

$context = new Context(new Insert);
$context->apply();

$context = new Context(new Update);
$context->apply();

$context = new Context;
$context->setStrategy(new Delete);
$context->apply();

$contextWithoutStrategy = new Context;
$contextWithoutStrategy->apply();
$contextWithoutStrategy->setStrategy(new Get);
$contextWithoutStrategy->apply();

echo '<hr>';
### END OF STRATEGY ####

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

use DP\Behavioral\State\ExampleOne\Context as ContextOne;
use DP\Behavioral\State\ExampleTwo\Context as ContextTwo;

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

#### OBSERVER ####
# Observers are those who need to get notified about changes!
# Subjects are those who make changes!
# Whenever subject (owner) makes a change, inform all of its observers (listeners, subscribers)
#
# Defines a one-to-many dependency between objects so that when one object changes state,
# all its dependents are notified and updated automatically.
#
# One class (Subject), do changes to all other classes (observers), one-to-many

use DP\Behavioral\Observer\Subjects\CompanyA;
use DP\Behavioral\Observer\Observers\CustomerA;
use DP\Behavioral\Observer\Observers\CustomerB;

echo 'Observer:' . '<br>'. '<br>';

// create a company so we can assign customers to it
$companyA = new CompanyA;
// create customers
$customerA = new CustomerA;
$customerB = new CustomerB;

// assign customers to company, or those who needs to receive newest update!
$companyA->attach($customerA);
$companyA->attach($customerB);

echo 'CustomerA current price ' . $customerA->getPrice() . '<br>';
echo 'CustomerB current price ' . $customerB->getPrice() . '<br>';

// company changes price, and it automatically changes for all observers/subscribers/listeners
// but we will detach $customerB so it doesnt get these changes
$companyA->detach($customerB);
$companyA->setPrice(2);
echo 'CustomerA price after change ' . $customerA->getPrice() . '<br>';
echo 'CustomerB price after change ' . $customerB->getPrice() . '<br>';

echo '<hr>';
#### END OF OBSERVER ####

#### MEDIATOR ####
# Define an object that encapsulates how a set of objects interact.
# Mediator promotes loose coupling by keeping objects from referring to each other explicitly,
# and it lets you vary their interaction independently.
#
# Like a hub, many classes/objects communicate between each other through this hub (or many hubs)
# Chatroom could be an example
# Person A sends message to Person B through chatroom, so the chatroom decides which object will call receive() function

use DP\Behavioral\Mediator\ExampleOne\Chatroom;
use DP\Behavioral\Mediator\ExampleOne\Participant;

echo 'Mediator:' . '<br>'. '<br>';

$chatroom = new Chatroom;

$john = new Participant('john');
$paul = new Participant('paul');
$mike = new Participant('mike');

$chatroom->register($john);
$chatroom->register($paul);
$chatroom->register($mike);

$john->send('paul', 'Hello paul, john here.');
$john->send('mike', 'Hello mike, john here.');
$mike->send('john', 'Hello john, mike here.');

echo '<hr>';
#### END OF MEDIATOR ####

#### COMMAND ####
# eBook, Head First Design Patterns, source.
# OO design pattern that allows us to separate an object making a request
# from the objects that receive and execute those requests.
#
# Create specific command (TurnLighOnCommand) which is going to be called on a given object/receiver (Light, Room, Garage...),
# so each command needs an instance (receiver) which holds the logic for the given command.
# Create receiver which holds the logic (in functions) for a specific command
# Create invoker which is going to set specific command and call it (RemoteController or LightSwitcher), the executing/worker class
#
# Commands: LightOnCommand, OpenGarageDoorCommand...
# Receivers: Room, Garage
# Invoker: RemoteController
# It ends up like: Turn the LIGHT ON in the ROOM with REMOTE_CONTROLLER
# So the invoker will call specific functions from receivers through command
# In other words, use class (LightOnCommand::execute()) to execute function from another class (Room::something())
#
# Receivers can execute different Commands (these are different functions that correspond to different classes/commands)
# Commands will call receivers' functions that correspond to the command
# Invoker runs it all (set command for a receiver and execute it)
#
# Quoting, yshavit from stackoverflow:
# "The general pattern here is that you've got one piece of the code responsible for
# figuring out that some action needs to be taken without knowing what that action is,
# and another piece of the code knows how to do an action but not when to do it."
#
# Quoting, holroy from stackoverflow:
# "In most programming, you'll want to hide away implementation so that when looking at the top-most problem,
# it consists of a comprehensible subset of commands/code.
# I.e. You don't need/want to know the gory details of how a light is switched on, or a car is started.
# If your focus is to get the car started, you don't need to understand how the engine works,
# and how it needs fuel to enter the engine, how the valves work, ..."
#
# http://stackoverflow.com/questions/32597736/why-should-i-use-the-command-design-pattern-while-i-can-easily-call-required-met#32606086

use DP\Behavioral\Command\ExampleOne\RemoteController;
use DP\Behavioral\Command\ExampleOne\Room;
use DP\Behavioral\Command\ExampleOne\LightOnCommand;
use DP\Behavioral\Command\ExampleOne\LightOffCommand;
use DP\Behavioral\Command\ExampleTwo\RemoteController as RCTwo;
use DP\Behavioral\Command\ExampleTwo\Room as RTwo;
use DP\Behavioral\Command\ExampleTwo\LightOnCommand as LOnTwo;
use DP\Behavioral\Command\ExampleTwo\LightOffCommand as LOffTwo;

echo 'Command (ExampleOne):' . '<br>'. '<br>';

// invoker to execute specific commands on a given receiver
$remoteController = new RemoteController;
// receiver, which is binded to the command at some point
$room = new Room;
// commands, bind receiver and commands
$lightOnCommand = new LightOnCommand($room);
$lightOffCommand = new LightOffCommand($room);

// set command to execute
$remoteController->setCommand($lightOnCommand);
$remoteController->executeCommand();
$remoteController->setCommand($lightOffCommand);
$remoteController->executeCommand();
$remoteController->setCommand($lightOnCommand);
$remoteController->executeCommand();

echo '<br>'. '<br>' . 'Command (ExampleTwo):' . '<br>'. '<br>';

// invoker to execute specific commands on a given receiver
$remoteController = new RCTwo;
// receiver, which is binded to the command at some point
$room = new RTwo;
// commands, bind receiver and commands
$lightOnCommand = new LOnTwo($room);
$lightOffCommand = new LOffTwo($room);

// set command to execute
$remoteController->setCommand($lightOnCommand);
$remoteController->executeCommand();
$remoteController->undoCommand();
$remoteController->setCommand($lightOffCommand);
$remoteController->executeCommand();
$remoteController->undoCommand();
$remoteController->setCommand($lightOnCommand);
$remoteController->executeCommand();

echo '<hr>';
#### END OF COMMAND ####

#### VISITOR ####
# Quoting GoF:
# "Allows for one or more operation to be applied to a set of objects at runtime,
# decoupling the operations from the object structure"
#
# Add functionality to classes without changing the original structure (can be done at runetime)
# Move some logic from functions to a class
#
# Each specific visitor holds the logic to compute for each specific element/class
# Each specific element/class calls the method from visitor to compute the logic
# Visitor usually replaces element's/class's function logic with class (visitor itself) (so move logic from function to class)
#
# Say we have collection of items, and want to perform some operations on all of them,
# but the items do not have to be of the same type! 

use DP\Behavioral\Visitor\Tax\AddTaxVisitor;
use DP\Behavioral\Visitor\Wrap\WrapVisitor;
use DP\Behavioral\Visitor\Visitables\Bread as BreadElement;
use DP\Behavioral\Visitor\Visitables\Milk as MilkElement;

echo 'Visitor:' . '<br>'. '<br>';

$addTax = new AddTaxVisitor;
$wrap = new WrapVisitor;
$bread = new BreadElement;
$milk = new MilkElement;

echo 'Original bread price: ' . $bread->getPrice() . '<br>';
echo 'Original milk price: ' . $milk->getPrice() . '<br>';

$bread->processTaxing($addTax);
$milk->processTaxing($addTax);

echo 'After taxing bread price: ' . $bread->getPrice() . '<br>';
echo 'After taxing milk price: ' . $milk->getPrice() . '<br>';

echo '<br>';

echo 'Original bread wrap: ' . $bread->getWrap() . '<br>';
echo 'Original milk wrap: ' . $milk->getWrap() . '<br>';

$bread->wrap($wrap);
$milk->wrap($wrap);

echo 'After wrapping bread: ' . $bread->getWrap() . '<br>';
echo 'After wrapping milk: ' . $milk->getWrap() . '<br>';

echo '<hr>';
#### END OF VISITOR ####
