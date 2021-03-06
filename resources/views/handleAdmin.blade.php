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

                        <li class="mm-active">
                            <a href="{{ route('admin.home') }}" class="active">
                                <i class="far fa-dot-circle"></i>
                                <span>Master File</span>
                            </a>
                        </li>    
                        <li>
                            <a href="{{ route('admin.user.index') }}">
                                <i class="far fa-circle"></i>
                                <span>Master User</span>
                            </a>
                        </li>
                        <li>
                            <a href="logout">
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
                            <h4 class="mb-1 mt-0">DOWNLOAD</h4>
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
                                            <h5 class="modal-title" id="myCenterModalLabel">ADD NEW FILE</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" class="form-control" name="title" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="file">File</label>
                                                    <input type="file" class="form-control" name="filename" style="height:auto;">
                                                </div>
                                                <div class="clearfix text-left mt-3">
                                                    <button type="submit" class="btn btn-dark"> <i class="fal fa-arrow-right mr-1"></i> Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            {{-- End of Modal Add New --}}

                            {{-- Modal of Edit File --}}
                            <div class="modal fade" id="editFile" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myCenterModalLabel">EDIT FILE</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                {{-- <input type="hidden" id="idHidden" name="idUser"> --}}
                                                <input type="hidden" id="idFile" name="idFile" value="">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" class="form-control" id="editTitle" name="title" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="file">File</label>
                                                    <input type="file" class="form-control" id="editFilename"  name="filename" style="height:auto;">
                                                </div>
                                                <div class="clearfix text-left mt-3">
                                                    <button type="SUBMIT" class="editModalBtn btn btn-dark"> <i class="fal fa-arrow-right mr-1"></i> Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            {{-- End of edit file modal --}}


                            {{-- Modal of Edit File --}}
                            <div class="modal fade" id="logFile" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myCenterModalLabel">LOG FILE</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body dataLog">
                                            <div class="table-responsive">
                                                <table data-order='[[ 2, "desc" ]]' id="table-log" class="table single-card-table  table-nowrap mb-0 mt-0">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th scope="col">No.</th> --}}
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Activity</th>
                                                            <th scope="col">Time</th>
                                                            {{-- <th class="no-sort" scope="col">Action</th> --}}
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div> 
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
                                        <table id="table-download" class="table single-card-table dt-responsive table mb-0 mt-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">File</th>
                                                    <th scope="col">Size (MB)</th>
                                                    <th scope="col">Time</th>
                                                    <th class="no-sort" scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $ctr = 1;
                                                @endphp
                                                @forelse ($files as $file)
                                                    <tr>
                                                        <td>{{ $ctr++ }}</td>
                                                        <td>{{ $file->filename }}</td>
                                                        <td><a href="{{ route('tes', $file->uuid) }}">{{ $file->file }}</a></td>
                                                        <td>{{ number_format((float)$file->size / 1000000,2,'.','') }}</td>
                                                        <td>{{ $file->created_at }}</td>
                                                        <td><a href="{{ route('tes', $file->uuid) }}" class="color-black text-underline">Download</a> | <a href="#" onclick="loadLog({{ $file->id }})" data-toggle="modal" data-target="#logFile" class="color-black text-underline">Lihat Log  | <a href="#" onclick="editData({{ $file->id }})"  data-toggle="modal" data-target="#editFile"  class="editBtnModal color-black text-underline">Edit File</a>
                                                            <form action="{{route('files.destroy', [$file->id])}}" method="POST" class="d-inline" onsubmit="return confirm('Move Category to trash?')" >
                                                                @csrf
                                                                <input type="hidden" value="DELETE" name="_method">
                                                                <input type="submit" class="btn btn-danger btn-sm" value="Trash">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $ctr++;
                                                    @endphp
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

    function editData(id){
        // document.getElementById("editFile").showModal();
        // alert(id);
        let url = '/admin/file/' + id + '/edit';
        // alert(url);
        axios.get(url)
            .then(function (response) {
                // handle success
                console.log(response.data.id);
                console.log(response.data.filename);
                console.log(response.data.file);
                
                document.getElementById("editTitle").value = response.data.filename;
                // document.getElementById("editFileName").value = response.data.file;
                document.getElementById("idFile").value = response.data.id;
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

    // function sendEditData(){
    //     // alert("tes");
    //     let id = document.getElementsByClassName("idHidden").value
    //     let title = document.getElementById("editTitle").value;
    //     let file = document.getElementById("editFileName").value;
    //     let url = '/admin/file/' + id ;
    //     axios.put(url, {
    //         title: title,
    //         fileName: file
    //     })
    //     .then(function (response) {
    //         console.log(response);
    //     })
    //     .catch(function (error) {
    //         console.log(error);
    //     });
    // }
    

    // axios({
    //     method: 'put',
    //     url: '/user/12345',
    //     data: {
    //         firstName: 'Fred',
    //         lastName: 'Flintstone'
    //     }
    // });


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