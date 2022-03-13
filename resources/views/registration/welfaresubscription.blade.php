<form method="POST" id="welfareform" action="welfareformsub">
	@csrf
		<label style="text-decoration: underline; align-content: center;"><strong>WELFARE SUBSCRIPTION FORM</strong></label>
  		<div class="form-group">
		<div class="input-group may-0">
            <input class="form-control" name="idnumber" id="idnumber" type="text" placeholder="Search with ID" />
            <div class="input-group-append">
                <button class="btn btn-primary" id="sr" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
        </div>

        <div class="form-row">
         <div class="col-md-12">
            <label id="search" for="fullname">Full Name</label>
            <input  class="form-control form-control-sm" id="fullname" type="text" name = "fullname" placeholder="Full Name"  required="true"/>
        </div>
        <div class="col-md-12">
            <label id="search" for="MemNo">MemNo</label>
            <input class="form-control form-control-sm" type="text" id="MemNo" name = "RegNo"  placeholder="Member No." required="true"/>
        </div>
        <div class="col-md-12">
            <label id="search" for="phone">Phone Number</label>
            <input class="form-control form-control-sm" type="text" id="phone" name = "phone" placeholder="Phone Number" required="true"/>
        </div>
    </div>
    <hr>
    <div class="form-group">      
      <ol>
        <label><strong>Expected Amount on registration</strong></label>
        <input type="hidden" name="welfareregistrationfee" value="{{$Amount}}"><li>Welfare registration fee of KES. <strong>{{$Amount}}</strong></li>
        <input type="hidden" name="monthlyshares" value="{{$Amount}}"><li>Monthly shares of KES. <strong>{{$Amount}}</strong></li>
      </ol>
    </div>
    <hr>
    <div class="form-group"align="center">
      <div class="form-row">
        <div class="form-group">
          <label>Amount</label>
        </div>
        <div class="form-group" style="margin-left: 5px;">
          <input type="number" class="form-control form-control-sm" name="amount" value="{{$Amount}}">
        </div>
      </div>
    </div>
    <div class="form-group" align="center">
      <button type="submit"  class="btn btn-primary items-align-end">Save</button>
    </div>
</div>
</form>


<script type ="text/javascript">
   $('#monthly').change(function() {
      var x = document.getElementById("monthsdiv");
      if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }

});

</script>
<script type ="text/javascript">
   $('#welfareform').submit(function(e) {
      e.preventDefault();
      var form = $(this);
      var str = "ID: "+$("#idnumber").val()+"\n"+"Name: "+$("#fullname").val()+'\n'+"Phone: "+$("#phone").val()+'\n'+"Amount:"
      Swal.fire({
        title: "CONFIRM YOUR DETAILS",
        html: '<pre>' + str + '</pre>',
        icon: "question",
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: `CONFIRM`,
        cancelButtonText: `CANCEL`,
    }).then((result)=>{
        if (result.isConfirmed){
            var urlaction = form.attr('action');
            $.ajax({
                type : "POST",
                url : urlaction,
                data : form.serialize(),
                success : function(data)
                {
                   Swal.fire({
                      title: "STATUS REPORT",
                      text: data,
                      icon: "danger",
                      showDenyButton: false,
                      showCancelButton: false,
                      confirmButtonText: `OK`,
                      denyButtonText: `Don't save`,
                  })  
               } 
           });
        }else{

        }
    })


});

