<?php

//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);

//load all classes in this directory
class Manage {
    public static function autoload($class) {
        include $class . '.php';
    }
}

spl_autoload_register(array('Manage', 'autoload'));

//instantiate object
$obj = new main();

//starting main class for teh index page
class main {

    public function __construct()
    {
        $pageRequest = 'homepage';
        if(isset($_REQUEST['page'])) {
            $pageRequest = $_REQUEST['page'];
        }
         $page = new $pageRequest;

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $page->get();
        } else {
            $page->post();
		}		
    }
}

abstract class page {
    //add html structure to the page
	public $html;
    public function __construct()
    {
        $this->html .= '<html>';
        $this->html .= '<link rel="stylesheet" href="styles/styles.css">';
        $this->html .= '<body>';
    }
	
	//destruct and print the Html
    public function __destruct()
    {
		$this->html .= '</body></html>';
        stringFunctions::printThis($this->html);
    }

	//can I delete these?????  TEST This
   /* public function get() {
	
    }

    public function post() {
}
*/
}

?>