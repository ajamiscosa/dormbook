@extends('app')
@section('title','Dormitories')
@section('styles')

@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Dormitories List</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="/dorm/new" class="btn btn-border ml-3">Add Dormitory</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="dormsTable" class="table table-striped table-bordered dataTable dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="datatable_info" style="width: 100%;">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc">Name</th>
                                    <th class="sorting">Owner</th>
                                    <th class="sorting">Address</th>
                                    <th class="sorting">Mobile #</th>
                                    <th class="sorting"># of Rooms</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr role="row">
                                    <th class="sorting_asc">Name</th>
                                    <th class="sorting">Owner</th>
                                    <th class="sorting">Address</th>
                                    <th class="sorting">Mobile #</th>
                                    <th class="sorting"># of Rooms</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $('#dormsTable').DataTable( {
            serverSide: false,
            processing: true,
            searching: true,
            ajax: '/dorm/data',
            dataSrc: 'data',
            columns: [
                { data:"Name" },
                { data:"Owner" },
                { data:"Address" },
                { data:"Mobile" },
                { data:"Rooms" },
                { data: null, class:'text-right' }
            ],
            columnDefs: [
                {
                    render: function ( data, type, row ) {
                        var ID = row['ID'];
                        var Name = data.split(' ').join('-');
                        return '<a class="alert-link" href="/dorm/view/'+ID+'-'+Name+'">'+data+'</a>';
                    },
                    targets: 0

                },
                {
                    render: function (data, type, row) {
                        var ID = row['ID'];
                        var Name = row['Name'].split(' ').join('-');
                        return '<a href="/dorm/update/'+ID+'-'+Name+'" class="btn btn-warning btn-link btn-icon btn-sm edit"><i class="fa fa-edit"></i></a>' +
                            '<a href="/dorm/delete/'+ID+'-'+Name+'" class="btn btn-danger btn-link btn-icon btn-sm remove"><i class="fa fa-times"></i></a>';
                    },
                    targets: 5
                }
            ],
            pagingType: "full_numbers",
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search Dorms",
                infoFiltered: ""
            }
        } );
    </script>

@endsection