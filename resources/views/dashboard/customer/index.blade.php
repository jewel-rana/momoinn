@extends('layouts.backend')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped" id="bookingsTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th><i data-feather="tool"></i></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </main>
@endsection

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/DataTables/dataTables.bootstrap5.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/DataTables/Responsive-2.2.6/css/responsive.dataTables.css') }}"/>
@endsection

@section('foot')
    <script src="{{ asset('assets/plugins/DataTables/datatables.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/Responsive-2.2.6/js/dataTables.responsive.js') }}"></script>
    <script>
        $.fn.dataTable.ext.classes.sPageButton = 'page-item';
        jQuery(function($) {
            let url = "{{ route('customers.ajax') }}";
            $('#bookingsTable').DataTable({
                "processing": true,
                "serverSide": true,
                "deferRender": true,
                "bAutoWidth": false,
                "sPageButtonActive": "active",
                "ajax": {
                    'url': url,
                    pages: 5, // number of pages to cache
                    'data': function (data) {
                        // Read values
                        // data.keyword = $(keyword).val();
                    }
                },
                dom: 'lBfrtip',
                "lengthChange": true,
                lengthMenu: [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]],
                "oLanguage": {
                    "sLengthMenu": "Show _MENU_ ",
                },
                "pageLength": 25,
                "bFilter": true,
                "bInfo": true,
                "searching": false,
                "columns": [
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "email"},
                    {"data": "mobile"},
                    {
                        "mRender": function (data, type, row) {
                            return '';
                        }
                    }
                ],
                "columnDefs": [
                    {"targets": [4], "searchable": false, "orderable": false, "visible": true}
                ],
                "order": [[0, 'desc']]
            });
        });
    </script>
@endsection
