<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Yijun Chen">
<title>Employee Address Book</title>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/navbar-fixed-top.css" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Employee Address Book</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="home.php" target="iframe_a">Home</a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Company<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="viewAllCompany.php" target="iframe_a">View All
									Companies</a></li>
							<li><a href="createCompany.php" target="iframe_a">Add
									New Company</a></li>
						</ul></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Employee <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="viewAllEmployee.php" target="iframe_a">View All
									Employee</a></li>
							<li><a href="createEmployee.php" target="iframe_a">Add New Employee</a></li>
						</ul></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<form class="navbar-form navbar-left" method="GET"
						action="searchEmpByFirstName.php">
						<div class="form-group">
							<input name="firstName" type="text" class="form-control"
								placeholder="Search Employee By Name">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<iframe height="600px" width="100%" src="home.php" name="iframe_a"
			style="border: none;"></iframe>
	</div>

	<!-- JavaScript
    ================================================== -->

	<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"
		type="text/javascript"></script>
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
		type="text/javascript"></script>
</body>
</html>
