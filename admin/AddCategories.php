<div class="container">
        <h2 class="title_page">Add New Categories</h2> 

        <form  action="?do=insert" method="POST">
            <div class="form-group row justify-content-center">
                <label class=" col-sm-2 col-md-2">Name</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="" name="Cname" class="form-control" required="required" placeholder="Enter name">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Description</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="text" name="Cdescription" class="form-control" required="required" placeholder="Enter Description">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Ordering</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="text" name="Cordering" class="form-control" required="required" placeholder="Enter Ordering">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Visible</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input id="vis-y" type="radio" name="Cvisible" value="0"   checked>
                    <label for="vis-y">Yes</label>
                     <br>
                    <input id="vis-n" type="radio" name="Cvisible" value="1"   >
                    <label for="vis-n">No</label>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Allow Commends</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input id="vis-y" type="radio" name="Ccommend" value="0"   checked>
                    <label for="vis-y">Yes</label>
                     <br>
                    <input id="vis-n" type="radio" name="Ccommend" value="1"   >
                    <label for="vis-n">No</label>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-md-2 control-label">Allow Ads</label>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input id="ads-y" type="radio" name="CAds" value="0"   checked>
                    <label for="ads-y">Yes</label>
                     <br>
                    <input id="ads-n" type="radio" name="CAds" value="1"   >
                    <label for="ads-n">No</label>
                </div>
            </div>


            <div class="form-group row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <input type="submit" value="Insert" class=" btn btn-primary btn-block" />
                </div>
            </div>
        </form>
    </div>
    