<!-- Modal -->
              
                              <div class="modal fade" id="viewsupply<?php echo $ds_supply_row['supplies_id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdropLabel">View Supply</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="mb-3">
                                  <fieldset disabled>
                                    <label class="fw-bold" for="supplier_title" class="form-label">Category</label> <br>

                                    <label class="form-control" > <?php echo $ds_supply_row['supplies_category']; ?> </label>
                                    

                                  </div>
                                  <div class="mb-3">
                                    <label class="fw-bold" for="description" class="form-label">Description</label>
                                    <textarea class="form-control" rows="5" > <?php echo $ds_supply_row['description']; ?> </textarea>
                                  </div>
                                  <div class="mb-3">
                                    <label class="fw-bold" for="sup_events" class="form-label">Status</label>
                                    <label class="form-control" > <?php echo $ds_supply_row['status']; ?> </label>
                                  </div>
                                  </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                      
                                      
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              
<!-- End Modal -->