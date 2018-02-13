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

<body>
    <div class="container">
    <div class="row">
      <h3 align="center">Employee Address Book</h3>
    </div>
    <div class="row">
      <p>
        <a href="createEmployee.php" class="btn btn-success">Create New
          Employee</a>
      </p>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Company</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
              include 'config.php';
              $pdo = Database::connect();
              $sql = 'SELECT e.E_Id, e.E_FirstName, e.E_LastName, e.E_Address, e.E_Email, e.E_Phone, c.C_Name FROM Employee_TBL e, Com_Emp_TBL ce, Company_TBL c WHERE e.E_Id=ce.E_Id AND c.C_Id=ce.C_Id ORDER BY e.E_Id ASC';
              foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                  echo '<td>'. $row['E_Id'] . '</td>';
                  echo '<td>'. $row['E_FirstName'] . '</td>';
                  echo '<td>'. $row['E_LastName'] . '</td>';
                  echo '<td>'. $row['E_Email'] . '</td>';
                  echo '<td>'. $row['C_Name'] . '</td>';                      
                  echo '<td width=250>';
                  echo '<a class="btn btn-default" href="viewSingleEmployee.php?id='.$row['E_Id'].'">More Info</a>';
                  echo ' ';
                  echo '<a class="btn btn-success" href="updateEmployee.php?id='.$row['E_Id'].'">Update</a>';
                  echo ' ';
                  echo '<a class="btn btn-danger" href="deleteEmployee.php?id='.$row['E_Id'].'">Delete</a>';
                  echo '</td>';
                  echo '</tr>';
              }
              Database::disconnect();
            ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>