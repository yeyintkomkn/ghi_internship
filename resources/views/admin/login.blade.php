<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, inital-scale=1.0">
	<title>Admin Login Form</title>
	<link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('css/index.css')}}">
</head>
<body>
	<h1 class="form">Admin Login Form</h1>
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>

			<div class="col-md-8">
                <form method="post" action="{{url('/login')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="remember"> Remember me</label>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Log In</button>
                        </div>
                    </div>
                </form>
            </div>

			<div class="col-md-2"></div>
	</div>
</div>
	<script src="{{url('js/jquery-1.12.4.min.js')}}"></script>
	<script src="{{url('js/bootstrap.min.js')}}"></script>

</body>
</html>