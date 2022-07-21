<?php 
spl_autoload_register(function ($class){

	include '../model/class.'.$class.'.inc.php';
});
class search_ads_furnitures
{
	private $model_obj;
	private $view_search;

public function search_all_furnitures()
{

	$model_obj=new search_furnitures();
	$ads=$model_obj->search_furnitures_ads();
	include "../view/view_search_furnitures.php";
	$view_search = new view_search();
	$view_search->show_ads($ads);
}
public function search_ads_wooden()
{
	$model_obj=new search_furnitures();
	$ads=$model_obj->search_furnitures_wooden();
	include "../view/view_search_furnitures.php";
	$view_search = new view_search();
	$view_search->show_ads($ads);
}
public function search_ads_metal()
{
	$model_obj=new search_furnitures();
	$ads=$model_obj->search_furnitures_metal();
	include "../view/view_search_furnitures.php";
	$view_search = new view_search();
	$view_search->show_ads($ads);

}

}


$obj=new search_ads_furnitures();
$obj->search_ads_metal();

 ?>