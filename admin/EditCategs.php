<div class="container">
        <h2 class="title_page">Edit Categorie</h2> 

        <form  action="?do=update&id=<?php echo $rows['CID']; ?>" method="POST">
            <div class="form-group row justify-content-center">
                <label class=" col-sm-2 col-md-2">Name</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="text" name="Cname" class="form-control" required="required" placeholder="Enter name" value="<?php echo $rows['Cname']; ?>">
                    <input type="text" name="id" style="display: none" value="<?php echo $rows['CID']; ?>">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Description</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="text" name="Cdescription" class="form-control" required="required" placeholder="Enter DescriptionCdescription" value="<?php echo $rows['Cdescription']; ?>">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Ordering</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="text" name="Cordering" class="form-control" required="required" placeholder="Enter Ordering" value="<?php echo $rows['Corder']; ?>">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Visible</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input id="vis-y" type="radio" name="Cvisible" value="0" <?php if($rows['Cvisible'] == 0) echo "checked";?>>
                    <label for="vis-y">Yes</label>
                     <br>
                    <input id="vis-n" type="radio" name="Cvisible" value="1" <?php if($rows['Cvisible'] == 1) echo "checked";?>>
                    <label for="vis-n">No</label>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Allow Commends</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input id="vis-y" type="radio" name="Ccommend" value="0" <?php if($rows['Ccomment'] == 0) echo "checked";?>>
                    <label for="vis-y">Yes</label>
                     <br>
                    <input id="vis-n" type="radio" name="Ccommend" value="1" <?php if($rows['Ccomment'] == 1) echo "checked";?>>
                    <label for="vis-n">No</label>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Allow Ads</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input id="ads-y" type="radio" name="CAds" value="0"  <?php if($rows['Cads'] == 0) echo "checked";?>>
                    <label for="ads-y">Yes</label>
                     <br>
                    <input id="ads-n" type="radio" name="CAds" value="1"  <?php if($rows['Cads'] == 1) echo "checked";?>>
                    <label for="ads-n">No</label>
                </div>
            </div>

            


            <div class="form-group row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <input type="submit" name="Update" value="update" class=" btn btn-primary btn-block" />
                </div>
            </div>
        </form>
    </div>
    