<div class="row">
  <div class="col-md-offset-2 col-md-8">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method= "POST" action= "../../includes/actions/add_product_action.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Id</label>
                  <input type="text" class="form-control"  placeholder="Enter Product Id" name="id" >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Product Name</label>
                  <input type="text" class="form-control"  placeholder="Enter Product Name" name="name" >
                </div>

                <div class="form-group">
                   <select class="form-control" name="cat_id">
                    <?php
                       $categories= Category::find_all();

                       foreach ($categories as $category ) {
                    ?>
                       <option value="<?php echo $category->id; ?>"><?php echo strtoupper($category->name); ?></option>
                  <?php }
                    ?>
                   </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Manufacture</label>
                  <input type="text" class="form-control"  placeholder="Enter Manufacturer" name="manufacturer" >
                </div>

                <div class="form-group">
                  <label> Product Image </label>
                  <input type="file" name="image">
                </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value= "Submit">
              </div>
            </form>
          </div>
        </div>
      </div>
