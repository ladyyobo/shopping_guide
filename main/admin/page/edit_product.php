<?php 
  $product_id = $_GET['product_id'];
  $product = Product::find_by_id($product_id);
  $sql = "SELECT * FROM nutritional_value WHERE product_id='$product_id'";
  $nutri_values = NutritionalValue::find_by_sql($sql);
  $sql = "SELECT * FROM product_effect WHERE product_id='$product_id'";
  $prod_effects = ProductEffect::find_by_sql($sql);
?>

<div class="row">
  <div class="col-md-6">
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Quick Example</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="post" action="../../includes/actions/add_product_action.php" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Product Id</label>
        <input class="form-control"  name="id" placeholder="Enter product Id" type="number"
        value="<?php echo $product->id; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Product Name</label>
        <input class="form-control"  name="name" placeholder="Enter product name" type="text"
        value="<?php echo $product->name; ?>">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Product Category</label>
        <select class="form-control" name="cat_id">
          <?php 
              $categories = Category::find_all();

              foreach ($categories as $category) {
          ?>
            <option value="<?php echo $category->id; ?>"><?php echo strtoupper($category->name); ?></option>
          <?php } ?>
        </select>
      </div>

       <div class="form-group">
        <label for="exampleInputEmail1">Product Manufacturer</label>
        <input class="form-control"  name="manufacturer" placeholder="Enter Manufacturer" type="text" 
        value="<?php echo $product->manufacturer; ?>">
      </div>


      <div class="form-group">
            <label> Product Image </label>
            <input type="file" name="image">
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
</div>

  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Nutritional Value</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-striped">
          <tbody><tr>
            <th style="width: 10px">#</th>
            <th>Nutrient</th>
            <th>Percentage</th>
          </tr>
          <?php 
              $index =0;
              foreach ($nutri_values as $nutri_value) {
                  $index++;
                  $nutrient = Nutrient::find_by_id($nutri_value->nutri_id);
          ?>
            <tr>
            <td><?php echo $index; ?></td>
            <td><?php echo $nutrient->name; ?></td>
            <td><?php echo $nutri_value->percentage; ?></td>
          </tr>
              <?php } ?>
        </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>

                <br>
      <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Effects</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-striped">
          <tbody><tr>
            <th style="width: 10px">#</th>
            <th>Effect</th>
          </tr>
          <?php 
              $index=0;
              foreach($prod_effects as $effect){
                $index++;
                $effect = Effect::find_by_id($effect->effect_id);
    
          ?>
          <tr>
            <td><?php echo $index; ?></td>
            <td><?php echo $effect->description; ?></td>
          </tr>
              <?php } ?>
        </tbody></table>
      </div>
      </div>
  </div>

  <!-- /row -->
</div>