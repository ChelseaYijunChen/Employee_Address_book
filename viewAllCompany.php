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
                <h3>Employee Address Book</h3>
            </div>
            <div class="row">
                <p>
                    <a href="createCompany.php" class="btn btn-success">Add Company</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Company Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'config.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM Company_TBL ORDER BY C_Id ASC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<td>'. $row['C_Id'] . '</td>';
                            echo '<td>'. $row['C_Name'] . '</td>';

                            echo '<td width=350>';
                                echo '<a class="btn btn-default" href="viewEmpByCom.php?id='.$row['C_Id'].'&name='.$row['C_Name'].'">View All Employees</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="updateCompany.php?id='.$row['C_Id'].'">Update Company Info</a>';
                                echo ' ';
                                // echo '<a class="btn btn-danger" href="deleteCompany.php?id='.$row['C_Id'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>