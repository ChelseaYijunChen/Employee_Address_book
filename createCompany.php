<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Yijun Chen">
<title>Employee Address Book</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
    require 'config.php';
 
    if ( !empty($_POST)) {
        $companyNameError = null;
         
        $companyName = $_POST['companyName'];
         
        $valid = true;
        if (empty($companyName)) {
            $companyNameError = 'Please enter Company Name';
            $valid = false;
        }
         
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Company_TBL (C_Name) values(?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($companyName));
            Database::disconnect();
            header("Location: viewAllCompany.php");
        }
    }
?>

<body>
	<div class="container">
		<h3 style="text-align: center;">Add a Company</h3>
		<form class="form-horizontal" action="createCompany.php" method="post">
			<div class="form-group row <?php echo !empty($nameError)?'error':'';?>">
				<label class="col-sm-3 col-form-label">Company Name</label>
				<div class="col-sm-9">
					<input class="form-control" name="companyName" type="text"
						placeholder="Company Name"
						value="<?php echo !empty($companyName)?$companyName:'';?>">
					<?php if (!empty($companyNameError)): ?>
					<span class="help-inline"> <?php echo $companyNameError;?>
					</span>
					<?php endif; ?>
				</div>
			</div>
			<div class="form-actions form-group row">
				<div class="offset-sm-3 col-sm-12 text-center">
					<button type="submit" class="btn btn-success">Create</button>
					<a class="btn btn-default" href="home.php">Back</a>
				</div>
			</div>
		</form>
	</div>
	<!-- /container -->
</body>
</html>