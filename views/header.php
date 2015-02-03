<?php ?>

<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="/index.php/main.html" class="navbar-brand">Erich0929</a>
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navbar-main">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Catagories <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="themes">
							<?php 
								$HG =& getInstance ();
								$tableListMapper = new TableListMapper ($HG -> db);
								$tables = $tableListMapper -> getTableList ();
								foreach ($tables as $table) {
									echo "<li><a href='#'> " . $table . "</a></li>";
								}
							 ?> 
							<li class="divider"></li>
						</ul>
					</li>
					<li>
						<a href="../help/">Help</a>
					</li>
					<li>
						<a href="http://news.bootswatch.com">Blog</a>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Download <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="download">
							<li><a href="./bootstrap.min.css">bootstrap.min.css</a></li>
							<li><a href="./bootstrap.css">bootstrap.css</a></li>
							<li class="divider"></li>
							<li><a href="./variables.less">variables.less</a></li>
							<li><a href="./bootswatch.less">bootswatch.less</a></li>
							<li class="divider"></li>
							<li><a href="./_variables.scss">_variables.scss</a></li>
							<li><a href="./_bootswatch.scss">_bootswatch.scss</a></li>
						</ul>
					</li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li><a href="http://builtwithbootstrap.com/" target="_blank">Built With Bootstrap</a></li>
					<li><a href="https://wrapbootstrap.com/?ref=bsw" target="_blank">WrapBootstrap</a></li>
				</ul>

			</div>
		</div>
	</div>