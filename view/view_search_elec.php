<?php 


class view_search_elec
 {
    


     public function show_ads($ads)
	   {
		echo "<br>these are items<br>";

		if ($ads==0)
		{
			echo "no result";
			exit();
		}
		foreach ($ads as $key => $value)
 		{
				
	 			echo'<br>';
    			 foreach ($value as $k => $v) 
    			{ 		  

    			echo '  '.$k.'=>'.$v;
				}
 			}





	}


 }


 ?>





 <!DOCTYPE html>
 <html>
 <head>
 	<title>

 	</title>
 </head>
 <body>



 	<div>electronic search page</div>
 	<select name="brand">
 		

 		<option value="sony">sony</option>
 		<option value="hp">HP</option>
 		<option value="acer">Acer</option>


 	</select>


 	<br>
<br><br>
 	<select name="year">
 		<option value="befor2000">before 2000</option>
 		<option value="afrer 2000">after 2000</option>



 </select>
 </body>
 </html>

 