<?
	require_once("html.php");


	class Page extends Html{
	
		function __construct(){
			global $file, $session;
			parent::__construct();
			$this->uri = explode("/", trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/"));
			$this->title = "";
			$this->subtitle = "";
			$this->description = "";
			$this->contents = $this->body->append("div")->id("contents");
			
            foreach (array("middle","bottom", "top") as $id){
				$this->contents->$id = $this->contents->append("div")
                    ->id($id)->html( $file->html($id) );
			}
            
			foreach (array("left","right") as $id){
				$this->contents->$id = $this->contents->middle->append("div")
                    ->id($id)->html( $file->html($id) );
			}
            
			$this->addStyle("/style");
			$this->addScript("/lib");
			$this->addScript("/script");
			$this->addScript("
			  var _paq = _paq || [];
				  _paq.push(['trackPageView']);
				  _paq.push(['enableLinkTracking']);
				  (function() {
					var u='//piwik.iscpif.fr/';
					_paq.push(['setTrackerUrl', u+'piwik.php']);
					_paq.push(['setSiteId', 4]);
					var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
					g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
				  })();
				if (location.pathname.split('/')[1] != 'query'){
					window.onresize = function(){
						var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
						document.body.style.fontSize = Math.round(8 + width / 160) + 'px';
					};
					window.onresize();
				}
			", false);
		}
		
		function redirect($url){
			header("Location: $url");
			die();
		}
		
		function render(){
			$title = $this->subtitle ? : $this->title;
			$this->head->append("title")->text($title);
			$this->head->append("meta", array("name"=>"description", "content"=>$this->description));
			return parent::render();
		}
	
	};

?>
