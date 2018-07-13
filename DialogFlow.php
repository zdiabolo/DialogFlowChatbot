<?php

require 'C:\Users\danie\vendor\autoload.php';


use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;

putenv('XXXXX'); // <== important (Windows env)

 $sessionsClient = new SessionsClient();
try {
    $formattedSession = $sessionsClient->sessionName('atecresaprueba', 'zprueba');

  // create text input
    $textInput = new TextInput();
    $textInput->setText($_POST['message']);
    $textInput->setLanguageCode('es-ES');
    //------

     $queryInput = new QueryInput();
     $queryInput->setText($textInput);
     $response = $sessionsClient->detectIntent($formattedSession, $queryInput);

     $queryResult = $response->getQueryResult();
     $queryText = $queryResult->getQueryText();
     $intent = $queryResult->getIntent();
     $displayName = $intent->getDisplayName();
     $confidence = $queryResult->getIntentDetectionConfidence();
     $fulfilmentText = $queryResult->getFulfillmentText();

     // output relevant info
      /*     print(str_repeat("=", 20) . PHP_EOL);
           printf('Query text: %s' . PHP_EOL, $queryText);
           printf('Detected intent: %s (confidence: %f)' . PHP_EOL, $displayName,
               $confidence);
           print(PHP_EOL);
           printf('Fulfilment text: %s' . PHP_EOL, $fulfilmentText);*/

     echo $fulfilmentText;

} finally {
    $sessionsClient->close();
}

?>
