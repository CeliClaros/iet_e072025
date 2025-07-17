<?php 
	$conn = new mysqli('localhost', 'root', '', 'iet');
	// $conn = new mysqli('localhost', '	id17243743_root', 'CelinaClaros-2023', 'id17243743_iet1');	
// iet1, root, CelinaClaros-2023
	if ($conn-> connect_error) {
		echo $error -> $conn ->connect_error;
		# code...
	}
 ?>