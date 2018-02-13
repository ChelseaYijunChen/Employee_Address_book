<?php
                    include 'config.php';
                    $id = null;
                    if ( !empty($_GET['firstName'])) {
                      $firstName = $_REQUEST['firstName'];
                    }

                    if ( null==$firstName ) {
                      header("Location: index2.php");
                    } else {
                      $pdo = Database::connect();
                      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      $sql = 'SELECT e.E_Id, e.E_FirstName, e.E_LastName, e.E_Address, e.E_Email, e.E_Phone, c.C_Name FROM Employee_TBL e, Com_Emp_TBL ce, Company_TBL c WHERE e.E_Id=ce.E_Id AND c.C_Id=ce.C_Id AND ( e.E_FirstName = \'' . $firstName . '\' OR e.E_LastName = \'' 
                      . $firstName . '\')';
                      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3> Employee Address Book</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Create New Employee</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Company Name</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    // include 'database.php';
                    // $id = null;
                    // if ( !empty($_GET['id'])) {
                    //   $id = $_REQUEST['id'];
                    // }

                    // if ( null==$id ) {
                    //   header("Location: index.php");
                    // } else {
                    //   $pdo = Database::connect();
                    //   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //   $sql = 'SELECT e.E_Id, e.E_FirstName, e.E_LastName, e.E_Address, e.E_Email, e.E_Phone, c.C_Name FROM Employee_TBL e, Com_Emp_TBL ce, Company_TBL c WHERE e.E_Id=ce.E_Id AND c.C_Id=ce.C_Id AND c.C_Id = ' . $id;
                      // $q = $pdo->prepare($sql);
                      // $q->execute(array($id));

                      foreach ($pdo->query($sql) as $row) {
                        //print_r($row);
                        //echo '<tr>';
                        echo '<td>'. $row['E_Id'] . '</td>';
                        echo '<td>'. $row['E_FirstName'] . '</td>';
                        echo '<td>'. $row['E_LastName'] . '</td>';
                        echo '<td>'. $row['C_Name'] . '</td>';
                        echo '<td>'. $row['E_Address'] . '</td>';
                        echo '<td>'. $row['E_Email'] . '</td>';
                        echo '<td>'. $row['E_Phone'] . '</td>';
                        //echo '<td><a class="btn btn-default" href="read.php?id='.$row[0].'">Read</a></td>';
                        echo '<td width=250>';
                        echo '<a class="btn btn-default" href="read.php?id='.$row['E_Id'].'">Read</a>';
                        echo ' ';
                        echo '<a class="btn btn-success" href="update.php?id='.$row['E_Id'].'">Update</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="delete.php?id='.$row['E_Id'].'">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    Database::disconnect();
                   }
                  ?>                  
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>