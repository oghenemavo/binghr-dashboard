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
                            <form id="add_user_form" action="" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="employee_id" name="employee_id" placeholder="Employee ID*">
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name*">
                                    </div>
                                    <div class="col">
                                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name*">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                      <input type="email" class="form-control" id="email" name="email" placeholder="Email ID*">
                                    </div>
                                    <div class="col">
                                      <input type="tel" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile No.">
                                    </div>
                                    <div class="col">
                                        <select id="role" name="role" class="custom-select">
                                            <option value="">Choose Role...</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                      <input type="text" class="form-control" id="username" name="username" placeholder="Username*">
                                    </div>
                                    <div class="col">
                                      <input type="password" class="form-control" id="password" name="password" placeholder="Password*">
                                    </div>
                                    <div class="col">
                                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password*">
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
                                        <tr>
                                          <th scope="row">Super Admin</th>
                                          <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="" name="">
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="" name="">
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="" name="">
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Admin</th>
                                          <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="" name="">
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="" name="">
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="" name="">
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Employee</th>
                                          <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="" name="">
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="" name="">
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="" name="">
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <th scope="row">HR Admin</th>
                                          <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="" name="">
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="" name="">
                                            </div>
                                          </td>
                                          <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="" name="">
                                            </div>
                                          </td>
                                        </tr>
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
                        <tr>
                            <td>
                                <div class="user-card">
                                    <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                        <span>AB</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">Abu Bin Ishtiyak <span class="dot dot-success d-md-none ms-1"></span></span>
                                        <span>info@softnio.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>24th Oct, 2022</td>
                            <td>System Architect</td>
                            <td>
                                <a href="#"><i class="bi bi-vector-pen"></i></a>
                                &nbsp;&nbsp;<a href="#"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-card">
                                    <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                        <span>AB</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">Abu Bin Ishtiyak <span class="dot dot-success d-md-none ms-1"></span></span>
                                        <span>info@softnio.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>24th Oct, 2022</td>
                            <td>System Architect</td>
                            <td>
                                <a href="#"><i class="bi bi-vector-pen"></i></a>
                                &nbsp;&nbsp;<a href="#"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-card">
                                    <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                        <span>AB</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">Abu Bin Ishtiyak <span class="dot dot-success d-md-none ms-1"></span></span>
                                        <span>info@softnio.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>24th Oct, 2022</td>
                            <td>System Architect</td>
                            <td>
                                <a href="#"><i class="bi bi-vector-pen"></i></a>
                                &nbsp;&nbsp;<a href="#"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
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
    
    <script>
        $(document).ready(function() {
            $('#collapse-sidebar').on('click', function() {
                $('aside#sidebar, #content').toggleClass('active');
                $('#collapse-sidebar').toggleClass('rotate-180');
            });

            $('#users').DataTable({
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 3
                }],
            });

            $('#add_user_btn').on('click', function() {
                console.log(1111111);
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