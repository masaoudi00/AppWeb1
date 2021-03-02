<?php


require '../composer/vendor/autoload.php';


//use Logger;


Logger::configure('config.xml');


$logger = Logger::getLogger("default");


/*echo "Información:----"

echo "Warning:----"

echo "Error:----"

*/


$logger->info("This is an informational message.");
$logger->warn("I'm not feeling so good...");
$logger->fatal("I'm not feeling so good...");
$logger->error("I'm not feeling so good...");


?>
