<?php
    $stat = $con->prepare('select items.* ,categories.Cname ,users.userName from items inner join categories on items.categ_ID = categories.CID inner join users on items.member_ID = users.userID');
    $stat->execute();
    $rows = $stat->fetchAll();
    $cnt = $stat->rowCount();


    ?>
    <div class="container text-center">
        <h2 class="title_page" >Items</h2>
        <div class="table-responsive">
            <table class="table table-bordered" >
                <tr style="color: #FFF;" class="bg-primary">
                    <td>#ID</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Price</td>
                    <td>Made From</td>
                    <td>Status</td>
                    <td>Categorie</td>
                    <td>User</td>
                    <td>Date</td>
                    <td>Control</td>
                </tr>
                <?php 
                   foreach ($rows as $row) {
                    echo "<tr style='background-color:#FFF;color:#000;'>";
                    echo "<td>".$row['item_ID']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['description']."</td>";
                    echo "<td>".$row['price']."</td>";
                    echo "<td>".$row['country_made']."</td>";
                    echo "<td>".$row['status']."</td>";
                    echo "<td>".$row['Cname']."</td>";
                    echo "<td>".$row['userName']."</td>";
                    echo "<td>".$row['add_date']."</td>";
                    echo "<td>
                    <a href='?do=Edit&id=".$row['item_ID']."'><button class='btn btn-sm btn-success'><i class='fa fa-edit'></i> Edit</button></a>
                    <a href='?do=Delete&id=".$row['item_ID']."'><button class='btn btn-sm btn-danger'><span style='font-weight:bold'>x</span> Clear</button></a>
                    </td>";
                    echo "</tr>";
                   }
                ?>
            </table>
        </div>

        <br><a href="?do=Add"><button class="btn btn-primary" style="margin-bottom: 30px;"><i class="fa fa-plus"></i>Add Item</button></a>
    
    </div>
    <?php
    include $tmpl.'footer.php';