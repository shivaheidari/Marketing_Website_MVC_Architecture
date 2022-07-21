<?php 

spl_autoload_register(function ($class){

	include '../model/class.'.$class.'.inc.php';
});

class search_ads_elec
{
	private $model_obj;
	private $view_search;

public function search_all_elec()
{
	$model_obj=new search_elec();
	$ads=$model_obj->search_elec_ads();
	include "../view/view_search_elec.php";
	$view_search = new view_search();
	$view_search->show_ads($ads);
}
public function search_brand($brand)
{
	$model_obj=new search_elec();
	$ads=$model_obj->search_elec_brand($brand);
	include "../view/view_search_elec.php";
	$view_search = new view_search_elec();
	$view_search->show_ads($ads);


}

public function search_year($year)
{
	$model_obj=new search_elec();
	$ads=$model_obj->search_elec_year($year);
	include "../view/view_search.php";
	$view_search = new view_search_elec();
	$view_search->show_ads($ads);

}



}

$obj=new search_ads_elec();
$obj->search_brand('sony');

 ?>