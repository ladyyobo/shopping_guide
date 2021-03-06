<div class="row">
  <div class="col-md-offset-6 col-md-2">
    <a href="?page=add_product">
      <button type="button" class="btn btn-block btn-success btn-sm">Add Product</button>
    </a>
  </div>
  <div class="col-md-2">
    <a href="?page=add_product_effect">
      <button type="button" class="btn btn-block btn-success btn-sm">Add Product Effect</button>
    </a>
  </div>
  <div class="col-md-2">
    <a href="?page=add_nutri_value">
      <button type="button" class="btn btn-block btn-success btn-sm">Add Nutritional Value</button>
    </a>
  </div>
</div>
<br>
<?php
    $products = Product::find_all();
?>
<div class="box">
            <!--div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            < /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input class="form-control input-sm" placeholder="" aria-controls="example1" type="search"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 181.7px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID #</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 231.25px;" aria-label="Browser: activate to sort column ascending">Name</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 196.717px;" aria-label="Platform(s): activate to sort column ascending">Category</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 156.183px;" aria-label="Engine version: activate to sort column ascending">Manufacturer</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 112.15px;" aria-label="CSS grade: activate to sort column ascending">Image</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 112.15px;" aria-label="CSS grade: activate to sort column ascending">Operations</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($products as $product) { ?>
                    <tr role="row" class="odd">
                      <td class="sorting_1"><?php echo $product->id; ?></td>
                      <td><?php echo $product->name; ?></td>
                      <td><?php echo Category::find_by_id($product->cat_id)->name; ?></td>
                      <td><?php echo $product->manufacturer; ?></td>
                      <td><?php echo $product->image; ?></td>
                      <td>
                        <a href="?page=edit_product&product_id=<?php echo $product->id;?>">
                            edit
                        </a>
                      </td>
                    </tr>
                  <?php     } ?>
              </tbody>
              </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
