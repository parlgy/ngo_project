 <div class="modal fade in" id="members">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modaltitle">Edit Member </h5>

                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small mb-1" for="memno">Mem No.</label>
                                    <input readonly="true" class="form-control" name="memno" id="memno" type="number"  placeholder="MemberNo" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small mb-1" for="title">Title</label>
                                    <input readonly="true" class="form-control" name="title" id="title" type="text"  placeholder="Title" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small mb-1" for="year">Year</label>
                                    <input readonly="true" class="form-control" name="year" id="year" type="text"  placeholder="Year" />
                                </div>
                            </div>
                           
                        </div>
                         <div class="form-group">
                                <label class="small mb-1" for="name">Name</label>
                                <input readonly="true" class="form-control" name="name" id="name" type="text"  placeholder="Full Name" />
                            </div>
                        <div class="form-group">
                            <label class="small mb-1" for="church">Church</label>
                            <input readonly="true" class="form-control" name="church" id="church" type="numbert"  placeholder="Church" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="2transactionnumber">Transaction Number</label>
                            <input readonly="true" class="form-control" name="transactionnumber" id="transactionnumber" type="text"  placeholder="Transaction Number:" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="transdate">Transaction Date</label>
                            <input readonly="true" class="form-control" name="transdate" id="transdate" type="text"  />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="amount">Amount:</label>
                            <input readonly="true" class="form-control" name="amount" id="amount" type="number" placeholder="Account Number :" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="yearreg">Registration Year:</label>
                            <input class="form-control" name="yearreg" id="yearreg" type="text" placeholder="Year of Registration :" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" href="">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>                        
                    </div>
                </form>
            </div>
        </div>
    </div>

