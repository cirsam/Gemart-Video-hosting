<a href="/">Index</a>
<?
class Connector{
	
	public function __construct(){
		if($_SERVER['SERVER_NAME']!="localhost"){
			$this->connect_prod();
		}else{
			$this->connect_dev();
		}
	}
	
	public function connect_dev(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "gemartt";
		// Create connection
		$conn = new mysqli($servername, $username, $password,$dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		echo "Connected successfully";
	}

	public function connect_prod(){
		echo "prod";
		$servername = "localhost";
		$username = "gemartt";
		$password = "mCEy8P6QbfenAunb";
		$dbname = "gemartt";
		// Create connection
		$conn = new mysqli($servername, $username, $password,$dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		echo "Connected successfully";
	}
}

?>




