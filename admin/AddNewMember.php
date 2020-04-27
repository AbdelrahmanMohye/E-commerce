<div class="container">
        <h2 class="title_page">Add New Member</h2> 

        <form  action="?do=insert" method="POST">
            <div class="form-group row justify-content-center">
                <label class=" col-sm-2 col-md-2">username</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="" name="Musername" class="form-control" required="required" placeholder="Enter username">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Password</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="Password" name="Mpassword" class="form-control" required="required" placeholder="Enter Password">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Email</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="" name="Memail" class="form-control" required="required" placeholder="Enter Email">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Fullname</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="" name="Mfullname" class="form-control"  required="required" placeholder="Enter Fullname">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <input type="submit" value="Insert" class=" btn btn-primary btn-block" />
                </div>
            </div>
        </form>
    </div>