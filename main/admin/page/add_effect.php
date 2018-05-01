<div class="row">
  <div class="col-md-offset-2 col-md-8">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Effect</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method= "POST" action= "../../includes/actions/add_effect_action.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Effect Type</label>
                  <div class="radio">
                    <label>
                      <input name="type" id="optionsRadios2" value="positive" type="radio">
                      Positive
                    </label>
                    <label>
                      <input name="type" id="optionsRadios2" value="negative" type="radio">
                      Negative
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Effect Description</label>
                  <textarea class="form-control" name="description"></textarea>
                </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value= "Submit">
              </div>
            </form>
          </div>
        </div>
      </div>
