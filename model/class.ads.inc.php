<?php 

/**
 * 
 */
spl_autoload_register(function ($class){

	include 'class.'.$class.'.inc.php';
});


class ads
{

	private $id;
	private $title;
	private $description;
	private $date;
	private $city;
	private $area;
	private $image;
	private $category;
	private $tel;
	private $uid;
	private $price;
// getters--------------------------

	public function get_ad_title(){

			return $this->title;

	}
	public function get_ad_des(){
		return $this->description;
	}
	public function get_ad_date(){
		return $this->date;
	}
	public function get_ad_city(){
		return $this->city;
	}
	public function get_ad_area(){
		return $this->area;
	}
	public function get_ad_image(){
		return $this->image;
	}
	public function get_ad_category(){
		return $this->categoy;
	}
	public function get_ad_tel(){
			return $this->tel;
	}
	public function get_ad_price()
	{
		return $this->price;
	}
// sets-------------------------
	public function set_ad_title($title){
		$this->title=$title;
	}
	// public function set_ad_des($desc){
	// 	$this->des=$desc;
	// }
	public function set_ad_date($date){

		$this->date=$date;
	}
	public function set_ad_city($city){

		$this->city=$city;
	}
	public function set_ad_area($area){
		$this->area=$area;
	}
	public function set_ad_image($image){
		$this->image=$image;
	}
	public function set_ad_category($category){
		$this->category=$category;
	}
	public function set_ad_tel($tel){
		$this->tel=$tel;
	}
	public function set_ad_price($price)
	{
		$this->price=$price;
	}
	public function set_ad_description($des)
	{
		$this->description=$des;
	}
	public function set_ad_uid($uid)
	{
		$this->uid=$uid;
	}
	public function set_ad_year($year)
	{
		$this->year=$year;
	}



	public function delete_ad($id){}
	public function insert_ad()
	{
	    $db_c=new Connection();
	    $db=$db_c::getinstance();
	    $mysql=$db->getconnection();


	    $area_d=$this->area;
	    $city_d=$this->city;
	    $image_d=$this->image;
	    $price_d=$this->price;
	    $tel_d=$this->tel;
	    $title_d=$this->title;
	    $uid_d=$this->uid;
	    $year_d=$this->date;
	    $des_d=$this->description;
		$sql_query="insert into ads (area,city,image,price,tel,title,uid,year,description)
					 VALUES('$area_d','$city_d','$image_d','$price_d','$tel_d','$title_d','$uid_d','$year_d','$des_d')";
		$result=$mysql->query($sql_query);
		if($result==true)
		{
			echo "successful";
		}
		else
		{
			echo "failed";
			echo $mysql->error;
		}
	}
	public function get_ads($uid)
	{

		$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from ads where uid =".$uid;
		$result= $mysql->query($sql_query);
		$j=0;
		$user_ads;
		while ($row =mysqli_fetch_array($result))
		{	
			$user_ads[$j]= array('id'=>$row['id'],'tel' => $row['tel'] ,'title' => $row['title'], 'title'=>$row['title'],'description'=>$row['description']);

			 $j+=1;
		}
		return $user_ads;
	}


}






 ?>

