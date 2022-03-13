@extends('dist/main')

@section('content')
<div class="col-md-5 col-lg-3">
	<form action="store" id="settingform" method="post">
		<div class="card">
			<div class="card-header">
				<h4>Amount Declarations</h4>
			</div>
			<div class="card-body">
				<div class="form-group">			
					<label>Registration Fee</label>
					<div class="form-row">
						<div class="col-lg-4">
							<input type="number" class="form-control form-control-sm p-0 m-0" name="member_registration" placeholder="Amount">
						</div>
						<div class="col-lg-8">
							<select class="form-control form-control-sm" name = "occurance_member_registration" id ="occurance_member_registration">
								<option value="Yearly">Yearly</option>
								<option  value="Monthly">Monthly</option>
								<option  value="Weekly">Weekly</option>
								<option  value="Daily">Daily</option>
							</select> 
						</div>
					</div>	
				</div>
				<div class="form-group">			
					<label>Member Subscription fee</label>
					<div class="form-row">
						<div class="col-lg-4">
							<input type="number" class="form-control form-control-sm p-0 m-0" name="member_subscription" placeholder="Amount">
						</div>
						<div class="col-lg-8">
							<select class="form-control form-control-sm" name = "occuracnce_member_subscription" id ="occuracnce_member_subscription">
								<option value="Monthly">Monthly</option>
								<option  value="Yearly">Yearly</option>
								<option  value="Weekly">Weekly</option>
								<option  value="Daily">Daily</option>
							</select> 
						</div>
					</div>	

				</div>
				<div class="form-group">			
					<label>Welfare Registration fee</label>
					<div class="form-row">
						<div class="col-lg-4">
							<input type="number" class="form-control form-control-sm p-0 m-0" name="welfare_registration" placeholder="Amount">
						</div>
						<div class="col-lg-8">
							<select class="form-control form-control-sm" name = "occurance_welreg" id ="occurance_welreg">
								<option value="Monthly">Monthly</option>
								<option  value="Yearly">Yearly</option>
								<option  value="Weekly">Weekly</option>
								<option  value="Daily">Daily</option>
							</select> 
						</div>
					</div>		
				</div>
				<div class="form-group">			
					<label>Welfare Subscription fee</label>
					<div class="form-row">
						<div class="col-lg-4">
							<input type="number" class="form-control form-control-sm p-0 m-0" name="welfare_subscription" placeholder="Amount">
						</div>
						<div class="col-lg-8">
							<select class="form-control form-control-sm" name = "occurance_welfare_subscription" id ="occurance_welfare_subscription">
								<option value="Monthly">Monthly</option>
								<option  value="Yearly">Yearly</option>
								<option  value="Weekly">Weekly</option>
								<option  value="Daily">Daily</option>
							</select> 
						</div>
					</div>		
				</div>

			</div>
			<div class="card-footer p-1 m-1">
				<div class="form-group" align="right">
					<button class="btn btn-info" name="save" type="submit">Save</button>
				</div>
			</div>
		</div>
	</form>	
</div>

<script type ="text/javascript">
	$('#settingform').submit(function(e) {
		e.preventDefault();
		var form = $(this);
		$.ajax({
			type : "POST",
			url : 'settingamount',
			data : form.serialize(),
			success : function(data)
			{
				console.log(data);
			} 
		});
	});      

</script>


@endsection