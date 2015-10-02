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
					var password_confirm = $('input[name=password_confirm]').val();
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



			        $.ajax({
			          url:'user/register',
			          type: "post",
			          data: {'username':username, 'email':email, 'password':password, '_token': $('input[name=_token]').val(),
			          	'first_name':first_name
			      		},
			          success: function(data){
			            alert(data.msg);
			          },
			          error: function(data){
			          	var response = JSON.parse(data.responseText);
			          	var errString ="";
			          	if(response.errors.username!= null){
			          		errString=errString + response.errors.username + "\n";
			          	}
			          	if(response.errors.email!= null){
			          		errString = errString + response.errors.email + "\n";
			          	}
			          	alert(errString);
			          }
			        });
			        /*alert(username+' '+email+' '+password+' '+password_confirm+' '+ date_of_registration
			        	+' '+ first_name+ ' ' + middle_name+ ' ' + last_name+ ' '+ date_of_birth+ ' '+ age
			        	+ ' ' + age + ' ' + weigth + ' ' + profession + ' ' + sex + ' ' + blood_type); */
					
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

			    <div class="control-group">
			      <!-- E-mail -->
			      <label class="control-label" for="email">E-mail *</label>
			      <div class="controls">
			        {!! Form::text('email','',array('id'=>'email',)) !!}
			      </div>
			    </div>

				<div class="control-group">
			      <!-- Username -->
			      <label class="control-label"  for="username">Username *</label>
			      <div class="controls">
			        {!! Form::text('username','',array('id'=>'username',)) !!}
			      </div>
			    </div>

			    <div class="control-group">
			      <!-- Password-->
			      <label class="control-label" for="password">Password *</label>
			      <div class="controls">
			        {!! Form::password('password','',array('id'=>'password',)) !!}
			      </div>
			    </div>

			    <div class="control-group">
			      <!-- Password -->
			      <label class="control-label"  for="password_confirm">Password (Confirm) *</label>
			      <div class="controls">
			        {!! Form::password('password_confirm','',array('id'=>'password_confirm',)) !!}
			      </div>
			    </div>

			    <div class="control-group">
			      <!-- Date of Registration -->
			      <label class="control-label"  for="date_of_registration">Date of Registration (DD-MM-YYYY) *</label>
			      <div class="controls">
			        {!! Form::text('date_of_registration','',array('id'=>'date_of_registration',)) !!}
			      </div>
			    </div>

			    <div class="control-group">
			      <!-- First Name -->
			      <label class="control-label"  for="first_name">First Name *</label>
			      <div class="controls">
			        {!! Form::text('first_name','',array('id'=>'first_name',)) !!}
			      </div>
			    </div>

			    <div class="control-group">
			      <!-- Middle Name -->
			      <label class="control-label"  for="middle_name">Middle Name</label>
			      <div class="controls">
			        {!! Form::text('middle_name','',array('id'=>'middle_name',)) !!}
			      </div>
			    </div>

			    <div class="control-group">
			      <!-- Last Name -->
			      <label class="control-label"  for="last_name">Last Name *</label>
			      <div class="controls">
			        {!! Form::text('last_name','',array('id'=>'last_name',)) !!}
			      </div>
			    </div>

			    <div class="control-group">
			      <!-- Date of Birth -->
			      <label class="control-label"  for="date_of_birth">Date of Birth (YYYY-MM-DD, example: 1976-11-08) *</label>
			      <div class="controls">
			        {!! Form::text('date_of_birth','',array('id'=>'date_of_birth',)) !!}
			      </div>
			    </div>

			    <div class="control-group">
			      <!-- Age -->
			      <label class="control-label"  for="age">Age *</label>
			      <div class="controls">
			        {!! Form::text('age','',array('id'=>'age',)) !!}
			      </div>
			    </div>


			    <div class="control-group">
			      <!-- Weigth -->
			      <label class="control-label"  for="weigth">Weigth *</label>
			      <div class="controls">
			        {!! Form::text('weigth','',array('id'=>'weigth',)) !!}
			      </div>
			    </div>

			    <div class="control-group">
			      <!-- Sex -->
			      <label class="control-label"  for="sex">Sex *</label>
			      <div class="controls">
			        {!! Form::select('sex', array('M' => 'Male', 'F' => 'Female'),'',array('id'=>'sex')); !!}
			      </div>
			    </div>

			    <div class="control-group">
			      <!-- Profession -->
			      <label class="control-label"  for="profession">Profession</label>
			      <div class="controls">
			        {!! Form::text('profession','',array('id'=>'profession',)) !!}
			      </div>
			    </div>

			    <div class="control-group">
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

			    <div class="control-group">
			      <!-- Profile Photo -->
			      <label class="control-label"  for="image">Profile Photo</label>
			      <div class="controls">
			    	{!! Form::file('image'); !!}
			      </div>
			    </div>

			    <br><br>

			{!! Form::button('Submit', array('class'=>'btn btn-primary', 'id'=>'register_btn')) !!}
			{!! Form::close() !!}

		    <br><br>
		</div>
    </body>

</html>


