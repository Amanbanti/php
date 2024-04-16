<?php
include ('config/db_connect.php');


if (isset($_POST['delete'])){
  $id_to_delete= mysqli_real_escape_string($conn,$_POST['id_to_delete'] ) ;
  $sql= "DELETE FROM pizzas WHERE id= $id_to_delete";
  
$result= mysqli_query($conn,$sql);

if($result){
    header('Location: index.php');

}else{
    echo 'query error: '. mysqli_error($conn);
}


}



// Check GET request id parameter
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM pizzas WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $pizza = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        mysqli_close($conn);

    } else {
        echo "Query failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'templet/header.php'; ?>
    <div class="container center">
        <?php if ($pizza) {?>
            <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
            <p>Created By: <?php echo htmlspecialchars($pizza['email']); ?> </p>
            <p> <?php echo date($pizza['created_at']); ?> </p>
            <h5>Ingredients:</h5>
            <p> <?php echo htmlspecialchars($pizza['ingredients']); ?> </p>


            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'];?>"/>
                <input type="submit" name="delete" class="btn brand z-depth-0" value="Delete"/>

            </form>

        <?php } else {?>
                <h5>No such Pizza Exist!</h5>

            <?php }?>

    </div>

    <?php include 'templet/footer.php'; ?>
</html>