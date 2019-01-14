<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="http://localhost/university/public/">Home</a></li>
      <li><a href="http://localhost/university/public/university_details">studet details</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="http://localhost/university/public/"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Mobile</th>
				<th>Alternate Mobile</th>
				<th>Email</th>
				<th>Alternate Email</th>
				<th>Gender</th>
				<th>Address</th>
				<th>Course</th>
				<th>Country</th>
				<th>Hobbies</th>
				<th>Action</th>			
			</tr>
		</thead>
		<tbody>
			@foreach($data as $val)
			<tr>
				<td>{{$val->name}}</td>
				<td>{{$val->mobile}}</td>
				<td>{{$val->alternate_mobile}}</td>
				<td>{{$val->email}}</td>
				<td>{{$val->alternate_email}}</td>
				<td>{{$val->gender}}</td>
				<td>{{$val->address}}</td>
				<td>{{$val->course}}</td>
				<td>{{$val->country}}</td>
				<td>{{$val->hobbies}}</td>
<!-- 				<td>{{$val->password}}</td>
				<td>{{$val->confirm_password}}</td> -->
				<td>
					<a class="btn btn-info" href="{{url('/edit_details')}}/{{$val->id}}">Edit</a>
					<a class="btn btn-danger" href="{{url('/delete_details')}}/{{$val->id}}">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>