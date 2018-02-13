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
        $firstNameError = null;
        $lastNameError = null;
        $addressError = null;
        $emailError = null;
        $mobileError = null;
         
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
         
        $valid = true;
        if (empty($firstName)) {
            $firstNameError = 'Please enter First Name';
            $valid = false;
        }
        if (empty($lastName)) {
            $lastNameError = 'Please enter Last Name';
            $valid = false;
        }
        if (empty($address)) {
            $addressError = 'Please enter Address';
            $valid = false;
        }
         
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
         
        if (empty($mobile)) {
            $mobileError = 'Please enter Mobile Number';
            $valid = false;
        } else if( ! (preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $mobile))){
            $mobileError = 'Please enter a valid Mobile Number';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Employee_TBL  set E_FirstName = ?, E_LastName = ?, E_Address = ?, E_Email = ?, E_Phone =? WHERE E_Id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($firstName,$lastName,$address, $email,$mobile,$id));
            Database::disconnect();
            header("Location: viewAllEmployee.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM Employee_TBL where E_Id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $firstName = $data['E_FirstName'];
        $lastName = $data['E_LastName'];
        $address = $data['E_Address'];
        $email = $data['E_Email'];
        $mobile = $data['E_Phone'];
        Database::disconnect();
    }
?>
<body>
    <div class="container">
        <h3 style="text-align: center;">Update an Employee</h3>
        <form class="form-horizontal"
            action="updateEmployee.php?id=<?php echo $id?>" method="post">
            <div
                class="form-group row <?php echo !empty($firstNameError)?'error':'';?>">
                <label class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-9">
                    <input class="form-control" name="firstName" type="text"
                        placeholder="First Name"
                        value="<?php echo !empty($firstName)?$firstName:'';?>">
                    <?php if (!empty($firstNameError)): ?>
                    <span class="help-inline">
                        <?php echo $firstNameError;?>
                    </span>
                    <?php endif; ?>
                </div>
            </div>
            <div
                class="form-group row<?php echo !empty($lastNameError)?'error':'';?>">
                <label class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-9">
                    <input class="form-control" name="lastName" type="text"
                        placeholder="Last Name"
                        value="<?php echo !empty($lastName)?$lastName:'';?>">
                    <?php if (!empty($lastNameError)): ?>
                    <span class="help-inline"> <?php echo $lastNameError;?>
                    </span>
                    <?php endif; ?>
                </div>
            </div>
            <div
                class="form-group row <?php echo !empty($addressError)?'error':'';?>">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-9">
                    <input class="form-control" name="address" type="text"
                        placeholder="Address"
                        value="<?php echo !empty($address)?$address:'';?>">
                    <?php if (!empty($addressError)): ?>
                    <span class="help-inline"> <?php echo $addressError;?>
                    </span>
                    <?php endif;?>
                </div>
            </div>
            <div
                class="form-group row <?php echo !empty($emailError)?'error':'';?>">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input class="form-control" name="email" type="text"
                        placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
                    <?php if (!empty($emailError)): ?>
                    <span class="help-inline"> <?php echo $emailError;?>
                    </span>
                    <?php endif;?>
                </div>
            </div>
            <div
                class="form-group row <?php echo !empty($mobileError)?'error':'';?>">
                <label class="col-sm-3 col-form-label">Mobile Number</label>
                <div class="col-sm-9">
                    <input class="form-control" name="mobile" type="text"
                        placeholder="Mobile Number"
                        value="<?php echo !empty($mobile)?$mobile:'';?>">
                    <?php if (!empty($mobileError)): ?>
                    <span class="help-inline"> <?php echo $mobileError;?>
                    </span>
                    <?php endif;?>
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