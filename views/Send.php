<?php

namespace PHPMaker2023\appmessage;

// Page object
$Send = &$Page;
?>
<?php
$Page->showMessage();
?>
<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
//require_once '/path/to/vendor/autoload.php';
require_once 'C:\xampp\htdocs\appmessages\vendor\autoload.php';

use Twilio\Rest\Client;

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure

$sid = ExecuteScalar("SELECT sid_twilio FROM twilio_tbl");  
$token = ExecuteScalar("SELECT token_twilio FROM twilio_tbl");     

$twilio = new Client($sid, $token);

$to="+".$_GET['to'];
$message=$_GET['message'];


$message = $twilio->messages
                  ->create("$to", // to
                           [
                               "body" => "$message",
                               "from" => "+16205269298"
                           ]
                  );

//print($message->sid);
//header("Location: http://localhost/appmessages/SentTblList"); //IGNORED

/* print($message->status);
echo "<br>";
print($message->body);
echo "<br>";
print($message->sid);
echo "<br>";
print($message->to);
 */
$fk_sent_id = ExecuteScalar("SELECT IDENT_CURRENT('sent_tbl')");

$datecreated=$message->dateCreated->format('m-d-Y H:i:s');

$insert_response = ExecuteStatement("INSERT INTO twresponse_tbl (sid_twresponse,from_twresponse,to_twresponse,body_twresponse,date_created_twresponse,fk_id_sent) 
VALUES ('$message->sid','$message->from','$message->to','$message->body','$datecreated','$fk_sent_id')");

?>

<script type="text/javascript">
window.location.href = 'http://localhost/appmessages/SentTblList';
</script>

<?= GetDebugMessage() ?>
