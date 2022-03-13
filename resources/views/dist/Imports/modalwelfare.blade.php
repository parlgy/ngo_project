<div class="modal fade" id="editmemberpay">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modaltitle3">Edit Member payment</h5>
                    </div>
                    <div class="modal-body">
                        <form action="register" method ="POST">
                        @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1"  for="3MemNo">Membership No.</label>
                                        <input class="form-control py-4" name="MemNo" id="3regno" type="text" placeholder="Mem No." />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="3title">Title</label>
                                        <input class="form-control py-4" name="title" id="3title" type="text" placeholder="Title" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="3full_name">Full Name</label>
                                <input class="form-control py-4" name="name" id="3full_name" type="text"  placeholder="Full Name" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="3phone">Phone</label>
                                <input class="form-control py-4" name="text" id="3phone" type="text"  placeholder="Phone" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="3amount">Amount</label>
                                <input class="form-control py-4" name="number" id="3amount" type="text"  placeholder="Amount :" />
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer bg-danger">
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>                        
                    </div>
                </div>
            </div>
        </div>