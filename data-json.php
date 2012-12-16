
<?php

$unsortedArray = array();
$sortedArray = array();

// Get the number of items
$numberOfItems = $_REQUEST['number_of_items'];

// Get each item
for ($iterator = 1; $iterator <= $numberOfItems; $iterator++)
{
    // Get from request variable and add to unsorted array
    $unsortedArray[] = $_REQUEST['item' . $iterator];
}

// Copy unsorted array to sorted array
$sortedArray = $unsortedArray;

// Sort array
sort($sortedArray);

// Add arrays together in the sort collection
$sortCollection = array("unsorted_numbers" => $unsortedArray, "sorted_numbers" => $sortedArray);

// Encode JSON 
$returnData = json_encode($sortCollection);

// Send the JSON document
Header('Content-type: application/json');
print ($returnData);

// Save to log for debug
$currentTime = date("[m.d.Y - H:i:s]");

$logString = $currentTime . " --> " . $returnData . "\n";

file_put_contents('json-calls.log', $logString, FILE_APPEND);

//print($jx);





$arithmetic_entity = array(
    "math_op" => array(
        "operands" => array(
            "operand1" => $val1,
            "operand2" => $val2
        ),
        "results" => array(
            "add" => $val1 + $val2,
            "subtract" => $val1 - $val2,
            "multiply" => $val1 * $val2
        )
    )
);

$jx = json_encode($arithmetic_entity);

// Create JSON entity
//$j = json_encode(array(4 => "four", 8 => "eight"));

// Create XML document to be sent
/*
$math_op = new SimpleXMLElement('<math_op/>');

$operands = $math_op->addChild('operands');
$operand1 = $operands->addChild('operand1', $val1);
$operand2 = $operands->addChild('operand2', $val2);

$results = $math_op->addChild('results');
$add = $results->addChild('add', $result_add);
$subtract = $results->addChild('subtract', $result_subtract);
$multiply = $results->addChild('multiply', $result_multiply);
*/


/*
for ($i = 1; $i <= 8; ++$i) {
    $track = $xml->addChild('track');
    $track->addChild('path', "song$i.mp3");
    $track->addChild('title', "Track $i - Track Title");
}
*/

// Send the XML document
/*
Header('Content-type: text/xml');
print($math_op->asXML());
*/



?>
