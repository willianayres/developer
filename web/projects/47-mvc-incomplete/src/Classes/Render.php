<?php
	namespace Src\Classes;
	
	class Render
	{
		# Proprieties.
		private $dir;
		private $author;
		private $description;
		private $keywords;
		private $title;

		public function setDir($dir){
			$this->dir = $dir;
		}

		public function getDir(){
			return $this->dir;
		}

		public function setAuthor($author){
			$this->author = $author;
		}

		public function getAuthor(){
			return $this->author;
		}

		public function setDescription($description){
			$this->description = $description;
		}

		public function getDescription(){
			return $this->description;
		}

		public function setKeywords($keywords){
			$this->keywords = $keywords;
		}

		public function getKeywords(){
			return $this->keywords;
		}

		public function setTitle($title){
			$this->title = $title;
		}

		public function getTitle(){
			return $this->title;
		}

		# Render the layout fully.
		public function renderLayout(){
			include_once(DIRREQ.'app/Views/layout.php');
		}

		# Add specific caracteristics to head.
		public function addHead(){
			if(file_exists(DIRREQ."app/Views/{$this->getDir()}/head.php"))
				include(DIRREQ."app/Views/{$this->getDir()}/head.php");
		}

		# Add specific caracteristics to header.
		public function addHeader(){
			if(file_exists(DIRREQ."app/Views/{$this->getDir()}/header.php"))
				include(DIRREQ."app/Views/{$this->getDir()}/header.php");
			else if(file_exists(DIRREQ."app/Views/includes/header.php"))
				include(DIRREQ."app/Views/includes/header.php");
		}

		# Add specific caracteristics to main section.
		public function addMain(){
			if(file_exists(DIRREQ."app/Views/{$this->getDir()}/main.php"))
				include(DIRREQ."app/Views/{$this->getDir()}/main.php");
		}

		# Add specific caracteristics to footer.
		public function addFooter(){
			if(file_exists(DIRREQ."app/Views/{$this->getDir()}/footer.php"))
				include(DIRREQ."app/Views/{$this->getDir()}/footer.php");
			else if(file_exists(DIRREQ."app/Views/includes/footer.php"))
				include(DIRREQ."app/Views/includes/footer.php");
		}

		# Add scripts.
		public function addScript(){
			if(file_exists(DIRREQ."app/Views/{$this->getDir()}/script.php"))
				include(DIRREQ."app/Views/{$this->getDir()}/script.php");
		}
	}

?>