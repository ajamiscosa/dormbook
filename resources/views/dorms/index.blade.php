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
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="dormsTable" class="table table-striped table-bordered dataTable dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="datatable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc">Name</th>
                                            <th class="sorting">Owner</th>
                                            <th class="sorting">Address</th>
                                            <th class="sorting">Mobile #</th>
                                            <th class="sorting">Landline #</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr role="row">
                                            <th class="sorting_asc">Name</th>
                                            <th class="sorting">Owner</th>
                                            <th class="sorting">Address</th>
                                            <th class="sorting">Mobile #</th>
                                            <th class="sorting">Landline #</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
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
                { data:"LandLine" },
                { data: null }
            ],
            columnDefs: [
                {
                    render: function ( data, type, row ) {
                        var ID = row['ID'];
                        var Name = data.split(' ').join('-');
                        return '<a class="alert-link" href="/dorm/view/'+ID+'-'+Name+'">'+data+'</a>';
                    },
                    targets: 0

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