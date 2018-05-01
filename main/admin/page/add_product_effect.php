<div class="row">
  <div class="col-md-offset-2 col-md-8">
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Quick Example</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="POST" action="../../includes/actions/add_product_effects.php">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Product</label>
        <select class="form-control" name="product_id" onchange="get_details(this.value, 'effect', 'effects_div')"> 
        <?php 
          $products = Product::find_all();
        
          foreach($products as $product){
        ?>
          <option value="<?php echo $product->id; ?>"> <?php echo strtoupper($product->name); ?> </option>
        <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Effect</label>
        <div id="effects_div">
        <select class="form-control"> 
          <option > Choose ............. </option>
        </select>
        </div>
      </div>
    <div class="box-footer">
      <input type="submit" class="btn btn-primary" value="Submit">
    </div>
  </form>
</div>
</div>
</div>
