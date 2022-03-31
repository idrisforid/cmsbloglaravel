



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
		My Profile
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
          				<h1> <i class="fas fa-user mr-2" style="color: #27aae1;"></i>{{Auth::user()->username}}</h1>
                  <small>{{Auth::user()->aheadline}}</small>
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
          	<div class="row" >
              <!--Left Area-->
              <div class="col-md-3">
                <div class="card">
                  <div class="card-header bg-dark text-light">
                    <h3>{{Auth::user()->aname}}</h3>
                  </div>
                  <div class="card-body">
                    <img src="{{asset('uploads/admins/'.Auth::user()->aimage)}}" class="block img-fluid mb-3">
                  </div>
                  <div>
                    {{Auth::user()->abio}}
                  </div>
                </div>
              </div>
              <!--Right Area-->
          		<div class="col-md-9" >

          			<form class="" action="{{'/UpdateProfile/'.Auth::user()->id}}" method="post" enctype="multipart/form-data">
                        @csrf
          				<div class="card bg-dark text-light mb-3">

                    <div class="card-header bg-secondary text-light">
                      <h4>Edit Profile</h4>
                    </div>

          					<div class="card-body bg-dark">
          						<div class="form-group">

          							<input class="form-control" type="text" name="username" id="" placeholder="Your Name Here" >
          						</div>
                      <div class="form-group">
                       <input class="form-control" type="text" name="aheadline" id="" placeholder="headline" >
                       <small class="text-muted">Add a professional headline like, 'Engineer' at XYZ or 'Architect'</small>
                       <span class="text-danger">Not more than 30 characters</span>
                      </div>
                      <div class="form-group">

                      <div class="form-group">

                        <textarea class="form-control" placeholder="Bio" id="post" name="abio" rows="8" cols="80"></textarea>
                      </div>

                      <label for="title"> <span class="FieldInfo"> Choose Image </span> </label>
                        <div class="custom-file">
                          <input class="custom-file-input" type="File" name="aimage" id="imageselect" value="">
                          <label for="imageselect" class="custom-file-label">Select Image </label>
                        </div>
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
