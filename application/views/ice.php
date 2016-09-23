<?php $this->load->view('header'); ?>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="col-md-9 col-md-offset-1">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="/">Header</a>
		      <ul class="nav navbar-nav navbar-left">
					<li><a href="/">Link</a></li>
				</ul>
		    </div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/">Link</a></li>
				<li><a href="/Users/logout">Log Out</a></li>
			</ul>
	      </div>
	  </div>
	</nav>	
	<div class="container">
		<h1><?= $first_name ?>!</h1>
		<div class="col-md-7">
			<h2><?= $last_name ?></h2> 
			<div >
				<h3><?= $email ?> </h3>
				<h4><?= $email ?></h4>
				<p><?= $first_name ?></p>
				<p><?= $last_name ?></p>
			</div>
		</div>
		<div class="col-md-5">
			<h1><?= $first_name ?></h1> 
			<div>
				
			</div>
		</div>
	</div>
</body>
</html>