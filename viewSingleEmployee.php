<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
    require 'config.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: viewAllEmployee.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT e.E_Id, e.E_FirstName, e.E_LastName, e.E_Address, e.E_Email, e.E_Phone, c.C_Name FROM Employee_TBL e, Com_Emp_TBL ce, Company_TBL c WHERE e.E_Id=ce.E_Id AND c.C_Id=ce.C_Id AND e.E_Id =? ';
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<body>
    <div class="container">
            <h3 align="center">Information about an Employee</h3>
                     
                    <div class="form-horizontal" >
                      
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Employee ID : </label>
                        <div class="col-sm-9">
                            <label >
                                <?php echo $data['E_Id'];?>
                            </label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">First Name : </label>
                        <div class="col-sm-9">
                            <label >
                                <?php echo $data['E_FirstName'];?>
                            </label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Last Name : </label>
                        <div class="col-sm-9">
                            <label >
                                <?php echo $data['E_LastName'];?>
                            </label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Company Name : </label>
                        <div class="col-sm-9">
                            <label >
                                <?php echo $data['C_Name'];?>
                            </label>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Address : </label>
                        <div class="col-sm-9">
                            <label >
                                <?php echo $data['E_Address'];?>
                            </label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email : </label>
                        <div class="col-sm-9">
                            <label >
                                <?php echo $data['E_Email'];?>
                            </label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Mobile Number : </label>
                        <div class="col-sm-9">
                            <label >
                                <?php echo $data['E_Phone'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions " align="center">
                          <a class="btn btn-default" href="viewAllEmployee.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>