</script>
<script type ="text/javascript">
 $("#sr").click(function(e){
    var x = $('#idnumber').val();
    e.preventDefault();
    $.ajax({
        type: 'GET',
        url: '/searchuser/'+x,
        success:function(response){
          // console.log(response['0'].First_name);
            $('#fullname').val(response['0'].First_name+' '+response['0'].Middle_name+' '+response['0'].Last_Name);
            $('#phone').val(response['0'].Phone);
            $('#MemNo').val(response['0'].Id_nmber);
            
        }
    });
    
});
</script>
<script type="text/javascript">
    $('#registration').change(function(){if ($('#registration').is(':checked')) {$('#total').val(parseInt($('#total').val()) + 100);}else{$('#total').val(parseInt($('#total').val()) - 100); }});
    $('#jan').change(function(){if ($('#jan').is(':checked')) {$('#total').val(parseInt($('#total').val()) + 100);}else{$('#total').val(parseInt($('#total').val()) - 100);}});
    $('#feb').change(function(){if ($('#feb').is(':checked')) {$('#total').val(parseInt($('#total').val()) + 100);}else{$('#total').val(parseInt($('#total').val()) - 100);}});
    $('#march').change(function(){if ($('#march').is(':checked')) {$('#total').val(parseInt($('#total').val()) + 100);}else{$('#total').val(parseInt($('#total').val()) - 100);}});
    $('#april').change(function(){if ($('#april').is(':checked')) {$('#total').val(parseInt($('#total').val()) + 100);}else{$('#total').val(parseInt($('#total').val()) - 100);}});
    $('#may').change(function(){if ($('#may').is(':checked')) {$('#total').val(parseInt($('#total').val()) + 100);}else{$('#total').val(parseInt($('#total').val()) - 100);}});
    $('#june').change(function(){if ($('#june').is(':checked')) {$('#total').val(parseInt($('#total').val()) + 100);}else{$('#total').val(parseInt($('#total').val()) - 100);}});
    $('#july').change(function(){if ($('#july').is(':checked')) {$('#total').val(parseInt($('#total').val()) + 100);}else{$('#total').val(parseInt($('#total').val()) - 100);}});
    $('#aug').change(function(){if ($('#aug').is(':checked')) {$('#total').val(parseInt($('#total').val()) + 100);}else{$('#total').val(parseInt($('#total').val()) - 100);}});
    $('#sept').change(function(){if ($('#sept').is(':checked')) {$('#total').val(parseInt($('#total').val()) + 100);}else{$('#total').val(parseInt($('#total').val()) - 100);}});
    $('#oct').change(function(){if ($('#oct').is(':checked')) {$('#total').val(parseInt($('#total').val()) + 100);}else{$('#total').val(parseInt($('#total').val()) - 100);}});
    $('#nov').change(function(){if ($('#nov').is(':checked')) {$('#total').val(parseInt($('#total').val()) + 100);}else{$('#total').val(parseInt($('#total').val()) - 100);}});
    $('#dec').change(function(){if ($('#dec').is(':checked')) {$('#total').val(parseInt($('#total').val()) + 100);}else{$('#total').val(parseInt($('#total').val()) - 100);}});
    
    $('#yearly').change(function() {
        if($("#jan").is(':checked')){document.getElementById('jan').checked = false;}else{document.getElementById('jan').checked = true;}
        if($("#feb").is(':checked')){document.getElementById('feb').checked = false;}else{document.getElementById('feb').checked = true;}
        if($("#march").is(':checked')){document.getElementById('march').checked = false;}else{document.getElementById('march').checked = true;}
        if($("#april").is(':checked')){document.getElementById('april').checked = false;}else{document.getElementById('april').checked = true;}
        if($("#may").is(':checked')){document.getElementById('may').checked = false;}else{document.getElementById('may').checked = true;}
        if($("#june").is(':checked')){document.getElementById('june').checked = false;}else{document.getElementById('june').checked = true;}
        if($("#july").is(':checked')){document.getElementById('july').checked = false;}else{document.getElementById('july').checked = true;}
        if($("#aug").is(':checked')){document.getElementById('aug').checked = false;}else{document.getElementById('aug').checked = true;}
        if($("#sept").is(':checked')){document.getElementById('sept').checked = false;}else{document.getElementById('sept').checked = true;}
        if($("#oct").is(':checked')){document.getElementById('oct').checked = false;}else{document.getElementById('oct').checked = true;}
        if($("#nov").is(':checked')){document.getElementById('nov').checked = false;}else{document.getElementById('nov').checked = true;}
        if($("#dec").is(':checked')){document.getElementById('dec').checked = false;}else{document.getElementById('dec').checked = true;}
    });
</script>


