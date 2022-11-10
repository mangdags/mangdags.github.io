<!-- start of form -->
                        <form action="" method="POST">
                            <td class="text-center"><input type="checkbox" name="supplies_id[]" value="<?php echo $result_supply['supplies_id'] ?>"></td>
                            <td><?php echo $result_supply['supplies_category'] ?></td>
                            <td><?php echo $result_supply['sup_events'] ?>
                              <input type="text" name="event" value="<?php echo $result_event; ?>" hidden>
                            </td>

                            <td class="text-center">
                              <a data-bs-toggle="modal" data-bs-target="#viewsupply<?php echo $result_supply['supplies_id'];?>" >
                            <i class="fa fa-eye" style="color: green"></i></a>
                            </td>
                            <td>
                              <input type="text" name="event_id" value="<?php echo $result_event['event_id']; ?>" hidden>
                                    <input type="text" name="account_id[]" value="<?php echo $result_supply['account_id']; ?>" hidden>
                            </td>

                            <!-- Modal -->
              
                              <div class="modal fade" id="viewsupply<?php echo $result_supply['supplies_id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

                                    <label class="form-control" > <?php echo $result_supply['supplies_category']; ?> </label>
                                    

                                  </div>
                                  <div class="mb-3">
                                    <label class="fw-bold" for="description" class="form-label">Description</label>
                                    <textarea class="form-control" rows="5" > <?php echo $result_supply['description']; ?> </textarea>
                                  </div>
                                  <div class="mb-3">
                                    <label class="fw-bold" for="sup_events" class="form-label">Status</label>
                                    <label class="form-control" > <?php echo $result_supply['status']; ?> </label>
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
                          

                        </form>