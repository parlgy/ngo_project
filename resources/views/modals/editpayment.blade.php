
<div class="modal fade in" id="payments">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modaltitle">Edit Member details</h5>

            </div>
            <div class="modal-body">
                <form action="editpayment" method ="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-1"><label>Title</label></div>
                        <div class="form-group col-md-3"><input readonly="true" class="form-control" type="text" name="title" id="title"></div>
                        <div class="form-group col-md-2"><label>MemNo</label></div>
                        <div class="form-group col-md-4"><input readonly="true" class="form-control" type="text" name="memno" id ="regno"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3"><label>Name</label></div>
                        <div class="form-group col-md-9"><input readonly="true" class="form-control" type="text" name="full_name" id="full_name"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3"><label>ID Number</label></div>
                        <div class="form-group col-md-9"><input readonly="true" class="form-control" type="text" name="idnumber" id="idnumber"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3"><label class="small mb-1" for="mpesanumber">Mpesa Number</label></div>
                        <div class="form-group col-md-9"><input readonly="true" class="form-control" name="mpesanumber" id="phone" type="numbert"  placeholder="Mpesa Number" /></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3"><label class="small mb-1" for="transactionnumber">Transaction Number</label></div>
                        <div class="form-group col-md-7"><input readonly="true" class="form-control" name="transactionnumber" id="transactionnumber" type="text"  placeholder="Transaction Number:" />
                        </div>
                        <div class="form-group col-md-2">
                            <input class="form-control" readonly="true" type="text" name="payid" id="payid">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3"><label class="small mb-1" for="transdate">Transaction Date</label></div>
                        <div class="form-group col-md-9"><input readonly="true" class="form-control" name="transdate" id="transdate" type="text"  /></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3"><label class="small mb-1" for="amount">Amount:</label></div>
                        <div class="form-group col-md-9"><input readonly="true" class="form-control" name="amount" id="amount" type="number" placeholder="Amount" /></div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="small mb-1"  for="amount">Amount.</label>
                            <input readonly="true" class="form-control" name="amount" id="amount" type="text" plasceholder="Amount." />
                            <label>Remain:</label>
                            <input class="form-control" readonly="true" type="text" name="rem" id="rem">
                        </div>
                        <div class="form-group col-md-10" style="border: solid; border-bottom: 0em; border-right: 0em; border-top: 0em;">

                            <div class="form-row">
                                <div class="form-group col-md-6"><label>Member Registration: </label></div>
                                <div class="form-group col-md-6"><input class="form-control" type="number" name="memberregistration" id="memberregistration"></div>                  
                                <div class="form-group col-md-6"><label>Member Subscription: </label></div>
                                <div class="form-group col-md-6"><input class="form-control" type="number" name="membersubcription" id="membersubcription"></div>                   
                                <div class="form-group col-md-6"><label>Welfare Registration: </label></div>
                                <div class="form-group col-md-6"><input class="form-control" type="number" name="welfareregistrati" id="welfareregistrati"></div>
                                <div class="form-group col-md-6"><label>Welfare Subscription: </label></div>
                                <div class="form-group col-md-6"><input class="form-control" type="number" name="welfaresubcription" id="welfaresubcription"></div>
                            </div>   

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-danger" href="">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade in" id="unmerged">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modaltitle">Edit Member details</h5>

            </div>
            <div class="modal-body">
                <form method="POST" action="merge">
                    @csrf
                    <div class="form-group">
                        <label class="small mb-1" for="mpesanumber">Mpesa Number</label>
                        <input readonly="true" class="form-control" name="mpesanumber" id="mpesanumber" type="numbert"  placeholder="Mpesa Number" />
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label class="small mb-1" for="2transactionnumber">Transaction Number</label>
                            <input readonly="true" class="form-control" name="transactionnumber" id="transactionnumber" type="text"  placeholder="Transaction Number:" />
                        </div>
                        <div class="form-group col-md-2">
                            <label></label>
                            <input class="form-control" readonly="true" type="text" name="payid" id="payid">
                        </div>
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
                        <label class="small mb-1" for="account">Account Number:</label>
                        <input  class="form-control" name="account" id="account" type="number" placeholder="Account Number" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"  class="btn btn-danger" href="">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </form>                       
            </div>
        </div>
    </div>
