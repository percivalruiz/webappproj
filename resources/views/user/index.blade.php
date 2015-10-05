<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#register_btn').click(function() {
					var username = $('#username').val();
					var token = $('input[name=_token]').val();
					var email = $('#email').val();
					var password = $('input[name=password]').val();
					var password_confirmation = $('input[name=password_confirmation]').val();
					var date_of_registration = $('#date_of_registration').val();
					var first_name = $('#first_name').val();
					var middle_name = $('#middle_name').val();
					var last_name = $('#last_name').val();
					var date_of_birth = $('#date_of_birth').val();
					var age = $('#age').val();
					var weigth = $('#weigth').val();
					var sex = $('#sex option:selected').val();
					var profession = $('#profession').val();
					var blood_type = $('#blood_type option:selected').val();
					var donation_status = $("input[type=radio][name=donation_status]:checked").val();
					var donation_status_details = $('input[name=donation_status_details]').val();



			        $.ajax({
			          url:'user/register',
			          type: "post",
			          data: {'username':username, 'email':email, 'password':password,
			          	'password_confirmation': password_confirmation, 'first_name':first_name,
			          	'date_of_registration' : date_of_registration,  'last_name':last_name,
			          	'date_of_birth':date_of_birth, 'age':age, 'weigth':weigth, 'sex':sex,
			          	'profession':profession, 'blood_type':blood_type,
			          	'donation_status':donation_status, 'donation_status_details':donation_status_details,
			            '_token': $('input[name=_token]').val()
			      		},
			          success: function(data){
			            alert(data.msg);
			          },
			          error: function(data){
			          	var response = JSON.parse(data.responseText);
			          	var errString ="";
			          	if(response.errors.username!= null){
			          		errString=errString + response.errors.username + "\n";
			          		$('#username_cg').addClass("has-error");
			          	}
			          	if(response.errors.email!= null){
			          		errString = errString + response.errors.email + "\n";
			          		$('#email_cg').addClass("has-error");
			          	}
			          	if(response.errors.password!= null){
			          		errString = errString + response.errors.password + "\n";
			          		$('#password_cg').addClass("has-error");
			          	}
			          	if(response.errors.password_confirmation!= null){
			          		errString = errString + response.errors.password_confirmation + "\n";
			          		$('#password_confirmation_cg').addClass("has-error");
			          	}
			          	if(response.errors.date_of_registration!= null){
			          		errString = errString + response.errors.date_of_registration + "\n";
			          		$('#date_of_registration_cg').addClass("has-error");
			          	}
			          	if(response.errors.first_name!= null){
			          		errString = errString + response.errors.first_name + "\n";
			          		$('#first_name_cg').addClass("has-error");
			          	}
			          	if(response.errors.last_name!= null){
			          		errString = errString + response.errors.last_name + "\n";
			          		$('#last_name_cg').addClass("has-error");
			          	}
			          	if(response.errors.date_of_birth!= null){
			          		errString = errString + response.errors.date_of_birth + "\n";
			          		$('#date_of_birth_cg').addClass("has-error");
			          	}
			          	if(response.errors.donation_status_details!= null){
			          		errString = errString + response.errors.donation_status_details + "\n";
			          		$('#donation_status_details_cg').addClass("has-error");
			          	}
			          	if(response.errors.age!= null){
			          		errString = errString + response.errors.age + "\n";
			          		$('#age_cg').addClass("has-error");
			          	}
			          	if(response.errors.weigth!= null){
			          		errString = errString + response.errors.weigth + "\n";
			          		$('#weigth_cg').addClass("has-error");
			          	}
			          	alert(errString);
			          }
			        });

			        return false;
			    });
			});
		</script>
    </head>
    <body>
    	<div class="container">	
    		<h4>Registration Form</h4>
    		<small>All fields marked with * are mandatory.</small>
    		<br><br>

			{!! Form::open(array('method'=>'POST', 'id'=>'myform')) !!}

			    <div id="email_cg" class="control-group">
			      <!-- E-mail -->
			      <label class="control-label" for="email">E-mail *</label>
			      <div class="controls">
			        {!! Form::text('email','',array('id'=>'email',)) !!}
			      </div>
			    </div>
			    <br>
				<div id="username_cg" class="control-group">
			      <!-- Username -->
			      <label class="control-label"  for="username">Username *</label>
			      <div class="controls">
			        {!! Form::text('username','',array('id'=>'username',)) !!}
			      </div>
			    </div>
			    <br>
			    <div id="password_cg" class="control-group">
			      <!-- Password-->
			      <label class="control-label" for="password">Password *</label>
			      <div class="controls">
			        {!! Form::password('password','',array('id'=>'password',)) !!}
			      </div>
			    </div>
			    <br>
			    <div id="password_confirm_cg" class="control-group">
			      <!-- Password Confirm -->
			      <label class="control-label"  for="password_confirm">Password (Confirm) *</label>
			      <div class="controls">
			        {!! Form::password('password_confirmation','',array('id'=>'password_confirmation',)) !!}
			      </div>
			    </div>
			    <br>
			    <div id="date_of_registration_cg"class="control-group">
			      <!-- Date of Registration -->
			      <label class="control-label"  for="date_of_registration">Date of Registration (d-m-Y) *</label>
			      <div class="controls">
			        {!! Form::text('date_of_registration','',array('id'=>'date_of_registration',)) !!}
			      </div>
			    </div>
			    <br>
			    <div id="first_name_cg" class="control-group">
			      <!-- First Name -->
			      <label class="control-label"  for="first_name">First Name *</label>
			      <div class="controls">
			        {!! Form::text('first_name','',array('id'=>'first_name',)) !!}
			      </div>
			    </div>
			    <br>
			    <div id="middle_name_cg" class="control-group">
			      <!-- Middle Name -->
			      <label class="control-label"  for="middle_name">Middle Name</label>
			      <div class="controls">
			        {!! Form::text('middle_name','',array('id'=>'middle_name',)) !!}
			      </div>
			    </div>
			    <br>
			    <div  id="last_name_cg"class="control-group">
			      <!-- Last Name -->
			      <label class="control-label"  for="last_name">Last Name *</label>
			      <div class="controls">
			        {!! Form::text('last_name','',array('id'=>'last_name',)) !!}
			      </div>
			    </div>
			    <br>
			    <div id="date_of_birth_cg" class="control-group">
			      <!-- Date of Birth -->
			      <label class="control-label"  for="date_of_birth">Date of Birth (Y-m-d, example: 1992-04-17) *</label>
			      <div class="controls">
			        {!! Form::text('date_of_birth','',array('id'=>'date_of_birth',)) !!}
			      </div>
			    </div>
			    <br>
			    <div id="age_cg" class="control-group">
			      <!-- Age -->
			      <label class="control-label"  for="age">Age *</label>
			      <div class="controls">
			        {!! Form::text('age','',array('id'=>'age',)) !!}
			      </div>
			    </div>
			    <br>

			    <div id="weigth_cg" class="control-group">
			      <!-- Weigth -->
			      <label class="control-label"  for="weigth">Weigth (kg) *</label>
			      <div class="controls">
			        {!! Form::text('weigth','',array('id'=>'weigth',)) !!}
			      </div>
			    </div>
			    <br>
			    <div id="sex_cg" class="control-group">
			      <!-- Sex -->
			      <label class="control-label"  for="sex">Sex *</label>
			      <div class="controls">
			        {!! Form::select('sex', array('M' => 'Male', 'F' => 'Female'),'',array('id'=>'sex')); !!}
			      </div>
			    </div>
			    <br>
			    <div id="profession_cg" class="control-group">
			      <!-- Profession -->
			      <label class="control-label"  for="profession">Profession</label>
			      <div class="controls">
			        {!! Form::text('profession','',array('id'=>'profession',)) !!}
			      </div>
			    </div>
			    <br>
			    <div id="blood_type_cg" class="control-group">
			      <!-- Blood Type -->
			      <label class="control-label"  for="blood_type">Blood Type (Please do not indicate your Blood Type unless you are 100% certain) *</label>
			      <div class="controls">
			        {!! Form::select('blood_type', array('O+' => 'O+',
			         'A+' => 'A+',
			         'B+' => 'B+',
			         'AB+' => 'AB+',
			         'AB-' => 'AB-',
			         'B-' => 'B-',
			         'A-' => 'A-',
			         'O-' => 'O-',
			         'not_sure' => 'not sure'), '', array('id'=>'blood_type')); 
			        !!}
			      </div>
			    </div>
			    <br>
			    <div class="control-group">
			      <!-- Profile Photo -->
			      <label class="control-label"  for="image">Profile Photo</label>
			      <div class="controls">
			    	{!! Form::file('image'); !!}
			      </div>
			    </div>
			    <br>
			    <div id="donation_status_cg" class="control-group">
			      <!-- donation -->
			      <h4>Can you donate? *</h4>
			      <div class="controls">
			        {!! Form::radio('donation_status', 'Yes', true) !!} Yes!!! :)
			        {!! Form::radio('donation_status', 'No', false) !!} No...
			      </div>
			    </div>
			    <div id="donation_status_details_cg" class="control-group">
				  <label class="control-label"  for="image">if No, please indicate why. 
				  	<br> don't worry you can update this if you changed your mind.</label>
				  	<br>
				  	{!! Form::textarea('donation_status_details', null, ['size' => '40x5']) !!}
				</div>

			    <br><br>

			{!! Form::button('Submit', array('class'=>'btn btn-primary', 'id'=>'register_btn')) !!}
			{!! Form::close() !!}

		    <br><br>
		</div>
    </body>

</html>


