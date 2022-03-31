
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="Css/Styles.css">
         <title>Blog Page</title>
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
      			<a href="" class="nav-link">All Post</a>
      		</li>
      		<li class="nav-item">
      			<a href="" class="nav-link">About Us</a>
      		</li>
      		<li class="nav-item">
      			<a href="" class="nav-link">Blog</a>
      		</li>
      		<li class="nav-item">
      			<a href="" class="nav-link">Contact Us</a>
      		</li>
      		<li class="nav-item">
            <a href="{{route('admin.login')}}" class="nav-link">Admin</a>
          </li>

      	</ul>
      	<ul class="navbar-nav ml-auto">
            <form class="form-inline d-none d-sm-block" action="{{'/search-blog'}}">
                <div class="form-group">
                  <input class="form-control mr-2" type="text" name="search" placeholder="Search here">
                  <button  class="btn btn-primary" name="SearchButton">Go</button>



                </div>
              </form>
      	</ul>
      	</div>
         </div>


      </nav>
       <div style="height: 10px; background-color: #27aae1;"></div>
      <!--Navbar End-->



       <!--Header Start-->
          <div class="container">
            <div class="row mt-4">


              <!--Main area start-->
              <div class="col-sm-8">
                <h1>The Complete responsive blog</h1>
                <h1 class="lead"> the complete blog</h1>


                  @foreach ( $posts as $row )


                  <div class="card">
                    <img src="{{asset('uploads/posts/'.$row->image)}}" style="max-height:350px; class="img-fluid card-img-top"/>
                    <div class="card-body">
                    <h4 class="card-title">{{$row->title}}</h4>

                    <small class="text-muted">
                      Category:   <span class="text-dark">{{$row->category}}</span>
                      Written By: <span class="text-dark"> <a href="">{{$row->author}}</a></span>
                         <span class="text-dark"></span>
                    </small>

                    <span style="float: right;" class="badge badge-dark text-white">Comments


                      </span>
                    <hr>

                    <p class="card-text">
                     @php
                         $postdesc= $row->post;
                         if(strlen($postdesc)>50){
                            $postdesc = substr($postdesc, 0,50)."...";
                         }
                         echo $postdesc;
                     @endphp

                    </p>
                     <a href="" style="float:right;">
                       <span class="btn btn-info">Read more >></span>
                     </a>
                     </div>
                  </div>
                  @endforeach


             <!--Pagination-->
             <br>
             <nav>
               {{-- <ul class="pagination pagination-md">

                <!--Creating Backward Button-->

                      <li class="page-item">
                   <a href="" class="page-link">&laquo;</a>
                     </li>



                      <li class="page-item active">
                   <a href="" class="page-link"></a>
                 </li>


                   <li class="page-item">
                   <a href="" class="page-link"></a>
                 </li>



                <!--Creating Forward Button-->

                      <li class="page-item">
                   <a href="" class="page-link">&raquo;</a>
                     </li>

               </ul> --}}
               {{-- {{$posts->links()}} --}}
             </nav>


              </div>
              <!--Main area End-->



              <!--Side area start-->
              <div class="col-sm-4">
               <div class="card mt-4">
                 <div class="card-body">
                   <img src="images/startblog.png" class="d-block img-fluid mb-3">
                   <div class="text-center">
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel turpis risus. Curabitur laoreet dui et tellus iaculis vulputate. Integer a rhoncus neque, at cursus enim. Aliquam dictum tempus enim, luctus pretium dolor facilisis vel.
                   </div>
                 </div>
               </div>

              <br>

              <div class="card">
                <div class="card-header bg-dark text-light">
                  <h2 class="lead">Sign Up</h2>
                </div>
                <div class="card-body">
                  <button type="button" class="btn btn-success btn-block text-center text-white mb-3" name="button">Join The Forum</button>
                  <button type="button" class="btn btn-danger btn-block text-center text-white mb-3" name="button">Log In</button>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter Your Email" name="">
                    <div class="input-group-append">
                      <button type="button" class="btn btn-primary btn-sm text-center text-white" name="button">Subscribe Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <br>

              <div class="card">
                <div class="card-header bg-primary text-light">
                  <h2 class="lead">Categories</h2>
                </div>
                <div class="card-body">


                    @foreach ( $category as $row )



                    <a href="{{'/category-blog/'.$row->title}}"><span class="heading"></span>{{$row->title}}</a><br>

                    @endforeach



                </div>

              </div>

              <br>

              <div class="card">
                <div class="card-header bg-info text-white">
                  <h2 class="lead">Recent Posts</h2>
                </div>

                <div class="card-body">


                    @foreach ( $allposts as $row )


                   <div class="media">
                     <img src="{{asset('uploads/posts/'.$row->image)}}" class="d-block img-fluid align-self-start" width="94px;" height="90px;">
                     <div class="media-body ml-2">
                       <a href="{{'/full-post/'.$row->id}}" target="_blank"><h6 class="lead">{{$row->title}}</h6></a>
                       <p class="small">{{$row->created_at}}</p>
                     </div>
                   </div>

                   <hr>
                   @endforeach
                </div>

              </div>

              </div>
              <!--Side area End-->
            </div>
          </div>
       <!--Header End-->



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
