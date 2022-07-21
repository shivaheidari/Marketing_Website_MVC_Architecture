<?php 

spl_autoload_register(function ($class){

	include '../model/class.'.$class.'.inc.php';
});

class insert_ads
{
    private $user;
    private $cat;
    private $city_name;
    private $brand;
    private $build_year;
    private $fm;
    private $areas;
    public function __construct()
    {
    	$this->user=new user();
    }

    public function insert($uid,$cat)
    {
    	$d=$this->user->validation($uid);
    	if ($d==1)
    	{
    		echo "valid";
    		$fac=new factory();
    		$c=$fac->create($cat);
    		include_once "../view/view_insert.php";
    		$form_obj=new view_insert;
    		$form=$form_obj->create_form($cat);
    		$form->form();
        if(isset($_POST['city']))
        {
          $this->city_name=$_POST['city'];

        }




    		if(isset($_POST['submit']))
  			{

				$date=date("Y/m/d");
        
				$c->set_ad_date($date);
				$c->set_ad_category($cat);
				$c->set_ad_uid($uid);
        $title=$_POST['title'];
        $c->set_ad_title($title);
        $des=$_POST['description'];
        $c->set_ad_description($des);
        $city=$this->city_name;
        $c->set_ad_city($city);
        $tel=$_POST['tel'];
        $c->set_ad_tel($tel);
        $price=$_POST['price'];
        $c->set_ad_price($price);
        if($cat=='elec')
        {
          $brand=$_POST['brand'];
          $c->set_brand($brand);
          $buid_year=$_POST['pyear'];
          $c->set_build($uid);
          $c->insert_ad();

        }
        if($cat=='personal')
        {
           if(isset($_POST['gender']))
            {
          $this->fm=$_POST['gender'];

            }
          $fm=$this->fm;
          $c->set_fm($fm);
          $c->insert_ad();

        }
       if($cat=='furnitures')
       {
            if(isset($_POST['wooden']))
            {
              $c->set_wooden();
            }

            if(isset($_POST['metal']))
            {
              $c->set_metal();
            }
            $c->insert_ad();
       }

			}

    		

    	}

    }

}


$ob = new insert_ads();
$ob->insert("230",'furnitures');
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	</title>

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

  <script src="../js/jquery-3.1.0.min.js"></script>
</head>
<body>


	<p id='res'>this is city</p>
	<p id="response">responce</p>



<script>
    // $("#city").change(function(){
    //  var option = $("#city").val();
    //  $("#res").html(option);
    //       $.ajax({
    //         type:'POST',
    //          url: '<?php echo $_SERVER['PHP_SELF']; ?>',
    //          data:{action:'get_area' , city_name:option},
    //         contentType: 'application/json',
    //          cache: 'false',
    //            dataType: 'JSON',
    //             success:function(res1)
                // {
                  //console.log('sucseed2');
                  // data = JSON.parse(res1);
                  // console.log(data);
                  // console.log(data);
                  // var jres=JSON.parse(res);
                  // var returnvalue=$.parseJSON(res);
                  // $("#response").html(res);

                 // console.log(res);
                 // var returnvalue=JSON.parse(res);
                 // console.log(returnvalue);

                
                 // console.log(res);
                 // for (var i=0;i<jres.lenght;i++)
                 // {
                 // console.log(res[0]);
                 // }
     //          },
     //        error: function (jqXHR, exception) {
     //            var msg = '';
     //            if (jqXHR.status === 0) {
     //                msg = 'Not connect.\n Verify Network.';
     //            } else if (jqXHR.status == 404) {
     //                msg = 'Requested page not found. [404]';
     //            } else if (jqXHR.status == 500) {
     //                msg = 'Internal Server Error [500].';
     //            } else if (exception === 'parsererror') {
     //                msg = 'Requested JSON parse failed.';
     //            } else if (exception === 'timeout') {
     //                msg = 'Time out error.';
     //            } else if (exception === 'abort') {
     //                msg = 'Ajax request aborted.';
     //            } else {
     //                msg = 'Uncaught Error.\n' + jqXHR.responseText;
     //            }
     //            console.log(msg);
     //        },

     // });




     // });


    
  </script>


</body>
</html>



<?php 

              header('contentType: application/json');

        if(isset($_POST['action']) )
        {     

            $city_area=$_POST['city_name'];
            $obj=new city();
            $area_list=$obj->get_area($city_area);
            // var_dump($area_list);
            // echo $area_list[1];
            // echo json_encode($area_list);
            foreach ($area_list as $key => $value) {
            
                $row[]=$value;
             }
             // print $row[0];
            echo json_encode($row);
           
             // exit();
             //var_dump(json_encode($row));


        }



 ?>


