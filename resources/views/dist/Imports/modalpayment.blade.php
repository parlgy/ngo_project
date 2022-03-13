<div class="modal fade" id="editpayments">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modaltitle2">Edit Member details</h5>
                    </div>
                    <div class="modal-body">
                        <form action="register" method ="POST">
                        @csrf
                            <div class="form-group">
                                <label class="small mb-1" for="mpesanumber">Mpesa Number</label>
                                <input class="form-control py-4" name="mpesanumber" id="2mpesanumber" type="numbert"  placeholder="Mpesa Number" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="2transactionnumber">Transaction Number</label>
                                <input class="form-control py-4" name="2transactionnumber" id="2transactionnumber" type="text"  placeholder="Transaction Number:" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="2transdate">Transaction Date</label>
                                <input class="form-control py-4" name="2transdate" id="2transdate" type="date"  />
                            </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="2amount">Amount</label>
                                        <input class="form-control py-4" name="2amount" id="2amount" type="number" placeholder="Amount :" />
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