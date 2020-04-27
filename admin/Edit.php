<div class="container edit-member">
        <h2 class="title_page">Edit Members</h2>  

 		<form  action="?do=update" method="POST">
    		<div class="form-group row justify-content-center">
    			<label class=" col-sm-2 col-md-2">username</label>
    			<div class="col-sm-8 col-md-6 col-lg-4">
    				<input type="" name="Musername" class="form-control" value="<?php echo $rows['userName']; ?>" required="required">
    			</div>
    		</div>

    		<div class="form-group row justify-content-center">
    			<label class="col-sm-2 col-md-2 control-label">Password</label>
    			<div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="hidden" name="oldMpassword" value="<?php echo $rows['password']; ?>">
    				<input type="Password" name="Mpassword" class="form-control" >
    			</div>
    		</div>

    		<div class="form-group row justify-content-center">
    			<label class="col-sm-2 col-md-2 control-label">Email</label>
    			<div class="col-sm-8 col-md-6 col-lg-4">
    				<input type="" name="Memail" class="form-control" value="<?php echo $rows['email']; ?>" required="required">
    			</div>
    		</div>

    		<div class="form-group row justify-content-center">
    			<label class="col-sm-2 col-md-2 control-label">Fullname</label>
    			<div class="col-sm-8 col-md-6 col-lg-4">
    				<input type="" name="Mfullname" class="form-control" value="<?php echo $rows['fullName']; ?>" required="required">
    			</div>
    		</div>

    		<div class="form-group row justify-content-center">
    			<div class="col-sm-10 col-md-8 col-lg-6">
    				<input type="submit" value="submit" class=" btn btn-primary btn-block" />
    			</div>
    		</div>
        </form>
 	</div>
    