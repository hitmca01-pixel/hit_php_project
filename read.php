<?php

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
   
    require_once "config.php";
    
    $title = "View Employees";
    $sql = "SELECT * FROM employees WHERE id = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        
        $stmt->bind_param("i", $param_id);
        
        $param_id = trim($_GET["id"]);
        
        
        if($stmt->execute()){
            $result = $stmt->get_result();
            
            if($result->num_rows == 1){
              
                $row = $result->fetch_array(MYSQLI_ASSOC);
                
                
                $name = $row["name"];
                $address = $row["address"];
                $salary = $row["salary"];
            } else{
              
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
   
    $stmt->close();
    
    
    $mysqli->close();
} else{
    
    header("location: error.php");
    exit();
}
?>

<?php include("header.php"); ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Employees</h1>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b><?php echo $row["name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p><b><?php echo $row["address"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <p><b><?php echo $row["salary"]; ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
