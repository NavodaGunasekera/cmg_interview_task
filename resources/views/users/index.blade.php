<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>Users</title>
</head>
<body>

<div class="container">
        @if (session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success')}}
            </div>
        @endif
    <div class="card mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col">
                <h3 class="card-title">Users List</h3>
                </div>
                <div class="col">
                <a href="{{url('/create')}}" class="btn btn-primary" style="float:right">Add User</a>
                </div>

            </div>
        
        <table class="table table-bordered ">
            <thead>
                <tr>
                
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                
                <td>{{$user->fname}}</td>
                <td>{{$user->lname}}</td>
                <td>{{$user->dob}}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td><a href="{{url('edit/'.$user->id)}}" class="btn btn-info btn-sm ">Edit</a><a href="{{url('delete/'.$user->id)}}" class="btn btn-danger btn-sm ml-2">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>

    </div>

</div>
    
<script>
    //Set timeout for hide status
const msgTimeout = setTimeout(hideMessage, 10000);


//Hide status
function hideMessage() {
    var elm1=document.getElementById("successMessage");
    if(elm1 !=null){
    document.getElementById("successMessage").style.display="none";
    }
       

}

</script>
</body>
</html>