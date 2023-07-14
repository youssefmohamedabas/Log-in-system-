<?php
$a[] = "Anna";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Fiona";
$a[] = "Gunda";
$a[] = "Hege";
$a[] = "Inga";
$a[] = "Ahmed298";
$a[] = "Mohamed22";
$a[] = "Lalia";
$a[] = "Dina99";
$a[] = "Samir";
$a[] = "Fatima";
$a[] = "Gaber";
$a[] = "Hager";
$a[] = "karim";

$q = $_REQUEST["q"];
$hint = "";
if ($q !== "") {
$q = strtolower($q);
$len=strlen($q);
foreach($a as $name) {
if (stristr($q, substr($name, 0, $len))) {
if ($hint === "") { $hint = $name;
} else { $hint .= ", $name"; } } } }
echo $hint === "" ? "no suggestion" : $hint;
?>