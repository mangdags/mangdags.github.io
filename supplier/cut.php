                <!-- Modal -->
              
                              <div class="modal fade" id="viewsupply<?php echo $event_id;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdropLabel">View Supply</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="" method="POST">
                                      <div class="mb-3">
                                  <fieldset disabled>
                                    <label class="fw-bold" for="supplier_title" class="form-label">Event</label> <br>

                                    <label class="form-control" > <?php echo $modal_event; ?> </label>

                                  </div>
                                  <div class="mb-3">
                                    <label class="fw-bold" for="description" class="form-label">Date</label>
                                    <label class="form-control" > <?php echo $modal_date; ?> </label>
                                  </div>
                                  <div class="mb-3">
                                    <label class="fw-bold" for="sup_events" class="form-label">Supplies</label>
                                    <label class="form-control" > <?php echo $modal_supplies_category; ?> </label>
                                  </div>
                                  <div class="mb-3">
                                    <label class="fw-bold" for="sup_events" class="form-label">Status</label>
                                    
                                    <select class="form-select" name="status">
                                      <option value="<?php echo $modal_supplies_status; ?>" selected><?php echo $modal_supplies_status; ?></option>
                                      <option value="Availablle">Available</option>
                                      <option value="Rented">Rented</option>
                                    </select>
                                    <input type="text" name="event_id" value="<?php echo $event_id; ?>" hidden>
                                  </div>
                                  </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                      
                                      <button type="submit" name="accept" class="btn btn-primary">Approved</button>
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              
                        <!-- End Modal -->