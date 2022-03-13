<script>
        $('#editmemberpay').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget)
            var regno = button.data('regno')
            var church = button.data('church')
            var name = button.data('full_name')
            var subcounty = button.data('sub_county')
            var ward = button.data('ward')
            var phone = button.data('phone')
            var title = button.data('title')
            var email = button.data('email')
            var amount= button.data('amount')
            var tran = button.data('transaction')


            var modal = $(this);
            modal.find('.modaltitle').text('MEMBER PAYMENT DETAILS');
            modal.find('.modal-body #regno').val(regno);
            modal.find('.modal-body #church').val(church);
            modal.find('.modal-body #full_name').val(name);
            modal.find('.modal-body #subcounty').val(subcounty);
            modal.find('.modal-body #ward').val(ward);
            modal.find('.modal-body #title').val(title);
            modal.find('.modal-body #phone').val(phone);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #amount').val(amount);
            modal.find('.modal-body #transaction').val(tran);

        });
    </script>

    <script>
        $('#registration').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget)
            var reciept = button.data('reciept')
            var amount = button.data('amount')
            var transactiondate = button.data('transactiondate')
            var phonenumber = button.data('phonenumber')
            var regno = button.data('regno')
            var title = button.data('title')
            var transactionnumber = button.data('transaction')
            var church = button.data('church')
            var regyear = button.data('years')
            var modal = $(this);
            modal.find('.modaltitle').text('EDIT MEMBER REGISTRATION DETAILS');
            modal.find('.modal-body #transactionnumber').val(phonenumber);
            modal.find('.modal-body #transdate').val(transactiondate);
            modal.find('.modal-body #amount').val(amount);
            modal.find('.modal-body #title').val(title);
            modal.find('.modal-body #transaction').val(transaction);
            modal.find('.modal-body #church').val(church);
            modal.find('.modal-body #year').val(regyear);

        });
    </script>

     <script>
        $('#unmerged').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget)
            var reciept = button.data('reciept')
            var amount = button.data('amount')
            var transactiondate = button.data('transactiondate')
            var phonenumber = button.data('phonenumber')

            var modal = $(this);
            modal.find('.modaltitle').text('EDIT UN-MERGED TRANSACTIONS DETAILS');
            modal.find('.modal-body #mpesanumber').val(reciept);
            modal.find('.modal-body #transactionnumber').val(phonenumber);
            modal.find('.modal-body #transdate').val(transactiondate);
            modal.find('.modal-body #amount').val(amount);
            modal.find('.modal-body #rem').val(amount);

        });
    </script>

        <script>
     $('#editmodal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var regno = button.data('regno')
        var church = button.data('church')
        var name = button.data('full_name')
        var subcounty = button.data('sub_county')
        var ward = button.data('ward')
        var phone = button.data('phone')
        var title = button.data('title')
        var email = button.data('email')


        var modal = $(this)
        modal.find('.modaltitle').text('EDIT MEMBER DETAILS');
        modal.find('.modal-body #regno').val(regno);
        modal.find('.modal-body #church').val(church);
        modal.find('.modal-body #full_name').val(name);
        modal.find('.modal-body #subcounty').val(subcounty);
        modal.find('.modal-body #ward').val(ward);
        modal.find('.modal-body #title').val(title);
        modal.find('.modal-body #phone').val(phone);
        modal.find('.modal-body #email').val(email);

    })
</script>
<script>
        $('#unmerged').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget)
            var reciept = button.data('reciept')
            var amount = button.data('amount')
            var transactiondate = button.data('transactiondate')
            var phonenumber = button.data('phonenumber')

            var modal = $(this);
            modal.find('.modaltitle').text('EDIT UN-MERGED TRANSACTIONS DETAILS');
            modal.find('.modal-body #mpesanumber').val(reciept);
            modal.find('.modal-body #transactionnumber').val(phonenumber);
            modal.find('.modal-body #transdate').val(transactiondate);
            modal.find('.modal-body #amount').val(amount);

        });
    </script> 