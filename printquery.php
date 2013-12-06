<?php
//Basic print table
function printQuery($query){
	print '<table border="1">';

	$numOfColumns = oci_num_fields($query);

	print "<tr>";
	$i = 1;
	while($i <= $numOfColumns){
		$columnName = oci_field_name($query, $i);
		print "<th>" . $columnName . "</th>";
		$i = $i + 1;
	}
	print "</tr>";

	while($row = oci_fetch_row($query)){
		print '<tr>';
		foreach ($row as $item){
			print "<td>$item</td>";
		}
		print '</tr>';
	}
	print '</table>';
}
?>