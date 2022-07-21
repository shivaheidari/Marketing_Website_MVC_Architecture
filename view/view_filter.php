
<?php 

spl_autoload_register(function ($class){

	include '../model/class.'.$class.'.inc.php';
});
class view_filter extends maain_view
{
	public function show_ads($ads)
	{	
		 $string= "these are items ";

	}
	
	public function show_filters()
	{
		$city_obj=new city();
		$city_list=$city_obj->get_cities();
		$dropdown="";
		foreach ($city_list as $key => $value)
		{
 		 $dropdown=$dropdown. "<option vlaue= '$value'>".$value."</option>";
 		}
 		 echo'<select id="city" name="city"> <option vlaue=" "> select city </option>'.
 		$dropdown.'
 		</select>
 		<br>';
 	}

	}

 ?>




