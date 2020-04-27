   <?php
    $stat = $con->prepare('select * from users');
    $stat->execute();
    $rows = $stat->fetchAll();
    $cnt = $stat->rowCount();
    ?>
    <div class="container text-center">
        <h2 class="title_page" >Members</h2>
        <div class="table-responsive">
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
                    echo"<tr style='background-color:#FFF;color:#000;'>";
                    echo "<td>".$row['userID']."</td>";
                    echo "<td>".$row['userName']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['fullName']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "<td>
                    <a href='?do=Edit&id=".$row['userID']."'><button class='btn btn-sm btn-success'><i class='fa fa-edit'></i> Edit</button></a>
                    <a href='?do=Delete&id=".$row['userID']."'><button class='btn btn-sm btn-danger'><span style='font-weight:bold'>x</span> Clear</button></a>
                    </td>";
                    echo "</tr>";
                   }
                ?>
            </table>
        </div>

        <br><a href="?do=Add"><button class="btn btn-primary" style="margin-bottom: 30px;"><i class="fa fa-plus"></i>Add Memeber</button></a>
    
    </div>
    <?php
    include $tmpl.'footer.php';