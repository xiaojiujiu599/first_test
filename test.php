<?php
/*require "./php/conn.php";
$sql = "select f_name,director,actor from film_information"; 
$result = $con->query($sql);
if ($result->num_rows > 0) {
  // 输出数据
  while($row = $result->fetch_assoc()) {
    echo $row["f_name"]." " .  $row["director"]. " " . $row["actor"]. "<br>";
  }
} else {
  echo "0 结果";
}*/


require "./php/conn.php";
	$sql = "select * from film_information"; 
	$result = $con->query($sql);
	echo "<table>";
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo $row["f_name"]."<br>".$row["introduction"]. "<br>";
			
		}
	} else {
		echo "0 结果";
	}
	echo "</table>";

?>