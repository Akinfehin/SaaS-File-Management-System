
           <div class="modal fade" id="modal_comment3<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <form action="" method="POST">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-plus"></i> Add Comments</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body mx-3">
                 <div class="md-form mb-5">
                  </div>
                 <div class="col-xl-12">

                  <div class="form-group">
                    <label for="exampleFormControlTextarea3" class="">Admin Comments</label>
                    <textarea class="form-control" name="COMMENT" id="exampleFormControlTextarea3" rows="4"></textarea>
                  </div>

                </div>
                <input type="hidden" name="ID" value="<?php echo $id;?>">
                <div class="modal-footer d-flex justify-content-center">
                  <button class="btn btn-info" name="edit_comment3">Submit</button>
                </div>
              </div>
            </div>
          </div>
          </form>