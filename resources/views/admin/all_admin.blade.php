
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
       <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>
		Add new admin
	</title>
	<link rel="stylesheet" type="text/css" href="Css/Styles.css">
    </head>
    <body>
    	<!--Navbar Start-->
    	<div style="height: 10px; background-color: #27aae1;"></div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      	<div class="container" >
      		<a href="" class="navbar-brand">learners flame</a>
      		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      			<span class="navbar-toggler-icon"></span>
      		</button>
          <div class="collapse navbar-collapse" id="navbarCollapse">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{'/MyProfile'}}" class="nav-link"><i class="fas fa-user text-success"></i> My Profile</a>
                </li>
                <li class="nav-item">
                    <a href="{{'/dashboard'}}" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{'/all-post'}}" class="nav-link">Post</a>
                </li>
                <li class="nav-item">
                    <a href="{{'/all-category'}}" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="{{'/all-admin'}}" class="nav-link">Manage Admins</a>
                </li>
                <li class="nav-item">
                    <a href="{{'/comment-approval'}}" class="nav-link">Comments</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Live Blog</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="nav-link text-danger">
         <i class="fas fa-user-times"></i> Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </ul>
      	</div>
         </div>


      </nav>
       <div style="height: 10px; background-color: #27aae1;"></div>
      <!--Navbar Start-->



       <!--Header Start-->
          <header class="bg-dark text-white py-3">
          	<div class="container">
          		<div class="row">
          			<div class="col">
          				<h1> <i class="fas fa-user" style="color: #27aae1;"></i> Manage Admins </h1>
          			</div>
          		</div>
          	</div>
          </header>
          <br>
       <!--Header End-->

         <!--Main Area Start-->

          <section class="container py-2 mb-4">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
           @endif
           @if(Session::has('msg'))
         <p class="alert alert-success">{{Session::get('msg')}}</p>
         @endif
          	<div class="row" style="min-height: 350px;">
          		<div class="offset-lg-1 col-lg-10" >

          			<form class="" action="{{route('store.admin')}}" method="post">
                        @csrf
          				<div class="card bg-secondary text-light mb-3">
          					<div class="card-header">
          						<h1>Add New Admin</h1>
          					</div>
          					<div class="card-body bg-dark">
          						<div class="form-group">
          							<label for="Username"> <span class="FieldInfo"> Username </span> </label>
          							<input class="form-control" type="text" name="username" id="Username"  >
          						</div>
                      <div class="form-group">
                        <label for="name"> <span class="FieldInfo"> Name </span> </label>
                        <input class="form-control" type="text" name="aname" id="name"  >
                        <small class="text-muted">optional</small>
                      </div>
                      <div class="form-group">
                        <label for="Password"> <span class="FieldInfo"> Password </span> </label>
                        <input class="form-control" type="Password" name="password" id="Username"  >
                      </div>
                      <div class="form-group">
                        <label for="ConfirmPassword"> <span class="FieldInfo"> Confirm Password </span> </label>
                        <input class="form-control" type="password" name="password_confirmation" id="ConfirmPassword"  >
                      </div>
                      <div class="row">
                         <div class="col-lg-6 mb-2">
                           <button type="button" name="submit" class="btn btn-warning btn-block"> <i class="fas fa-arrow-left"></i> Back To Dashboard </button>
                         </div>
                         <div class="col-lg-6 mb-2">
                           <button type="submit" name="submit" class="btn btn-success btn-block"> <i class="fas fa-check"></i> Publish </button>
                         </div>
                      </div>
          					</div>
          				</div>
          			</form>

                 <h2>Existing Admins</h2>
              <table class="table table-stripped table hover">
                <thead class="thead-dark">
                  <tr>
                    <th>No.</th>
                    <th>Date&Time</th>
                    <th>Username</th>
                    <th>Admin Name</th>
                    <th>Added By</th>
                    <th>Action</th>

                  </tr>
                </thead>




                  <tbody>
                    @foreach ( $admin as $key=>$row )
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$row->created_at}}</td>
                      <td>{{$row->username}}</td>
                      <td>{{$row->aname}}</td>
                      <td>{{$row->addedby}}</td>
                      <td><a href="{{'/delete-admin/'.$row->id}}" class="btn btn-danger">Delete</a></td>


                    </tr>
                    @endforeach
                  </tbody>

              </table>

          		</div>
          	</div>
          </section>


         <!--Main Area End-->

      <!--Footer Start-->
          <footer class="bg-dark text-white">
          	<div class="container">
          		<div class="row">
          			<div class="col">
          				<p class="lead text-center"> Theme By | Learners Flame | <span id="demo"></span> | &copy; ----All rights reserved.</p>
          			</div>
          		</div>
          	</div>
          </footer>
          <div style="height: 10px; background-color: #27aae1;"></div>
      <!--Footer End-->

    </body>

    <script>
	const d = new Date();
	document.getElementById("demo").innerHTML = d.getFullYear();
	</script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</html>
