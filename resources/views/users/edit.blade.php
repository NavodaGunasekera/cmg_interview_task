<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>Edit User Details</title>
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body mt-3">
                <div class="row">
                    <div class="col">
                    <h3 class="card-title">Edit {{$user->fname}}'s Details</h3>
                    </div>
                    <div class="col">
                    <a href="{{url('/')}}" class="btn btn-success" style="float:right">Back to List</a>
                    </div>

                </div>
                
                <form method="POST" action="{{url('/update/'.$user->id)}}" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger" id="errorMessage">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                    <label for="fname"><b>First Name <span style="color: #d93025;">*</span></b></label>
                                    <input type="text" class="form-control" id="fname" name="fname" value="{{$user->fname}}" required>
                                </div>
                            </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="lname"><b>Last Name</b></label>
                                <input type="text" class="form-control" id="lname" name="lname" value="{{$user->lname}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="dob"><b>Date of Birth</b></label>
                                <input type="date" class="form-control" id="dob" name="dob" onclick="setDate()" value="{{$user->dob}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label ><b>Gender</b></label>
                                    <div class="form-inline form-group">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{$user->gender == "male"  ? 'checked' : ''}}>
                                            <label class="form-check-label" for="">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check ml-3">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="female"  {{$user->gender == "female"  ? 'checked' : ''}}>
                                            <label class="form-check-label" for="">
                                                Female
                                            </label>
                                        </div>
                                        
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email"><b>Email<span style="color: #d93025;">*</span></b></label>
                                <input type="email" class="form-control" id="email"  name="email" autocomplete="off" value="{{$user->email}}" required readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="phone"><b>Contact Number</b></label>
                                <input type="text" class="form-control" id="phone"  name="phone" value="{{$user->phone}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="password"><b>Password <span style="color: #d93025;">*</span></b></label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="off" onkeyup="passwordLength()" value="{{$user->password}}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="showPassword()"><i class="fas fa-eye" id="togglePassword" style=" cursor: pointer;"></i><i style="display: none;" id="hidepassword" class="fas fa-eye-slash"></i></span>
                                    </div>
                                </div>
                                <small id="length" class="form-text text-muted" >Use 8 or more characters</small>
                                <small id="invalidlength"  style="color:#d93025; display:none">Use 8 characters or more for your password</small>
                                
                            </div>
                            

                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="password"><b>Confirm Password <span style="color: #d93025;">*</span></b></label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"  onkeyup="checkPassword()">
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="showConfirmPassword()"><i class="fas fa-eye" id="toggleConfirmPassword" style=" cursor: pointer;"></i><i style="display: none;" id="hideConfirmPassword" class="fas fa-eye-slash"></i></span>
                                    </div>
                                    
                                </div>
                                <small id="errorpwd"  style="color:#d93025; display:none">Those passwords didn’t match. Try again.</small>
                                <small id="successfulpwd"  style="color:#05c054; display:none">Passwords match.</small>

                            </div>
                            
                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary ml-2" style="float:right;" disabled>Submit</button>
                    <button type="reset"  class="btn btn-secondary" style="float:right;" onclick="hideMessage()">Reset</button>
                </form>
            </div>

        </div>
        
    </div>

<script>

//Set timeout for hide status
const msgTimeout = setTimeout(hideMessage, 10000);


//Hide status
function hideMessage() {
    var elm1=document.getElementById("errorMessage");
    if(elm1){

        document.getElementById("errorMessage").style.display="none";
    }
    

}

//Display and hide password value
function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
      document.getElementById("togglePassword").style.display="none";
      document.getElementById("hidepassword").style.display="block";
    x.type = "text";
  } else {
    x.type = "password";
    document.getElementById("hidepassword").style.display="none";
      document.getElementById("togglePassword").style.display="block";
  }
}

//Display and hide confirm password value
function showConfirmPassword() {
  var x = document.getElementById("confirm_password");
  if (x.type === "password") {
      document.getElementById("toggleConfirmPassword").style.display="none";
      document.getElementById("hideConfirmPassword").style.display="block";
    x.type = "text";
  } else {
    x.type = "password";
    document.getElementById("hideConfirmPassword").style.display="none";
      document.getElementById("toggleConfirmPassword").style.display="block";
  }
}

//Set max date
function setDate(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) {
    dd = '0' + dd;
    }

    if (mm < 10) {
    mm = '0' + mm;
    } 
        
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("dob").setAttribute("max", today);
}

//Check those password and confirm password are same
function checkPassword(){
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;
    if(password == confirmPassword){
        document.getElementById("successfulpwd").style.display="block";
        document.getElementById("errorpwd").style.display="none";
        document.getElementById("submit").disabled = false; 
    }else{
        document.getElementById("successfulpwd").style.display="none";
        document.getElementById("errorpwd").style.display="block";
        document.getElementById("submit").disabled = true; 
    }
 
}

//Validate password length
function passwordLength(){
    var password = document.getElementById("password").value;
    document.getElementById("length").style.display="none";
    if(password.length < 8){
        document.getElementById("invalidlength").style.display="block";
        document.getElementById("submit").disabled = true; 
        
    }else{
        document.getElementById("invalidlength").style.display="none";
         
    }
}

</script>
</body>
</html>