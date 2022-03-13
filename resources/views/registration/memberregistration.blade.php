
<form action= "registermember" id="membershipform" method="POST">
  
  @csrf
  <div class="form-group">
    <label for="county">County </label>
    <select class="form-control form-control-sm" name = "county" id ="county">
      '<option value="None">Select County</option>
      <option  value="1">Kakamega</option>
      <option  value="2">Bungoma</option>
      <option  value="3">Busia</option>
      <option  value="4">Vihiga</option>
      <option  value="5">Trans-Nzoia</option>
    </select> 
  </div>
  <div class="form-group">
    <label for=" subcounty">Sub_County</label>
    <select class="form-control form-control-sm" id = "subcounty" name ="subcounty">
      @if(isset($subcounty))
      @foreach($subcounty as $subcounty)
      <option id="{{$ID}}" value="{{$ID}}">{{$sub_county}}</option>
      @endforeach
      @endif
    </select>
  </div>


  <div class="form-group">
    <label for=" ward">Ward</label>
    <select class="form-control form-control-sm" id = "ward" name = "ward">
      @if(isset($ward))
      @foreach($ward as $ward)
      <option id="{{$ID}}" value="{{$ID}}">{{$Ward_name}}</option>
      @endforeach
      @endif  
    </select>
  </div>
  <div class="form-group">
    <label for="location">Location</label>
    <select class="form-control form-control-sm" id = "location" name = "location">
      @if(isset($Location))
      @foreach($Location as $Location)
      <option id="{{$ID}}" value="{{$ID}}">{{$Location}}</option>
      @endforeach
      @endif  
    </select>
  </div>
  <div class="form-group">
    <label for=" sublocation">Sub_Location</label>
    <select class="form-control form-control-sm" id = "sublocation" name = "sublocation">
      @if(isset($sub_location))
      @foreach($sub_location as $sub_location)
      <option id="{{$ID}}" value="{{$ID}}">{{$sub_location}}</option>
      @endforeach
      @endif 
    </select>
  </div>
  <div class="form-group">
    <label for=" Village">Village</label>
    <input type="Village" class="form-control form-control-sm" id="Village" name ="Village"/> 
  </div> 
  <div class="form-group">
    <label for=" church">Church</label>
    <input type="church" class="form-control form-control-sm" id="church" name ="church"/> 
  </div>
  <div class="form-group">
    <label for=" First_name">First Name</label>
    <input type="text" class="form-control form-control-sm" name = "First_name" id="First_name"/> 
  </div>
  <div class="form-group">
    <label for=" Middle_card">Middle Name</label>
    <input type="text" class="form-control form-control-sm" name ="Middle_card" id="Middle_card"/> 
  </div>
  <div class="form-group">
    <label for=" Last_name">Last Name</label>
    <input type="text" class="form-control form-control-sm" name ="Last_name" id="Last_name"/> 
  </div>
  <div class="form-group">
    <label for="idnumber">ID number</label>
    <input type="text" class="form-control form-control-sm" name = "id"  id="id"/> 
  </div>
  <div class="form-group">
    <label for="dob">Date of Birth</label>
    <input type="date" class="form-control form-control-sm" name = "dob"  id="dob"/> 
  </div>

  <div class="form-group">
    <label for="Gender">Gender</label>       
    <select class="form-control form-control-sm" id = "gender" name = "gender">
      <option name ="Male">Male</option>
      <option name ="Female">Female</option>
    </select>
  </div>
  <div class="form-group">
    <label for="phone">Phone number</label>
    <input type="text"class="form-control form-control-sm" name = "phone" id="phone"/> 
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email"class="form-control form-control-sm" name ="email"  id="email"/> 
  </div>
  <hr>
  <div class="form-group">
    <label><strong>Expected Amount on registration</strong></label>
    <ol>
      <li><input type="hidden" name="registrationfee" value="{{$Amount}}">Registration Fee  KES. <strong>{{$Amount}}</strong></li>
    </ol>
  </div>
  <hr>
  <div class="form-row justify-content-center">
    <div class="form-group">
      <label>Amount</label>
    </div>
    <div class="form-group" style="margin-left: 3px;">
      <input type="number" class="form-control form-control-sm" value="{{$Amount}}" name="amount">
    </div>
  </div>
  <div class ="panel-heading text-right"><h1></h1>
    <div class='text-center panel-footer align-itemes-end'>
      <input class="btn btn-primary" type="submit" value = "Save"></input>
    </div>
  </div>
</form>
<script type ="text/javascript">
  $('#membershipform').submit(function(e) {
    e.preventDefault();
      var form = $(this);
      var str = "ID: "+$("#idnumber").val()+"\n"+"Name: "+$("#First_name").val()+' '+$("#Middle_card").val()+' '+$("#Last_name").val()+' '+'\n'+"Phone: "+$("#phone").val()+'\n'+"Amount:"+'\n'
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
              icon: "info",
              showDenyButton: false,
              showCancelButton: false,
              confirmButtonText: `OK`,
              denyButtonText: `Don't save`,
            })
      } 
    });
          }
        })
  });

</script>
<script type ="text/javascript">
 $("#subcounty").change(function(e){
  var x = $('#subcounty').val();
  e.preventDefault();
  $.ajax({
    type: 'GET',
    url: '/ward/'+x,
    success:function(response){
      $('#ward').html(response);
      
    }
  });

});
 $("#county").change(function(e){
  var x = $('#county').val();
  e.preventDefault();
  $.ajax({
    type: 'GET',
    url: '/subcounty/'+x,
    success:function(response){
      $('#subcounty').html(response);
    }
  });

});
 $("#ward").change(function(e){
  var x = $('#ward').val();
  e.preventDefault();
  $.ajax({
    type: 'GET',
    url: '/loacation/'+x,
    success:function(response){
      $('#location').html(response);
    }
  });

});
 $("#location").change(function(e){
  var x = $('#location').val();
  e.preventDefault();
  $.ajax({
    type: 'GET',
    url: '/sub_location/'+x,
    success:function(response){
      $('#sublocation').html(response);
    }
  });

});
 $("#amember").change(function(e){
  $("#formhere").load('welfar');    
});
</script>

