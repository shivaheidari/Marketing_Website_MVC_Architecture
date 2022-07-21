<?php 
spl_autoload_register(function ($class){

	include '../model/class.'.$class.'.inc.php';
});

class search_ads_personal
{


	private $model_obj;
	private $view_search;

public function search_all_personal()
{
	$model_obj=new search_personal();
	$ads=$model_obj->search_personal_ads();
	include "../view/view_search_personal.php";
	$view_search = new view_search_personal();
	$view_search->show_ads($ads);

}

public function search_ads_f()
{
	$model_obj=new search_personal();
	$ads=$model_obj->search_personal_f();
	include "../view/view_search_personal.php";
	$view_search = new view_search_personal();
	$view_search->show_ads($ads);
}
public function search_ads_m()
{
	$model_obj=new search_personal();
	$ads=$model_obj->search_personal_f();
	include "../view/view_search_personal.php";
	$view_search = new view_search_personal();
	$view_search->show_ads($ads);
}





}

$obj=new search_ads_personal();
$obj->search_all_personal();















 ?>