<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<script src="/js/app.js"></script>
	<style type="text/css">
		.marginLabel {
			margin-top: 2px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-info " >
		<div class="container-fluid">
			<div class="nav-headed">
				<a href="{{ url('/dashboard') }}" class="navbar-brand">Nash</a>
			</div>
			
				
				
				<ul class="nav navbar-nav navbar-right" >
					<li class=" dropdown " style="padding: 5px;">
		            	<a class="btn btn-block bg-white dropdown-toggle" style="width: 100px; height: 40px;" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</a>
		            	<ul class="dropdown-menu" aria-labelledby="dropdown01">
		            		<li><a class="dropdown-item" href="#">Logout</a></li>
				        </ul>
			        <li>
				    	<img class="img-circle" style="margin-left: 3px;" width="50" height="50" src="{{ asset('image/hello.jpg') }} ">
				    </li>
		    	</ul>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row " style="height: 100%;">
			

			    <ul class="nav navbar-nav col-md-2 " style="padding: 5px; ">
			      <li><a class="btn btn-block btn-info" href="#">Product</a>
			      </li>
			    </ul>
			  
					<div class="col-md-10 table-bordered" style=" padding: 20px;">
						<!-- if foreach -->
						<table class="table table-borderless">
							<tr class="">
								<td class="nav-brand" style="font-size: 20px;"><i class="fa fa-bars" style="color: blue;" ></i> Supplier</td>
								<td  class="float-right"><button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#create" style="font-size: 15px;">New Supplier</button></td>

	
		<div class="modal fade" id="create">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">New Supplier</h3>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form action="{{ route('dashboard.store') }}" method="POST">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-6 form-group">
									<label>Supplier</label>
									<input type="text" name="name" class="form-control" placeholder="Enter Supplier">

									<label>Address</label>
									<input type="text" name="address" class="form-control" placeholder="Enter Address">

									<label>Zip Code or Postal Code</label>
									<input type="text" name="code" class="form-control" pattern="[\d+]{5,}" title="Please type your code" maxlength="13" placeholder="Enter Code">

									<label>Region</label>
									<input type="text" name="region" class="form-control" placeholder="Enter Region">

									</div>
									<div class="col-md-6 form-group">

									<label>City</label>
									<input type="text" name="city" class="form-control" placeholder="Enter City">

									<label>Country</label>
									<input type="text" name="country" class="form-control" placeholder="Enter Country">

									<label>Phone Number</label>
									<input type="text" name="number" class="form-control" pattern="[\d+]{12,}" maxlength="13" placeholder="Enter The Number">

									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="Enter Email">
								</div>
							</div>
								<div class="row">
										<div class="col-md-4"></div>
										<div class="col-md-4">
											<input type="reset" name="" class="btn btn-block btn-danger"> 								
											<input type="submit" name="" class="btn btn-block btn-primary">
										</div>									
										<div class="col-md-4"></div>
								</div>
								</form>
							</div>
				
									<!--<button type="" class="btn btn-block bg-warning">Reset</button><button type="" class="btn btn-block bg-success">insert</button> -->

					<div class="modal-footer">
			          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			        </div>
				</div>
			</div>
		</div>
	
							</tr>
							<tr>
								<td>
									<form class="form-inline my-2 my-md-0">
          								<input class="form-control" type="text" placeholder="Search" aria-label="Search">
          								<button type="submit" class="btn bg-info"><i class="fa fa-search"></i></button>
        							</form>
        						</td>

								<td class="float-right"><input type="number" name="" placeholder="10" class="form-control" style="width: 65px"></td>
								<td class="float-right"><form action="" method="post">
												{{ csrf_field() }}
													<input type="hidden" name="_method" value="DELETE">
													<input type="submit" name="" class="btn btn-danger" style="font-size: 14px;" value="Delete All">
												</form></td>
							</tr>

							<tr>
								@if(count($supplier) > 0)
								<table class="table text-center" style="padding: 20px;">
									<thead>
										<th>No</th>
										<th>Supplier</th>
										<th>Address</th>
										<th>Country</th>
										<th>Contact Phone</th>
										<th>Email</th>
										<th>Delete</th>
										<th>Edit</th>
									</thead>
									<tbody>
										@foreach($supplier as $data)
										<tr>
											<th>{{ $data -> idSupplier }}</th>
											<th>{{ $data -> name }}</th>
											<th>{{ $data -> address }}</th>
											<th>{{ $data -> country }}</th>
											<th>{{ $data -> phone }}</th>
											<th>{{ $data -> email }}</th>
											<th>
												<form action="{{ route('dashboard.destroy', ['id' => $data -> idSupplier]) }}" method="post">
												{{ csrf_field() }}
													<input type="hidden" name="_method" value="DELETE">
													<input type="submit" name="" class="btn btn-danger" style="font-size: 10px;" value="Delete">
												</form>
											</th>
											<th>
												<button type="button" class="btn btn-default btn-info" data-name="{{ $data -> name }}" data-address="{{ $data -> address }}" data-zip="{{ $data -> zip }}" data-region="{{ $data -> region }}" data-city="{{ $data -> city }}" data-country="{{ $data -> country }}" data-phone="{{ $data -> phone }}" data-email="{{ $data -> email }}" data-id="{{ $data -> idSupplier }}" data-toggle="modal" data-target="#edit" style="font-size: 10px;">Edit Data</button>
												</th>
		<div class="modal fade" id="edit">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">Edit Supplier</h3>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form action="{{ route('dashboard.update', 'update') }}" method="post">
							{{ method_field('patch') }}
							{{ csrf_field()}}
							<div class="row">
								<div class="col-md-6 form-group">
									<input type="hidden" name="id_supplier" id="supplier_id" value="">
									<label>Supplier</label>
									<input type="text" name="name" id="u_name" class="form-control" placeholder="Enter Supplier">

									<label>Address</label>
									<input type="text" name="address" id="u_address" class="form-control" placeholder="Enter Address">

									<label>Zip Code or Postal Code</label>
									<input type="text" name="code" id="u_code" class="form-control" pattern="[\d+]{5,}" maxlength="8" title="Please type your Code" placeholder="Enter Code">

									<label>Region</label>
									<input type="text" name="region" id="u_region" class="form-control" placeholder="Enter Region">

									</div>
									<div class="col-md-6 form-group">

									<label>City</label>
									<input type="text" name="city" id="u_city" class="form-control" placeholder="Enter City">

									<label>Country</label>
									<input type="text" name="country" id="u_country" class="form-control" placeholder="Enter Country">

									<label>Phone Number</label>
									<input type="text" name="number" id="u_number" class="form-control" pattern="[\d+]{12,}" title="Please Input Your Phone Number" maxlength="13" placeholder="Enter The Number">

									<label>Email</label>
									<input type="email" name="email" id="u_email" class="form-control" placeholder="Enter Email">
								</div>
							</div>
								<div class="row">
										<div class="col-md-4"></div>
										<div class="col-md-4">
											<input type="reset" name="" class="btn btn-block btn-danger"> 								
											<input type="submit" name="" class="btn btn-block btn-primary" value="Update">
										</div>									
										<div class="col-md-4"></div>
								</div>
								</form>
							</div>
				
									<!--<button type="" class="btn btn-block bg-warning">Reset</button><button type="" class="btn btn-block bg-success">insert</button> -->

					<div class="modal-footer">
			          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			        </div>
				</div>
			</div>
		</div>
										</tr>
										@endforeach
									</tbody>
								</table>
								@else
								<th>
									<div class="row text-center text-info">
										<h2>Why There isnt any Suppliers???</h2>
										<p>
											Your bussines is OVER
										</p>
									</div>
								</th>
									
								@endif

								
							</tr>
						</table>
						<div class="row text-center">
							{{ $supplier -> links()}}		
						</div>
					</div>
				
			
		</div>
	</div>
	<script>
		$('#edit').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget)
			var name = button.data('name')
			var address = button.data('address')
			var zip = button.data('zip')
			var region = button.data('region')
			var city = button.data('city')
			var country = button.data('country')
			var phone = button.data('phone')
			var email = button.data('email')
			var supplier = button.data('id')

			var modal = $(this)
			
			modal.find('.modal-body #u_name').val(name)
			modal.find('.modal-body #u_address').val(address)
			modal.find('.modal-body #u_code').val(zip)
			modal.find('.modal-body #u_region').val(region)
			modal.find('.modal-body #u_city').val(city)
			modal.find('.modal-body #u_country').val(country)
			modal.find('.modal-body #u_number').val(phone)
			modal.find('.modal-body #u_email').val(email)
			modal.find('.modal-body #supplier_id').val(supplier)
		})
	</script>

</body>
</html>
<!--
<ul class="nav navbar-nav col-md-2">
			      <li class="dropdown list-group-item"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Product <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <li class="dropdown-item"><a href="#">Create</a></li>
			          <li class="dropdown-item"><a href="#">Page 1-2</a></li>
			          <li class="dropdown-item"><a href="#">Page 1-3</a></li>
			        </ul>
			      </li>
			    </ul>
 --> 