<?php 

spl_autoload_register(function ($class){

	include '../model/class.'.$class.'.inc.php';
});

class search_ads
{

public function search_ads_key($key)
{
	$model_obj=new search();
	$ads=$model_obj->search_key($key);
	include "../view/view_search.php";
	$view_search = new view_search();
	$view_search->show_ads($ads);


}


public function search_ads_city($city)
{
	$model_obj=new search();
	$ads=$model_obj->search_city($city);
	include "../view/view_search.php";
	$view_search = new view_search();
	$view_search->show_ads($ads);

}


public function search_ads_area($area)
{

	$model_obj=new search();
	$ads=$model_obj->search_area($area);
	include "../view/view_search.php";
	$view_search = new view_search();
	$view_search->show_ads($ads);

}

public function search_ads_date($date)
{
	$model_obj=new search();
	$ads=$model_obj->search_date($date);
	include "../view/view_search.php";
	$view_search = new view_search();
	$view_search->show_ads($ads);

}


}
$obj=new search_ads();
$obj->search_ads_key('dress');

 ?>