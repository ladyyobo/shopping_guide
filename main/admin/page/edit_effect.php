<div class="row">
  <div class="col-md-offset-2 col-md-8">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Effect</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method= "POST" action= "../../includes/actions/edit_effect_action.php">
              <div class="box-body">
                <input hidden name = "effect_id" value="<?php echo $effect->id; ?>"
                <div class="form-group">
                  <label for="exampleInputEmail1">Effect Type</label>

                  <div class="radio">

                    <?php if(trim($effect->type)== 'positive') {?>
                    <label>
                      <input name="type" checked="" id="optionsRadios2" value="positive" type="radio">
                      Positive
                    </label>
                    <label>
                      <input name="type" id="optionsRadios2" value="negative" type="radio">
                      Negative
                    </label>
                  <?php } elseif (trim($effect->type)== 'negative') {?>
                    <label>
                      <input name="type" id="optionsRadios2" value="positive" type="radio">
                      Positive
                    </label>
                    <label>
                      <input name="type" checked="" id="optionsRadios2" value="negative" type="radio">
                      Negative
                    </label>
                  <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Effect Description</label>
                  <textarea class="form-control" name="description">
                    <?php echo $effect->description; ?>
                  </textarea>
                </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value= "Submit">
              </div>
            </form>
          </div>
        </div>
      </div>
