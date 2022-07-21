<?php 

/**
 * 
 */


class view_insert_main
{

	public function form()
	{

		
		$city_obj=new city();
		$city_list=$city_obj->get_cities();
		$dropdown="";
		foreach ($city_list as $key => $value) {
 		 $dropdown=$dropdown. "<option vlaue= '$value'>".$value."</option>";
 		 	# code...
 		 }
		// echo "this is main form";
		echo ' <form action="../controller/class.insert.ads.inc.php" method="POST">	
 		title:<br>
 		<input type="text" name="title">
 		<br>
 		<input type="text" name="description">
 		<br>

 		<select id="city" name="city"> <option vlaue=" "> select city </option>'.
 		$dropdown.'
 		</select>
 		<br>
 		<input type="file" name="image" accept="image/gif, image/jpeg, image/png">
 		<br>
 		tel:<input type="text" name="tel">
 		<br>
 		price:<input type="text" name ="price">
 		<br>
 		<p id="ar"></p>
 		<br>
 		


       	';
	}


}





class view_insert_elec extends view_insert_main
{

	public function form()
	{
		parent::form();

		echo 'brand:<input type="text" name="brand">';

		echo '<br>';
		echo 'produced: <input type="text" name="pyear">';
		echo '<br>';

		echo '<input type="submit" name="submit">

				</form>
		';
		// form and send by get mehtod
	}
}

class view_insert_personal extends view_insert_main
{

	public function form()
	{
		parent::form();
		echo ' <input type="radio" name="gender" value="male"> Male<br>
  <input type="radio" name="gender" value="female"> Female<br>';
  	echo '<input type="submit" name="submit">

				</form>
		';



	}

}

class view_insert_furnitures extends view_insert_main
{

	public function form()
	{
		parent::form();
		echo '<input type="checkbox" name="wooden" value="1"> wooden<br>
  <input type="checkbox" name="metal" value="1"> metal<br>';
  echo '<input type="submit" name="submit">

				</form>';

	}
}
class view_insert
{
	private $category;
	public function create_form($cat)
	{
			switch ($cat) {
				case 'elec':
					$category=new view_insert_elec;
					break;
				case 'personal':
					$category=new view_insert_personal;
					break;
				case 'furnitures':
					$category=new view_insert_furnitures;
					break;

			}
		return $category;
	}
}

// $ob=new view_insert;
// $cat=$ob->create_form('elec');
// $cat->form();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>


 </body>
 </html>

