   <?php
    $stat = $con->prepare('select * from shop.users where regStatus = 0');
    $stat->execute();
    $rows = $stat->fetchAll();
    $cnt = $stat->rowCount();
    ?>
    <div class="container text-center">
        <h2 class="title_page" >Pinding Memebers</h2>
        <div class="table-responsive pinding">
            <table class="table table-bordered" >
                <tr style="color: #FFF;" class="bg-primary">
                    <td>#ID</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Fullname</td>
                    <td>RegisterDate</td>
                    <td>Control</td>
                </tr>
                <?php 
                   foreach ($rows as $row) {
                    echo"<tr>";
                    echo "<td>".$row['userID']."</td>";
                    echo "<td>".$row['userName']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['fullName']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "<td>
                    <a href='?do=Edit&id=".$row['userID']."'><button class='btn btn-sm btn-success'><i class='fa fa-edit'></i> Edit</button></a>
                    <a href='?do=Delete&id=".$row['userID']."'><button class='btn btn-sm btn-danger'><span style='font-weight:bold'>x</span> Clear</button></a>";
                    if($row['regStatus'] == 0){
                    	echo "<a href='?do=active&id=".$row['userID']."'> <button class='btn btn-sm btn-primary'><i class='fa fa-plus'></i> Active</button></a>";
                    }
                    echo "</td></tr>";
                   }
                ?>
            </table>
        </div>

        <br><a href="?do=Add"><button class="btn btn-primary" style="margin-bottom: 30px;"><i class="fa fa-plus"></i>Add Memeber</button></a>
    </div>
    <?php
    include $tmpl.'footer.php';