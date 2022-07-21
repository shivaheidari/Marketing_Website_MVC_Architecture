<?php 

class view_search
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
 	<title></title>
 </head>
 <body>
 	<div>this is furniture page</div>
 	<input type="checkbox" name="wooden" > wooden<br>
 	<input type="checkbox" name="metal">metal
 
 </body>
 </html>