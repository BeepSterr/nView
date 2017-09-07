<?

	/*
	
	nView - The worst PHP "Framework" Ever™
	
	*/

	//pagebuilder goes here!
	$pb = [];
	
	$pb['base_path'] 			= getcwd() . "/../";
	$pb['view_path'] 			= $pb['base_path'] . "views/";
	$pb['layout_path'] 			= $pb['base_path'] . "layouts/";
	$pb['html_includes_path'] 	= $pb['base_path'] . "html_includes/";
	$pb['pagemods_path'] 		= $pb['base_path'] . "pagemods/";
	
	//session mod path
	$pb['session_path'] = "session.php";
	
	
	class pageObject {

		public $view;
		
		public function __construct($view) {

			$this->view 	= $view;
			
			$this->render();
			
		}
		
		public function render(){
			
			global $pb;
			
			//alright, lets start building the page
			require($pb['view_path'] . $this->view);
			
		}
	}	
	
	class layoutBuilder {

		public $view;
		public $layout;
		
		public function __construct($view = "default.php", $layout = "default.php") {

			$this->view 	= $view . ".php";
			$this->layout 	= $layout . ".php";
			
			$this->renderLayout();
			
		}
		
		public function renderLayout(){
			
			global $pb;
			
			//alright, lets start building the page
			if (file_exists($pb['layout_path'] . $this->layout)) {
				require($pb['layout_path'] . $this->layout);
			}else{
				require($pb['layout_path'] . "default.php");
			}
			
		}
		
		public function page(){
			
			global $pb;
			if (file_exists($pb['view_path'] . $this->view)) {
				require($pb['view_path'] . $this->view);
			}else{
				require($pb['view_path'] . "404.php");
			}
			
		}
	}


?>