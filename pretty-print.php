<?php
function ksort_r (&$array, $sort_flags = SORT_REGULAR) {
	if (!is_array($array)) return false;

	ksort($array, $sort_flags);
	foreach ($array as &$item) {
		ksort_r($item, $sort_flags);
	}
	return true;
}
$source = json_decode(file_get_contents("IITC-pogo.json"), true);
$output = $source;
ksort_r($output);

$output = json_encode($output, JSON_PRETTY_PRINT);

file_put_contents("IITC-pogo.json", $output);
