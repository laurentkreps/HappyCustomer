<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>Happy Customer Administration</title>

  <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script defer src="https://use.fontawesome.com/releases/v5.10.1/js/all.js"></script>  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
  @yield('extracss')
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><i class="fas fa-surprise"></i> Happy Customer </div>
      <div class="list-group list-group-flush">
        <a href="{{ asset('/home') }}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="{{ asset('/admin/campaigns') }}" class="list-group-item list-group-item-action bg-light">Campaigns</a>
        <a href="{{ asset('/admin/ratings') }}" class="list-group-item list-group-item-action bg-light">Ratings</a>
        <a href="{{ asset('/admin/statistics') }}" class="list-group-item list-group-item-action bg-light">Statistics</a>
        <a href="{{ asset('/admin/languages') }}" class="list-group-item list-group-item-action bg-light">Language</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-eye-slash"></i></button>
        <input type="hidden" id="toggled" name="toggled" value="0">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            
            <li class="nav-item">
              <a class="nav-link" href="{{ asset('/logout') }}">Log out</a>
            </li>
            
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
           @yield('content')
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
 <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
      if($('#toggled').val() == 0) {
          $("#menu-toggle").html('<i class="fas fa-eye"></i>');
          $('#toggled').val(1);
      } else {
          $("#menu-toggle").html('<i class="fas fa-eye-slash"></i>');
          $('#toggled').val(0);
      }
    });

   
  </script>
  @yield('extrajs')

</body>

</html>
