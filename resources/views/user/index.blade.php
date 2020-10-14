@extends('layouts.app')

@section('content')
     <!-- Begin page -->
     <div id="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            <div class="side-logo">
                <img src="{{ asset('assets/images/logo-knr.jpg') }}" />
    
            </div>
            <div class="sidebar-content">
                <!--- Sidemenu -->
                <div id="sidebar-menu" class="slimscroll-menu">
                    <ul class="metismenu" id="menu-bar">

                        <li >
                            <a href="{{ route('admin.home') }}" >
                                <i class="far fa-dot-circle"></i>
                                <span>Master File</span>
                            </a>
                        </li>    
                        <li class="mm-active">
                            <a href="{{ route('admin.user.index') }}" class="active">
                                <i class="far fa-circle"></i>
                                <span>Master User</span>
                            </a>
                        </li>
                            
                        
                        <li>
                            <a href="{{ route('admin.logout') }}">
                                <i class="far fa-circle"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                
                <!-- Start Content-->
                <div class="container ml-0">
                    <div class="row page-title">
                        <div class="col-12">
                            <h4 class="mb-1 mt-0">LIST USER</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="#" data-toggle="modal" data-target="#addnewfile" class="btn btn-outline-shadow btn-rounded d-inline-block mr-3 px-3"><i class="fal fa-plus-circle mr-2"></i> Add New</a>
                            <a href="#" class="btn-delete-selected btn btn-outline-shadow btn-rounded d-none mr-3 px-3"><i class="far fa-trash-alt mr-2"></i> Delete Selected</a>
                            <a href="#" class="btn-update-selected btn btn-outline-shadow btn-rounded d-none mr-3 px-3"><i class="far fa-trash-alt mr-2"></i> Delete Selected</a>
                            
                            {{-- Modal Add Neww --}}
                            <div class="modal fade" id="addnewfile" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myCenterModalLabel">ADD NEW USER</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="title">Username</label>
                                                    <input type="text" class="form-control" name="username" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Password</label>
                                                    <input type="text" class="form-control" name="password" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Role</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="role">
                                                      <option>Admin</option>
                                                      <option>Normal User</option>
                                                    </select>
                                                  </div>
                                                
                                                <div class="clearfix text-left mt-3">
                                                    <button type="submit" class="btn btn-dark"> <i class="fal fa-arrow-right mr-1"></i> Register</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            {{-- End of Modal Add New --}}

                            {{-- Modal of Edit File --}}
                            <div class="modal fade" id="editRole" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myCenterModalLabel">EDIT ROLE USER</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" id="idHidden" value="">
                                                <div class="form-group">
                                                    <label for="title">Username</label>
                                                    <input type="text" class="form-control" id="username" placeholder="" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Role</label>
                                                    <select class="form-control" id="role" name="role">
                                                      <option>Admin</option>
                                                      <option>Normal User</option>
                                                    </select>
                                                  </div>
                                                
                                                <div class="clearfix text-left mt-3">
                                                    <button type="submit" class="btn btn-dark"> <i class="fal fa-arrow-right mr-1"></i> Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            {{-- End of edit file modal --}}


                            {{-- Modal of Edit File --}}
                            <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myCenterModalLabel">CHANGE PASSWORD USER</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.password.change') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" id="idHiddenPassword">
                                                <div class="form-group">
                                                    <label for="title">Password</label>
                                                    <input type="text" class="form-control" id="password" name="password" placeholder="" >
                                                </div>
                                                
                                                <div class="clearfix text-left mt-3">
                                                    <button type="submit" class="btn btn-dark"> <i class="fal fa-arrow-right mr-1"></i> Change Password</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            {{-- End of edit file modal --}}


                          


                        </div>
                    </div>
                    <div class="row mt-2 page-title">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-download" class="table single-card-table dt-responsive table-nowrap mb-0 mt-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Role</th>
                                                    <th class="no-sort" scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- {{ $ctr=1  }} --}}
                                                @php
                                                    $ctr =1;
                                                @endphp
                                                @forelse ($users as $user)
                                                   
                                                    <tr>
                                                        <td>{{ $ctr++ }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        @if ($user->is_admin == 1)
                                                            <td>Admin</td>
                                                        @else
                                                            <td>Normal User</td>
                                                        @endif
                                                        <td> 
                                                            <input type="button" onclick="editData({{ $user->id }})"  data-toggle="modal" data-target="#editRole" class=" editBtnModal btn btn-warning btn-sm" value="Edit Role">
                                                            @if ( Auth::user()->name  == $user->name)
                                                                <input type="button" onclick="changePass({{ $user->id }})"  data-toggle="modal" data-target="#changePassword" class=" changePass btn btn-info btn-sm" value="Change Password">
                                                            @endif
                                                            <form action="{{route('admin.user.destroy', [$user->id])}}" method="POST" class="d-inline" onsubmit="return confirm('Move Category to trash?')" >
                                                                @csrf
                                                                <input type="hidden" value="DELETE" name="_method">
                                                                <input type="submit" class="btn btn-danger btn-sm" value="Trash">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="2">No files found.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div>
                    </div>
                </div> <!-- container-fluid -->

            </div> <!-- content -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>

    <script type="text/javascript">

    function changePass(id){
        document.getElementById("idHiddenPassword").value = id;
        // alert(id);
    }

    function editData(id){
        // document.getElementById("editFile").showModal();
        // alert(id);
        let url = '/admin/user/' + id + '/edit';
        // alert(url);
        axios.get(url)
            .then(function (response) {
                // handle success
                console.log(response.data.name);
                // console.log(response.data.filename);
                // console.log(response.data.file);
                
                document.getElementById("idHidden").value = response.data.id;
                document.getElementById("username").value = response.data.name;
                let role="";
                if(response.data.is_admin=="1"){
                    role = "Admin";
                }else{
                    role = "Normal User";
                }
                document.getElementById("role").value = role;
                // document.getElementById("idHidden").value = response.data.id;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
        });
    }


    function loadLog(id){

        let url = '/admin/log/' + id;
        // alert(url);
        axios.get(url)
            .then(function (response) {
                $('#table-log').dataTable().fnDestroy();

                $('#table-log').DataTable( {
                    "ajax": {
                        url: url,
                        dataSrc: 'data',
                    },
                    columns: [
                        {data: 'username'},
                        {data: 'activity'},
                        {data: 'created_at'},
                    ]
                } );
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
        });
    }

        $(document).ready(function(){

            $('#table-download').DataTable({
                "paging":   true,
                "searching":   false,
                "info":   false,
                "pageLength": 50,
                "pagingType": "numbers",
                "columnDefs": [
                    { "orderable": false, "targets": "no-sort" }
                ]
            }).column( '1:visible' );

            $(document).on('change', 'input.checkbox-list', function(e) {
                var btn_delete = $('.btn-delete-selected');
                var btn_update = $('.btn-update-selected');
                if ($('input.checkbox-list').is(':checked')) {
                    btn_delete.removeClass('d-none').addClass('d-inline-block');
                    btn_update.removeClass('d-none').addClass('d-inline-block');
                }
                else {
                    btn_delete.removeClass('d-inline-block').addClass('d-none');
                    btn_update.removeClass('d-inline-block').addClass('d-none');
                }
            });
        });
    </script>
@endsection