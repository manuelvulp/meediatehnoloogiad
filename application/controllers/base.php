<?php

class Base_Controller extends Controller 
{
	/**
	 * Layout view
	 * 
	 * @var View
	 */
	
	public $view;

	/**
	 * Layout nested view (content).
	 * @var View
	 */
	
	public $content;

	/**
	 * Logged user data
	 * @var array
	 */

	public $user;

	private $css_files;
	private $js_files;
	private $images;
	private $links;

	/**
	 * Indicates whether the user is logged in
	 * @var boolean
	 */

	protected $is_logged_in = FALSE;

	/**
	 * Arra of javascript files to load after body loads
	 * 
	 * @var Array
	 */
	
	protected static $js_post_load_files = array();

	/**
	 * Catch-all method for requests that can't be matched
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */

	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

	/**
	 * Controls the flow of application
	 * 
	 */
	
	public function before()
	{
		$view = New View('layouts.default');
        $this->view = $view;

		$this->check_login();

        $this->load_global_css();
        $this->load_global_js();
        $this->load_page_links();
        $this->load_global_img();

        $this->js_post_load('layouts/layout_default');

		$this->view->show_flash_notices = Bundle::get('flash_notices.show_flash_notices');
		$this->view->is_logged_in = $this->is_logged_in;
	}	

	/**
	 * Renders view
	 * 
	 * @param  String 	View file to show in content
	 */

	public function render_page($errors = null)
	{
		$this->content->links = $this->links;
		$this->content->images = $this->view->images;
		$this->content->error_messages = $this->error_messages();

		$this->view->content = $this->content;

		if(isset($errors)) {
			return $this->view->with_errors($errors);
		}

		return $this->view;
	}

	/**
	 * Javascript file to load after body
	 * @param  String 	Javascript file
	 * 
	 */
	
	public function js_post_load($js_file = null)
	{
		$count = count(self::$js_post_load_files);
		$js_file = HTML::script('js/'.$js_file.'.js');
		self::$js_post_load_files[$count] = $js_file;
		$this->view->js_post_load_files = self::$js_post_load_files;
	}

	/**
	 * Load custom css files if needed
	 * 
	 * @param  String 	Css files
	 */
	
	public function load_css($css_files = null)
	{
		if (!empty($css_files) AND (count($css_files) > 1)) {
			foreach ($css_files as $file) {
				echo HTML::style('css/'.$file.'.css');
			}
		}

		elseif (!empty($css_files) AND (count($css_files) === 1)) {
			echo HTML::style('css/'.$css_files.'.css');
		}
	}

	/**
	 * Loads global css files. Defined in bundle
	 * 
	 */
	
	private function load_global_css()
	{
		$css = array();
		$css_files = Bundle::get('css_files');

		for ($i = 0; $i < (count($css_files) - 3); $i++) {
			array_push($css, HTML::style('css/'.$css_files[$i].'.css'));
		}

		$this->view->css_files = $css;
	}

	/**
	 * Loads global javascript files. Defined in bundle
	 * 
	 */
	
	private function load_global_js()
	{
		$js = array();

		$js_files = Bundle::get('js_files');

		for ($i = 0; $i < (count($js_files) - 3); $i++) {
			array_push($js, HTML::script('js/'.$js_files[$i].'.js'));
		}

		$this->view->js_files = $js;
	}

	/**
	 * Loads global images to $images variable
	 * 
	 * @return 		array 	Array of images
	 */
	
	private function load_global_img()
	{
		$img_files = $this->return_array(Bundle::get('images'));

		$images = array();

		foreach ($img_files as $key => $val) {
			$val = 'img/'.$val;
			$images[$key] = URL::to_asset($val);
		}

		$this->view->images = $images;
	}

	private function load_page_links()
	{
		$bundle_links = $this->return_array(Bundle::get('links'));
		
		$links = array();

		foreach ($bundle_links as $key => $val) {
			$links[$key] = URL::home().$val;
		}

		$this->links = $links;
		$this->view->links = $links;
	}

	/**
	 * Check whether the user is logged in
	 * 
	 * @return 		boolean
	 */

	private function check_login()
	{
		if (Auth::check()) {
			$this->is_logged_in = TRUE;
			$this->view->user = Auth::user();
			$this->user = Auth::user();
		}
	}

	public function error_messages()
	{
		$error_msgs = $this->return_array(Bundle::get('error_msgs'));

		$error_messages = array();

		foreach ($error_msgs as $key => $val) {
			$error_messages[$key] = $val;
		}

		return $error_messages;
	}

	public function return_array($assoc_array = null)
	{
		$array = array();

		if (isset($assoc_array) AND !empty($assoc_array)) {
			foreach ($assoc_array as $key => $val) {
				if ($key !== 'handles' AND $key !== 'auto' AND $key !== 'location') {
					$array[$key] = $val;
				}
			}
		}

		return $array;
	}
}