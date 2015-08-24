<?php
require('iframe.php') ;
$sql = new Sql("Project_Madapp");

$main_query = "SELECT name, credit AS amount FROM User WHERE status='1' AND user_type='let_go' ORDER BY credit DESC LIMIT 0,10";

//$data = $sql->getAll($main_query);
$test_data = json_decode('{"A":"52","B":"22","C":"18","D":"65"}', true);
$data = array();
foreach ($test_data as $name => $value) {
	$data[] = array('name' => $name, 'amount' => $value);
}

$least = 100000;
$most = 0;
foreach ($data as $row) {
	if($row['amount'] < $least) $least = $row['amount'];
	if($row['amount'] > $most) $most = $row['amount'];
}



showTop('Leaderboard');
?>
<style type="text/css">
.data-row {
	height: 40px;
	line-height: 40px;
}
.data-name {
	width:200px;
	display: block;
	float:left;
}
.data-value {
	display: block;
	float: left;
}
</style>
<?php

foreach($data as $row) {
	$new = intval(($row['amount'] - $least) * (100 / ($most - $least)));

	print "<div class='data-row'><span class='data-name'>$row[name]</span> <span class='data-value'>$row[amount] : $new</span></div>\n";
}
showEnd();