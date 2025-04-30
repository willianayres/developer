		<header>
			<nav>
				<ul>
					<li><a href="">Home</a></li>
					<li><a href="">Sobre</a></li>
					<li><a href="">Contato</a></li>
				</ul>
			</nav>
		</header>
		<?php 
			$breadcrumb = new Src\Classes\Breadcrumb();
    		$breadcrumb->addBreadcrumb();
    		echo '<br />';
		?>
		