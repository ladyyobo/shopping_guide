<div class="row">
  <div class="col-md-offset-2 col-md-8">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method= "POST" action= "../../includes/actions/edit_category_action.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                  <input type="hidden" name="cat_id" value="<?php echo $category->id; ?>">
                  <input type="text" class="form-control"  placeholder="Enter Category Name" name="cat_name" value="<?php echo $category->name; ?>" >
                </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value= "Submit">
              </div>
            </form>
          </div>
        </div>
      </div>
