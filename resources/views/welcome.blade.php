<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <title>Dashboard</title>
  </head>
  <body>

    <div class="wrapper d-flex">
        <aside id="sidebar-init">
            <ul class="list-unstyled d-flex flex-column align-items-center">
                <li><a href="#"><i class="bi bi-search" role="img" aria-label="search"></i></a></li>
                <li><a href="#"><i class="bi bi-calendar-range" role="img" aria-label="calender"></i></a></li>
                <li><a href="#"><i class="bi bi-person" role="img" aria-label="user"></i></a></li>
                <li><a href="#"><i class="bi bi-chat-dots" role="img" aria-label="chats"></i></a></li>
                <li><a href="#"><i class="bi bi-file-earmark" role="img" aria-label="file"></i></a></li>
            </ul>
            
            <ul class="list-unstyled d-flex flex-column align-items-center bottom-aside">
                <li><a href="#"><i class="bi bi-gear" role="img" aria-label="settings"></i></a></li>
                <li><a href="#"><i class="bi bi-justify-left" role="img" aria-label="menu"></i></a></li>
            </ul>
        </aside>

        <aside id="sidebar">
            <ul class="sidebar-menu list-unstyled">
                <li><a href="#"><i class="bi bi-window" role="img" aria-label="Dashboard"></i> Dashboard</a></li>
                <li class="active"><a href="#"><i class="bi bi-people" role="img" aria-label="Users"></i> Users</a></li>
                <li><a href="#"><i class="bi bi-file" role="img" aria-label="Employee"></i> Employee</a></li>
                <li><a href="#"><i class="bi bi-lightning-charge" role="img" aria-label="Activities"></i> Activities</a></li>
                <li><a href="#"><i class="bi bi-check2-circle" role="img" aria-label="Holidays"></i> Holidays</a></li>
                <li><a href="#"><i class="bi bi-droplet" role="img" aria-label="Events"></i> Events</a></li>
                <li><a href="#"><i class="bi bi-menu-button-wide-fill" role="img" aria-label="Payroll"></i> Payroll</a></li>
                <li><a href="#"><i class="bi bi-person" role="img" aria-label="Accounts"></i> Accounts</a></li>
                <li><a href="#"><i class="bi bi-exclamation-circle" role="img" aria-label="Report"></i> Report</a></li>
            </ul>
        </aside>
        
        <!-- dashboard content -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light py-4">
                <div class="container-fluid">
                    <button class="btn" id="collapse-sidebar" type="button">
                        <i style="font-size: 24px;" class="bi bi-arrow-left-circle"></i>
                    </button>

                    <span class="navbar-brand mb-0 h1">Users</span>

                    <div class="collapse navbar-collapse" id="navbarScroll navbarSupportedContent">
                        <form class="d-flex mr-auto">
                          <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                          <select id="role" name="role"  class="form-control">
                            <option selected>Year</option>
                            <option value="2022">2022</option>
                          </select>
                        </form>

                        <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Language
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown2" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Reports
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown3" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Project
                                </a>
                            </li>
                            <li class="my-auto mx-3"><a href="#"><i class="bi bi-envelope" role="img" aria-label="email"></i></a></li>
                            <li class="my-auto mr-3"><a href="#"><i class="bi bi-bell" role="img" aria-label="alarm"></i></a></li>
                            <li class="my-auto"><a href="#"><i class="bi bi-person" role="img" aria-label="user"></i></a></li>
                        </ul>
                        
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
            
            <div class="container py-3">
    
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Errors found!
                    </div>
                @endif
    
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        User Created Successfully
                    </div>
                @endif

                <div class="d-flex justify-content-end">
                    <button data-toggle="modal" data-target="#addUser" class="btn btn-success my-4">Add User</button>
                </div>
                
                <div id="addUser" class="modal" tabindex="-1">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Add a New User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id="add_user_form" action="{{ route('create.user') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id" placeholder="Employee ID*">
                                    @error('employee_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                      <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="First name*">
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                      <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Last name*">
                                      @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <select id="position" name="position" class="custom-select @error('position') is-invalid @enderror">
                                            <option value="">Choose Position...</option>
                                            <option value="CEO & Founder">CEO & Founder</option>
                                            <option value="HR">HR</option>
                                            <option value="Team Lead">Team Lead</option>
                                            <option value="Product Designer">Product Designer</option>
                                            <option value="Software Engineer">Software Engineer</option>
                                        </select>
                                        @error('position')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                      <input type="email" class="form-control @error('first_name') is-invalid @enderror" id="email" name="email" placeholder="Email ID*">
                                      @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col">
                                      <input type="tel" class="form-control @error('mobile_no') is-invalid @enderror" id="mobile_no" name="mobile_no" placeholder="Mobile No.">
                                      @error('mobile_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <select id="role" name="role" class="custom-select @error('role') is-invalid @enderror">
                                            <option value="">Choose Role...</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username*">
                                      @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col">
                                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password*">
                                      @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col">
                                      <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password*">
                                      @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                          <th scope="col">Module Permission</th>
                                          <th scope="col">Read</th>
                                          <th scope="col">Write</th>
                                          <th scope="col">Delete</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <th scope="row">{{ $role->name }}</th>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="" name="permission[{{ $role->id }}][]" value="read">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="" name="permission[{{ $role->id }}][]" value="write">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="" name="permission[{{ $role->id }}][]" value="delete">
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="modal-footer">
                                    <button type="submit" id="add_user_btn" class="btn btn-primary">Add User</button>
                                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div><!-- modal body -->
                      </div><!-- modal content -->
                    </div>
                </div><!-- modal ends -->

                <div id="set"></div>

                <!-- dataTable starts -->
                <table id="users" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Create Date</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <!-- dataTable ends -->
            </div>

        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    <!-- Datatable -->
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Jquery Validate -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('jquery.form.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            $('#collapse-sidebar').on('click', function() {
                $('aside#sidebar, #content').toggleClass('active');
                $('#collapse-sidebar').toggleClass('rotate-180');
            });

            $('#users').DataTable({
                ajax: {
                    url: `{{ route('api.get.users') }}`,
                    dataSrc: 'users'
                },
                columns: [
                    { 
                        data: 'name',
                        render: function(data, type, full, meta) {
                            var role = full.role;
                            var badge = '';
                            switch (role) {
                                case 'Admin':
                                    badge = 'primary';
                                    break;

                                case 'Super Admin':
                                    badge = 'success';
                                    break;

                                case 'HR Admin':
                                    badge = 'warning';
                                    break;

                                case 'Employee':
                                    badge = 'danger';
                                    break;
                            
                                default:
                                    badge = 'info';
                                    break;
                            }
                            return `
                                <div class="d-flex justify-content-between">
                                    <div class="user-card">
                                        <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                            <span>${full.initials}</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="tb-lead">${full.name} <span class="dot dot-success d-md-none ms-1"></span></span>
                                            <span>${full.email}</span>
                                        </div>
                                    </div>
                                    <span style="align-self: flex-start;" class="my-auto badge badge-${badge}">${role}</span>
                                </div>
                            `;
                        }
                    },
                    { data: 'created_at' },
                    { data: 'position' },
                ],
                "columnDefs": [{
                    "targets": 3,
                    "searchable": false,
                    "orderable": false,
                    "data": null,
                    "render": function(data, type, full, meta) {
                        return `
                            <ul class="list-unstyled d-flex">
                                <li>
                                    <a href="#edit_user" class="btn" data-toggle="modal" data-target="#edit-user-${meta.row}"><i class="bi bi-vector-pen"></i></a>
                                </li>
                                <li>
                                    <a href="#remove_user" class="btn"><i class="bi bi-trash"></i></a>
                                </li>
                            </ul>
                        `;
                    }
                }],
            });

            var is_selected = function($form_value, $value) {
                return $form_value == $value ? 'selected' : '';
            };

            var is_checked = function($base_role, $role, permission) {
                return $base_role == $role && permission == '1' ? 'checked' : '';
            };

            // edit user
            $('#users tbody').on('click', 'a[href="#edit_user"]', function (e) {
                e.preventDefault();
                const dt = $.fn.DataTable.Api( $('#users') ).row( $(this).parents('tr') );
                let data = dt.data(); // row data

                const user_edit_modal = `
                    <div id="edit-user-${dt.index()}" class="modal" tabindex="-1">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">Edit a User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form id="update_user" action="{{ route('api.update.user') }}/${data.id}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" value="${data.employee_id}" class="form-control @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id" placeholder="Employee ID*">
                                            @error('employee_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <input type="text" value="${data.first_name}" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="First name*">
                                                    @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            <div class="col">
                                                <input type="text" value="${data.last_name}" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Last name*">
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <select id="position" name="position" class="custom-select @error('position') is-invalid @enderror">
                                                    <option value="">Choose Position...</option>
                                                    <option value="CEO & Founder" ${is_selected("CEO & Founder", data.position)}>CEO & Founder</option>
                                                    <option value="HR" ${is_selected("HR", data.position)}>HR</option>
                                                    <option value="Team Lead" ${is_selected("Team Lead", data.position)}>Team Lead</option>
                                                    <option value="Product Designer" ${is_selected("Product Designer", data.position)}>Product Designer</option>
                                                    <option value="Software Engineer" ${is_selected("Software Engineer", data.position)}>Software Engineer</option>
                                                </select>
                                                @error('position')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <input type="email" value="${data.email}" class="form-control @error('first_name') is-invalid @enderror" id="email" name="email" placeholder="Email ID*">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <input type="tel" value="${data.mobile_no}" class="form-control @error('mobile_no') is-invalid @enderror" id="mobile_no" name="mobile_no" placeholder="Mobile No.">
                                                @error('mobile_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                            </div>
                                            <div class="col">
                                                <select id="role" name="role" class="custom-select @error('role') is-invalid @enderror">
                                                    <option value="">Choose Role...</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}" ${is_selected("{{ $role->id }}", data.role_id)}>{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <input type="text" value="${data.username}" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username*">
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password*">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password*">
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <table class="table">
                                            <thead class="thead-light">
                                                <tr>
                                                <th scope="col">Module Permission</th>
                                                <th scope="col">Read</th>
                                                <th scope="col">Write</th>
                                                <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($roles as $key => $role)
                                                    <tr>
                                                        <th scope="row">{{ $role->name }}</th>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="" name="permission[{{ $role->id }}][]" value="read" ${is_checked("{{ $role->id }}", data.permissions["{{$key}}"].role_id, data.permissions["{{$key}}"].read)}>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="" name="permission[{{ $role->id }}][]" value="write" ${is_checked("{{ $role->id }}", data.permissions["{{$key}}"].role_id, data.permissions["{{$key}}"].write)}>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="" name="permission[{{ $role->id }}][]" value="delete" ${is_checked("{{ $role->id }}", data.permissions["{{$key}}"].role_id, data.permissions["{{$key}}"].delete)}>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="modal-footer">
                                            <button type="submit" id="edit_user_btn" class="btn btn-primary">Edit User</button>
                                            <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div><!-- modal body -->
                            </div><!-- modal content -->
                        </div>
                    </div>
                `;

                $(user_edit_modal).insertAfter($('#set'));

                const user_options = {
                    type: 'PUT',
                    url: $(this).prop('action'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    clearForm: null,
                    success: function(response) {
                        if (response.hasOwnProperty('status') && response.status) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 2000
                            });

                            $(`#edit-user-${dt.index()}`).modal('hide');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'unable to update user',
                            })
                        }
                        $('#users').DataTable().ajax.reload();
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(XMLHttpRequest.status)
                        console.log(XMLHttpRequest.statusText)
                        console.log(errorThrown)
        
                        // console.log(XMLHttpRequest)
                        // let errors = XMLHttpRequest.responseJSON.errors;
                        // if (errors.hasOwnProperty('product_name')) {
                        //     $('div[data-error="product_name"]').text(errors.product_name[0])
                        // } 
                        // if (errors.hasOwnProperty('price')) {
                        //     $('div[data-error="price"]').text(errors.price[0])
                        // }
                        // if (errors.hasOwnProperty('quantity')) {
                        //     $('div[data-error="quantity"]').text(errors.quantity[0])
                        // } 
                        // if (errors.hasOwnProperty('expires_at')) {
                        //     $('div[data-error="expires_at"]').text(errors.expires_at[0])
                        // }
                        // if (errors.hasOwnProperty('description')) {
                        //     $('div[data-error="description"]').text(errors.description[0])
                        // }
                
                        // $(this).find('button').attr('disabled', false);
                
                        // display toast alert
                        // display toast alert
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Unable to process request now.',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                };
                
                $('#update_user').validate({
                    errorClass: 'invalid-feedback',
                    highlight: function(element, errorClass, validClass) {
                        $(element).parent().find('input').addClass('is-invalid').removeClass('is-valid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).parent().find('input').removeClass('is-invalid').addClass('is-valid');
                    },
                    rules: {
                        employee_id: "required",
                        first_name: "required",
                        last_name: "required",
                        role: "required",
                        position: "required",
                        username: "required",
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            minlength: 5
                        },
                        password_confirmation: {
                            equalTo : "#password"
                        }
                    },
                    submitHandler: function(form) {
                        // $(form).find('button').attr('disabled', true)
                        $(form).ajaxSubmit(user_options);
                    }
                });
                
            });

            // remove user
            $('#users tbody').on('click', 'a[href="#remove_user"]', function (e) {
                e.preventDefault();
                const dt = $.fn.DataTable.Api( $('#users') ).row( $(this).parents('tr') );
                let data = dt.data(); // row data

                // console.log(data);

                console.log('yess')
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: "{{ route('api.delete.user') }}",
                            data: {
                            "_token": "{{ csrf_token() }}", 
                                user_id: data.id,
                            },
                            success: function(response) {
                                if (response.hasOwnProperty('status') && response.status) {
                                    Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                    );
                                } else {
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'danger',
                                        title: response.message,
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                }
                                $('#users').DataTable().ajax.reload();
                                // setTimeout( () =>  window.location.replace(`${window.location.origin}${window.location.pathname}`), 3000);
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                console.log( XMLHttpRequest.responseJSON.errors);
                                console.log(XMLHttpRequest.status)
                                console.log(XMLHttpRequest.statusText)
                                console.log(errorThrown)
                        
                                // display toast alert
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: 'Unable to process request now.',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            }
                        });




                        
                    }
                })

            });

            $("#add_user_form").validate({
                errorClass: 'invalid-feedback',
                highlight: function(element, errorClass, validClass) {
                    $(element).parent().find('input').addClass('is-invalid').removeClass('is-valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).parent().find('input').removeClass('is-invalid').addClass('is-valid');
                },
                rules: {
                    employee_id: "required",
                    first_name: "required",
                    last_name: "required",
                    position: "required",
                    role: "required",
                    username: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    password_confirmation: {
                        required: true,
                        equalTo : "#password"
                    }
                }
            });

        });
    </script>
  </body>
</html>