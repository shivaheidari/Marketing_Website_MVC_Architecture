<?php 


/**
 *  
 */
class view_search
{

	public function show_ads($ads)
	{
		echo "these are items<br>";

		if ($ads==0)
		{
			echo "no result";
			exit();
		}
		foreach ($ads as $key => $value)
 		{
				
	 			echo'<br>'.$key;
    			 foreach ($value as $k => $v) 
    			{ 		  

    			echo '  '.$k.'=>'.$v;
				}
 			}


	}
}



 ?>