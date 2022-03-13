<div class="col-md-6">
	<form action="register" method ="POST">
        @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1"  for="inputFirstName">First Name</label>
                        <input class="form-control py-4" name="firstname" id="inputFirstName" type="text" placeholder="Enter first name" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="inputLastName">Last Name</label>
                        <input class="form-control py-4" name="lastname" id="inputLastName" type="text" placeholder="Enter last name" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="inputEmailAddress">Email</label>
                <input class="form-control py-4" name="email" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="inputPassword">Password</label>
                        <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                        <input class="form-control py-4" name="confirmpassword" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
                    </div>
                </div>
            </div>
            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submin" >Create Account</button></div>
        </form>
</div>
