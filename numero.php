<?php
$rand = range(1, 2);
shuffle($rand);
foreach ($rand as $val) {
echo $val;
}
?>