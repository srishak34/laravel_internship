@extends('layouts.app')

@section('content')
@if (session('status'))                        
    <p class="alert alert-success" role="alert">
        {{ session('status') }}
    </p>
@endif
<div class="row " style="height: 100%;">
            
            
                <ul class="nav navbar-nav col-md-2 " style="padding: 5px;  ">
                  <li><a class="btn btn-block btn-info" href="#"><i class="fas fa-chalkboard" style="color: blue;" ></i> Suppliers</a>
                  </li>
                </ul>
              
                    <div class="col-md-10 table-bordered" style=" padding: 20px;">
                        <!-- if foreach -->
                        <table class="table table-borderless">                          
                            <tr>
                                <td class="nav-brand" style="font-size: 20px;"><i class="fa fa-bars" style="color: blue;" ></i> Supplier</td>
                                @if (Session::has('success'))
                                    <td class="text-center" style="font-size: 20px;">{{Session::get('success')}}</td>
                                    @elseif (Session::has('u_success'))
                                    <td class="text-center" style="font-size: 20px;">{{Session::get('u_success')}}</td>
                                    @else
                                    <td></td>
                                @endif                                
                                <td  class="float-right"><button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#create" style="font-size: 15px;">New Supplier</button></td>

    
        <div class="modal fade" id="create">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">New Supplier</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                            {{-- Success Notif --}}
                    

                    {{-- Error Notif --}}
                    

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
                                    <input type="text" name="code" class="form-control" pattern="[\d+]{5,}" title="Please type your Code" maxlength="8" placeholder="Enter Code">

                                    <label>Region</label>
                                    <input type="text" name="region" class="form-control" placeholder="Enter Region">

                                    <label>City</label>
                                    <input type="text" name="city" class="form-control" placeholder="Enter City">

                                    <label>Country</label>
                                    <input type="text" name="country" class="form-control" placeholder="Enter Country">

                                    </div>
                                    <div class="col-md-6 form-group">

                                    <label>Phone Number</label>
                                    <input type="text" name="number" class="form-control" pattern="[\d+]{12,}" maxlength="13" placeholder="Enter The Number">

                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email">

                                    <label>Contact title</label>
                                    <input type="text" name="c_title" class="form-control" placeholder="Enter Contact Title">

                                    <label>Contact Name</label>
                                    <input type="text" name="c_name" class="form-control" placeholder="Enter Contact Name">

                                    <label>Fax</label>
                                    <input type="text" name="fax" class="form-control" pattern="[\d+]{5,}" maxlength="8" placeholder="Enter Fax">
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
                                    <form action="{{ route('dashboard.index') }}" method="get" class="form-inline my-2 my-md-0">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="search" placeholder="Search Supplier/Email" value="{{ isset($search) ? $search : '' }}">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn bg-info"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>                                
                                </td>
                                <td></td>
                                <td class="float-right"><button style="padding: 7px;" class="btn btn-primary delete_all" data-url="{{ url('deleteAll') }}">Delete Selection </button></td>
                            </tr>

                            <tr>
                                @if(count($supplier) > 0)
                                <table class="table text-center" style="padding: 20px;">
                                    <thead>
                                        <th><input type="checkbox" id="master"></th>
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
                                        <tr id="tr_{{ $data-> id}}">
                                            <td><input type="checkbox" class="sub_chk" data-id="{{$data-> id}}"></td>
                                            <td>{{ $data -> id }}</td>
                                            <td>{{ $data -> name }}</td>
                                            <td>{{ $data -> address }}</td>
                                            <td>{{ $data -> country }}</td>
                                            <td>{{ $data -> contact_phone }}</td>
                                            <td>{{ $data -> contact_email }}</td>
                                            <th>
                                                <form action="{{ route('dashboard.destroy', ['id' => $data -> id]) }}" method="post">
                                                {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="submit" name="" class="btn btn-danger" style="font-size: 10px;" value="Delete">
                                                </form>
                                            </th>
                                            <th>
                                                <button type="button" class="btn btn-default btn-info" data-name="{{ $data -> name }}" data-address="{{ $data -> address }}" data-zip="{{ $data -> zip_code }}" data-region="{{ $data -> region }}" data-city="{{ $data -> city }}" data-country="{{ $data -> country }}" data-phone="{{ $data -> contact_phone }}" data-email="{{ $data -> contact_email }}" data-ctitle="{{ $data -> contact_title }}" data-cname="{{ $data -> contact_name }}" data-fax="{{ $data -> contact_fax }}" data-id="{{ $data -> id }}" data-toggle="modal" data-target="#edit" style="font-size: 10px;">Edit Data</button>
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
                                    <input type="text" name="code" id="u_code" class="form-control" pattern="[\d+]{5,}" maxlength="8" title="Please type your Code" placeholder="Enter Code" required="required">

                                    <label>Region</label>
                                    <input type="text" name="region" id="u_region" class="form-control" placeholder="Enter Region">

                                    <label>City</label>
                                    <input type="text" name="city" id="u_city" class="form-control" placeholder="Enter City">

                                    <label>Country</label>
                                    <input type="text" name="country" id="u_country" class="form-control" placeholder="Enter Country">                                    

                                    </div>
                                    <div class="col-md-6 form-group">

                                    <label>Phone Number</label>
                                    <input type="text" name="number" id="u_number" class="form-control" pattern="[\d+]{12,}" title="Please Input Your Phone Number" maxlength="13" placeholder="Enter The Number">                                

                                    <label>Email</label>
                                    <input type="email" name="email" id="u_email" class="form-control" placeholder="Enter Email">

                                    <label>Contact title</label>
                                    <input type="text" name="c_title" id="u_c_title" class="form-control" placeholder="Enter Contact Title">

                                    <label>Contact Name</label>
                                    <input type="text" name="c_name" id="u_c_name" class="form-control" placeholder="Enter Contact Name">

                                    <label>Fax</label>
                                    <input type="text" name="fax" id="u_fax" class="form-control" pattern="[\d+]{5,}" maxlength="8" placeholder="Enter Fax">
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
                        <div class="justify-content-center">
                            {{ $supplier ->appends(['search' => $search])->links() }}       
                        </div>
                        
                    </div>
                
            
        </div>
    </div>

    <script type="text/javascript">
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
            var ctitle = button.data('ctitle')
            var cname = button.data('cname')
            var fax = button.data('fax')
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
            modal.find('.modal-body #u_c_title').val(ctitle)
            modal.find('.modal-body #u_c_name').val(cname)
            modal.find('.modal-body #u_fax').val(fax)
            modal.find('.modal-body #supplier_id').val(supplier)
        });


        $(document).ready(function () {


        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  


            if(allVals.length <= 0 )  
            {  
                alert("Please select row.");  
            }  else {  


                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  


                    var join_selected_values = allVals.join(","); 


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });


        
    });

        

    </script>
@endsection
