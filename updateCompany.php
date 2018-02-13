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
<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"
    type="text/javascript"></script>
<script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    type="text/javascript"></script>

</head>
<?php
    require 'config.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: viewAllEmployee.php");
    }
     
    if ( !empty($_POST)) {
        $companyNameError = null;
         
        $companyName = $_POST['companyName'];
         
        $valid = true;

        if (empty($companyName)) {
            $companyNameError = 'Please enter Company Name';
            $valid = false;
        }
         
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Company_TBL  set C_Name = ? WHERE C_Id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($companyName,$id));
            Database::disconnect();
            header("Location: viewAllCompany.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM Company_TBL where C_Id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $companyName = $data['C_Name'];
        Database::disconnect();
    }
?>
<body>
    <div class="container">
        <h3 style="text-align: center;">Update a Company</h3>
        <form class="form-horizontal"
            action="updateCompany.php?id=<?php echo $id?>" method="post">
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
                    <button type="submit" class="btn btn-success">Update</button>
                    <a class="btn btn-default" href="home.php">Back</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>