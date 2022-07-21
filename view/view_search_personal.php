<?php 


class view_search_personal
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
 <select><option value="female">female</option>

<option value="male">male</option>
 </select>
 </body>
 </html>