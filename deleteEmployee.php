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
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql2 = "DELETE FROM Com_Emp_TBL  WHERE E_Id = ?";
        $q2 = $pdo->prepare($sql2);
        $q2->execute(array($id));

        $sql = "DELETE FROM Employee_TBL  WHERE E_Id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: viewAllEmployee.php");
    }
?>

<body>
    <div class="container">
        <h3 align="center">Delete an Employee</h3>
        <form class="form-horizontal" action="deleteEmployee.php"
            method="post">
            <div class="form-group row">
                <input type="hidden" name="id" value="<?php echo $id;?>" />
                <p class="alert alert-error" align="center">Are you sure to
                    delete this employee?</p>
                <div class="form-actions" align="center">
                    <button type="submit" class="btn btn-danger">Yes</button>
                    <a class="btn btn-default" href="viewAllEmployee.php">No</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>