<?php 
/**
 * MySQli database; only one connection is allowed 
 */
class Connection
{
	private $connection;
	// store the single instace
	private static $instance;

	//  get an instance of database 
	// return type database
	public static function getinstance()
	{
		if (!self::$instance)
		{
			self::$instance=new self();
		}
		return self::$instance;
	}
	public function __construct()
	{
		$this->connection=new MySQli('localhost','root','','divar');
		if (mysqli_connect_error())
		{
			trigger_error("failed to connect sql".mysqli_connect_error(),E_USER_ERROR);

		}

	}

		private function __clone(){}
		public function getconnection()
		{
			return $this->connection;
		}

}

 ?>