</div>
</div> 
<script>
    $('#unmerged').on('show.bs.modal',function(event){

        var button = $(event.relatedTarget)
        var reciept = button.data('reciept')
        var amount = button.data('amount')
        var transactiondate = button.data('transactiondate')
        var phonenumber = button.data('phonenumber')
        var payid = button.data('payid')

        var modal = $(this);
        modal.find('.modaltitle').text('EDIT UN-MERGED TRANSACTIONS DETAILS');
        modal.find('.modal-body #mpesanumber').val(phonenumber);
        modal.find('.modal-body #transactionnumber').val(reciept);
        modal.find('.modal-body #transdate').val(transactiondate);
        modal.find('.modal-body #amount').val(amount);
        modal.find('.modal-body #payid').val(payid);

    });
</script>  
<script>
 $('#payments').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var regno = button.data('regno')
    var church = button.data('church')
    var name = button.data('full_name')
    var subcounty = button.data('sub_county')
    var ward = button.data('ward')
    var phone = button.data('phone')
    var title = button.data('title')
    var email = button.data('email')
    var transaction = button.data('transaction')
    var transactiondate = button.data('tdate')
    var amount = button.data('amount');
    var idnumber =button.data('idnumber')
    var payid = button.data('payid')


    var modal = $(this)
    modal.find('.modaltitle').text('EDIT MEMBER DETAILS');
    modal.find('.modal-body #regno').val(regno);
    modal.find('.modal-body #full_name').val(name);
    modal.find('.modal-body #subcounty').val(subcounty);
    modal.find('.modal-body #ward').val(ward);
    modal.find('.modal-body #title').val(title);
    modal.find('.modal-body #phone').val(phone);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #transactionnumber').val(transaction);
    modal.find('.modal-body #transdate').val(transactiondate);
    modal.find('.modal-body #amount').val(amount);
    modal.find('.modal-body #rem').val(amount);
    modal.find('.modal-body #idnumber').val(idnumber);
    modal.find('.modal-body #payid').val(payid);

});
</script>
<script>
    $('#memberregistration').on('change',function(){
        checkout(parseInt($('#memberregistration').val() ? $('#memberregistration').val() : 0));
    });
    $('#memberregistration').keyup(function(){
        checkout(parseInt($('#memberregistration').val() ? $('#memberregistration').val() : 0));
    });

    $('#membersubcription').keyup(function(){
        checkout(membersubcription = parseInt($('#membersubcription').val() ? $('#membersubcription').val() : 0));
    });
    $('#membersubcription').on('change',function(){
        checkout(parseInt($('#membersubcription').val() ? $('#membersubcription').val() : 0));
    });

    $('#welfareregistrati').keyup(function(){
        checkout( parseInt($('#welfareregistrati').val() ? $('#welfareregistrati').val() : 0));
    });
    $('#welfareregistrati').on('change',function(){
        checkout(parseInt($('#welfareregistrati').val() ? $('#welfareregistrati').val() : 0));
    });

    $('#welfaresubcription').keyup(function(){
        checkout(parseInt($('#welfaresubcription').val() ? $('#welfaresubcription').val(): 0));
    }); 
    $('#welfaresubcription').on('change',function(){
        checkout(parseInt($('#welfaresubcription').val() ? $('#welfaresubcription').val() : 0));
    });       

    function checkout(amounts){
        var remainder = parseInt($('#rem').val() ? $('#rem').val() : 0);
        var amount = parseInt($('#amount').val() ? $('#amount').val() : 0);
        var membersubcription = parseInt($('#membersubcription').val() ? $('#membersubcription').val() : 0);
        var memberregistration = parseInt($('#memberregistration').val() ? $('#memberregistration').val() : 0);
        var welfaresubcription = parseInt($('#welfaresubcription').val() ? $('#welfaresubcription').val(): 0);
        var welfareregistrati = parseInt($('#welfareregistrati').val() ? $('#welfareregistrati').val() : 0);
        var total = membersubcription + memberregistration + welfaresubcription + welfareregistrati;
        if(amounts >= 0){
            if(remainder >= amounts || amount >= total){
                $('#rem').val(amount-total);
            }else{
                alert('Total Exceeds the amount '+'Remainder '+remainder+" "+"Total"+total);
            }
        }else{
            alert('bad');
        }
    }
</script>