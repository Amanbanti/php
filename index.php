<?php

include 'config/db_connect.php';

$sql='SELECT title, ingredients,id FROM pizzas ORDER BY created_at';

$result= mysqli_query($conn,$sql);

$pizzas=mysqli_fetch_all($result,MYSQLI_ASSOC);

//free the result from the memory
mysqli_free_result($result);


//close connection
mysqli_close($conn);






?>



<!DOCTYPE html>
<html lang="en">

  <?php
  include 'templet/header.php';
  ?>


    <h4 class="center grey-text">Pizzas!</h4>

    <div class="container">
        <div class="row">
            <?php foreach($pizzas as $pizza){ ?>

                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6>
                                <?php echo htmlspecialchars($pizza['title']);   ?>
                            </h6>

                            <div>
                               

                                <ul>
                                         <?php foreach(explode(',' , $pizza['ingredients'] ) as $ing){ ?>

                                            <li>
                                                <?php echo htmlspecialchars($ing); ?>
                                            </li>


                                        <?php } ?>
                                </ul>
                            </div>

                            <div class="card-action right-align">
                                <a class="brand-text" href="details.php? id=<?php echo $pizza['id'] ?>">More Info</a>

                            </div>

                        </div>

                    </div>

                </div>


                <?php } ?>
        </div>

    </div>



 <?php
  include 'templet/footer.php';

  ?>

</html>