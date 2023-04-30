<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
//require_once '/path/to/vendor/autoload.php';
require_once 'C:\xampp\htdocs\appmessages\vendor\autoload.php';

use Twilio\Rest\Client;

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = "AC2568db960b0761318a37125e8539ec72";
$token = "e2ca55daec827aa22831cbb5c3aac4b4";
$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create("+50375359718", // to
                           [
                               "body" => "NICE",
                               "from" => "+16205269298"
                           ]
                  );

print($message->sid);
?>