<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

$page_title = "Home";
?>

<?php include('includes/header.php'); ?>

    <div class="container">
        

        <h2 style="text-align:center; margin-top:20px">Information Table</h2>
        
        <form action="<?php echo 'logout.php' ?>" method="post">
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="logout">
            </div>
        </form>
        
        <div class="row justify-content-centere">
        <table class="table">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>action</th>
                    <td><a href="form.php" class="btn btn-success">+</a></td>
                </tr>
            </thead>
          
    <?php            
        $result = $link->query("select * from students");   
        
        $num = 1;
        while($row = mysqli_fetch_assoc($result)):
    ?>
    <tr>
        <td><?php echo $num;?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['lastname'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['phonenumber'];?></td>
        <td>
            <a href="form.php?edit=<?php echo $row['id'];?>"
            class="btn btn-info">Edit</a>
            <a href="delete.php?delete=<?php echo $row['id'];?>"
            class="btn btn-danger" >X</a>
        </td>
    </tr>
    
        <?php 
            $num+=1;
            endwhile;
        ?>
        </table>
    </div>
    <div class="mx-auth">
        <h3>
            Number of page visits: <?php include('count.php'); ?>
        </h3>
    </div>

</div>
    
    </div>

  
    <?php include('includes/footer.php'); ?>


