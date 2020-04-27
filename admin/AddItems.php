<div class="container">
        <h2 class="title_page">Add New Items</h2> 

        <form  action="?do=insert" method="POST">
            <div class="form-group row justify-content-center">
                <label class=" col-sm-2 col-md-2">Name</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="text" name="name" class="form-control" required="required" placeholder="Enter item name">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Description</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="text" name="description" class="form-control" required="required" placeholder="Enter Description">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Price</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="text" name="price" class="form-control" required="required" placeholder="Enter price">
                </div>
            </div>


            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">country_made</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="text" name="made" class="form-control" required="required" placeholder="Enter country made">
                </div>
            </div>


            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">image</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="text" name="image" class="form-control" required="required" placeholder="Enter image">
                </div>
            </div>
           <!--
            <div class="form-group row justify-content-center rating_form">
                <label class="col-sm-2 col-md-2 control-label">rating</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <div class="stars">
                        <input id="st5" value="5" type="radio" name="rating" >
                        <label for="st5"><i class="fa fa-star"></i></label>

                        <input id="st4" value="4" type="radio" name="rating" >
                        <label for="st4"><i class="fa fa-star"></i></label>

                        <input id="st3" value="3" type="radio" name="rating" >
                        <label for="st3"><i class="fa fa-star"></i></label>

                        <input id="st2" value="2" type="radio" name="rating" >
                        <label for="st2"><i class="fa fa-star"></i></label>

                        <input id="st1" value="1" type="radio" name="rating" >
                        <label for="st1"><i class="fa fa-star"></i></label>
                    </div>
                </div>
            </div>
            -->
            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">status</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <select class=" form-control" name="status">
                        <option disabled selected>choose any item</option>
                        <option value="new">new</option>
                        <option value="old">old</option>
                        <option value="used">used</option>
                        <option value="new use">new use</option>
                        <option value="very old">very old</option>
                    </select>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Categorie</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <select class=" form-control" name="categ_ID">
                        <option disabled selected>choose any item</option>
                        <?php 
                        $stat = $con->prepare('select * from categories');
                        $stat->execute();
                        $rows = $stat->fetchAll();
                        foreach ($rows as $row) {
                              echo "<option value='".$row['CID'] ."'>".$row['Cname'] ."</option>"; 
                           }   
                            
                         ?>
                        
                    </select>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">member</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <select class=" form-control" name="member_ID">
                        <option disabled selected>choose any item</option>


                         <?php 

                         $stat = $con->prepare('select * from users');
                         $stat->execute();
                         $rows = $stat->fetchAll();

                        foreach ($rows as $row) {
                              echo "<option value='".$row['userID'] ."'>".$row['userName'] ."</option>"; 
                           }   
                            
                         ?>

                    </select>
                </div>
            </div>

            

            <div class="form-group row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <input type="submit" value="Insert" class=" btn btn-primary btn-block" />
                </div>
            </div>
        </form>
    </div>
    