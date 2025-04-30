<?php
	namespace Src\Classes;

	use Src\Traits\TraitUrlParser;

	class Breadcrumb
	{
		use TraitUrlParser;

		# Create the breadcrumbs of the site.
		public function addBreadcrumb(){
			$count = count($this->parseUrl());
			$links[0] = '';
			echo '<a href="'.DIRPAGE.'">home</a> >';
			for($i = 0; $i < $count; $i++){
				$links[0] .= $this->parseUrl()[$i];
				echo '<a href="'.DIRPAGE.$links[0].'">'.$this->parseUrl()[$i].'</a>';
				if($i < $count -1)
					echo " > ";
			}
		}
	}
?>