<?php
                $id = $_SESSION['id'];
                
                $sql = "SELECT * FROM Notes WHERE userId = $id ORDER BY dateCreated DESC";
                $result = $conn->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                        
                        echo ' 
                        <div class="card my-6" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title"> '. $row['title'] . ' </h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary"> '. $row['dateCreated'] .' </h6>
                                    <p class="card-text"> '. $row['content'].' </p> 

                                    <form action="noteOp.php" method="POST">
                                    <input type="submit" value="Edit" class="btn btn-primary" name="edit">
                                    <input type="submit" value="Delete" class="btn btn-danger" name="delete"> 
                                    </form>
                                </div> 
                            
                        </div>';

                    }
                     
                     
            ?>