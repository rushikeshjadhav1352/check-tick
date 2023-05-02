<?php
class Connection {
    public static $con;
    // define database parameters as an array
    public $db = array(
        'db_host' => 'localhost',
        'db_user' => 'root',
        'db_pass' => '',
        'db_name' => 'cms_new'
    );
    
    // method to define constants from the $db array
    
    
    // method to connect to database
    public function connectDatabase() {
        self::$con = mysqli_connect($this->db['db_host'], $this->db['db_user'], $this->db['db_pass'], $this->db['db_name']);


		if(self::$con){
			echo "connection is succesful";
				}
    }
	
    
    // method to define other constants
    public function defineOtherConstants() {
        define('SITENAME', 'Hi-Lo-Yo', false);
        define('SITESUBTITLE', '&nbsp;&nbsp;&nbsp;Shooting Craps in Sin City', false);
        define('POSTSPERPAGE', 10);
        define('AUTHOR', 'Chi Lin', false);
        define('TIMEOUT', 120);
        define('HASHCOST', 12);
        define('TZ', 'America/Los_Angeles');
    }

    // initialize the connection and define constants
    public function initialize() {
        $this->connectDatabase();
        $this->defineOtherConstants();
       // $this->defineConstants();
    }
}

// Create an instance of the Connection class
$conn = new Connection();
$conn->initialize();
?>
