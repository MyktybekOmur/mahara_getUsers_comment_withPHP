<?php
	require_once "connectDB.php";
	
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>HOMEWORK</title>
	
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<meta charset="utf-8">
</head>

<body>
	<header>
		<div>
			<h1>OIGONUU</h1>
		</div>
	</header>

	<div>
		<div class="form-div">
			<form action="" method="post">
			  <label for="students">Choose a student:</label>
			  <select name="student">
			    <optgroup label="A">
			      <option value="1">Admin</option>
			      <option value="2">Myktybek</option>
			    </optgroup>
			    <optgroup label="B">
			      <option value="3">Admin2</option>
			      <option value="4">Admin3</option>
			    </optgroup>
			  </select>
			  <br><br>
	  		<input class="button" type="submit" name="submit" value="Search">
			</form>
		</div>
		<?php
	      if(isset($_POST['submit'])){
	        if(!empty($_POST['student'])) {
	          $selected = $_POST['student'];
	          echo 'You have chosen: ' .$selected;
	          $data = getDataComment($selected);
	          $dataImg = getDataImg($selected);
	        } else {
	          echo 'Please select the value.';
	        }
	      }
    	?>


		<h2>HOMEWORK</h2>
		<div class="conteiner">

			<?php

				echo "<div class='comments b1'>";
				  // output data of each row
				echo "<h3>Coments</h3>";
				  while($row = $data->fetch_assoc()) {
				  	echo "<h4>".$row["ctime"].".</h4>";
				    echo "<p></br>".$row["description"]."</p>";
				   
				    echo "</br></td>";

				  }
				echo "</div>"
			?>
			<?php 
	 		
	 		echo "<div class='files b1'>";
	 		echo "<h3>Files</h3>";
				  // output data of each row
				  while($row = $dataImg->fetch_assoc()) {
				    echo "<p>".$row["ctime"]."</p>";
				    echo "</br>";
				    echo "<a href=http://localhost:8080/mahara20042/artefact/file/download.php?file=".$row['id']."&comment=".($row['id']-1).">".$row['title']."</a>";
				    
				  }
			echo "</div>"

			
			?>
		</div>


		
		
		
	</div>
	
</body>
</html>