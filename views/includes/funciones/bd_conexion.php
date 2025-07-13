<?php   

	$conn = new mysqli('localhost', 'celina_dba', 'GxDm7aR1gCCq', 'celina_iet');
	
	
	//nombre ddbb:'test');						//'iet_vs1');

//   $conn = new mysqli('localhost', 'root', '', 'iet');				//nombre ddbb:'test');						//'iet_vs1');


 // $conn = new mysqli('localhost', '	id17243743_root', 'CelinaClaros-2023', 'id17243743_iet1');	
// iet1, root, CelinaClaros-2023


  //$conn = new mysqli('localhost', '	id17243743_root@2a02:4780:bad:c0de::14', 'CelinaClaros-2023', 'id17243743_iet1');	


// Usuario: id17243743_root@2a02:4780:bad:c0de::14
//ProxySQL Error: Access denied for user ' id17243743_root'@'2a02:4780:bad:f00d::14

 // $conn = new mysqli('localhost', 'id17243743_root'@'2a02:4780:bad:f00d::14', 'CelinaClaros-2023', 'id17243743_iet1');	


    if($conn->connect_error){

       // echo $error -> $conn->connect_error;
            echo $error= $conn->connect_error;
        }
    
    ?>
