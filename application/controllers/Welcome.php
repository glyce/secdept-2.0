<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if ( ! $this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
		
		$this->load->view('welcome_message');
	}
}

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 * @author	SMTI-AuthorName
 */
class Welcome extends MY_Controller {
 
	/**
	 * Some description here
	 * 
	 * @author	SMTI-AuthorName
	 * @param
	 * @return
	 */
	function __construct()
	{
		parent::__construct();
	}
 
	/**
	 * Some description here
	 * 
	 * @author	SMTI-AuthorName
	 * @param
	 * @return
	 */
	function index()
	{
		// code here...
	}
 
	/**
	 * Some description here
	 * 
	 * @author	SMTI-AuthorName
	 * @param
	 * @return
	 */
	function list()
	{
		// code here...
	}
 
	/**
	 * Some description here
	 * 
	 * @author	SMTI-AuthorName
	 * @param
	 * @return
	 */
	function details()
	{
		$object_id = $this->uri->segment(3);
		// code here...
	}
 
	/**
	 * Some description here
	 * 
	 * @author	SMTI-AuthorName
	 * @param
	 * @return
	 */
	function add()
	{
		// code here...
	}
 
	/**
	 * Some description here
	 * 
	 * @author	SMTI-AuthorName
	 * @param
	 * @return
	 */
	function confirmation()
	{
		$object_id = $this->uri->segment(3);
		// code here...
	}
 
	/**
	 * Some description here
	 * 
	 * @author	SMTI-AuthorName
	 * @param
	 * @return
	 */
	function edit()
	{
		$object_id = $this->uri->segment(3);
		// code here...
	}
 
	/**
	 * Some description here
	 * 
	 * @author	SMTI-AuthorName
	 * @param
	 * @return
	 */
	function activate()
	{
		$object_id = $this->uri->segment(3);
		// code here...
	}
 
	/**
	 * Some description here
	 * 
	 * @author	SMTI-AuthorName
	 * @param
	 * @return
	 */
	function deactivate()
	{
		$object_id = $this->uri->segment(3);
		// code here...
	}
}
// End of file ClassName.php
// Location: ./application/controller/ClassName.php
