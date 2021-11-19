<?php

if(isset($_POST["id"]) && !empty($_POST["id"])){
   
    require_once "config.php";
    
    $title = "Delete Employees";
    
    $sql = "DELETE FROM employees WHERE id = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        
      $stmt->bind_param("i", $param_id);
        
        
        $param_id = trim($_POST["id"]);
        
       
        if($stmt->execute()){
            
            header("location: index.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
   
    $stmt->close($stmt);
    
    
    $mysqli->close($link);
} else{
    
    if(empty(trim($_GET["id"]))){
        header("location: error.php");
        exit();
    }
}
?>

<?php include "header.php"; ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this employee record?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="index.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
