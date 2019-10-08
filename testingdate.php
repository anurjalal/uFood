<?php
$d2 = new DateTime('2011-03-12');
$d1 = new DateTime();

$diff = $d2->diff($d1);

echo $diff->y;
?>