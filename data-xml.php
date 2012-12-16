<?php

$unsortedArray = array();
$sortedArray = array();

// Get the number of items
$numberOfItems = $_REQUEST['number_of_items'];

// Create XML document
$xmlDocument = new SimpleXMLElement('<sorter/>');

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

// Create unsorted numbers child in XML document
$unsortedNumbers = $xmlDocument->addChild('unsorted_numbers');

// Add children to unsorted numbers
foreach ($unsortedArray as $key => $value)
{
	$unsortedNumbers->addChild('item' . $key, $value);
}

// Create sorted numbers child in XML document
$sortedNumbers = $xmlDocument->addChild('sorted_numbers');

// Add children to sorted numbers
foreach ($sortedArray as $key => $value)
{
	$sortedNumbers->addChild('item' . $key, $value);
}

// Send the XML document
Header('Content-type: text/xml');
print($xmlDocument->asXML());

// Save to log for debug
$currentTime = date("[m.d.Y - H:i:s]");

$logString = $currentTime . " --> " . $xmlDocument->asXML() . "\n";

file_put_contents('xml-calls.log', $logString, FILE_APPEND);

?>
