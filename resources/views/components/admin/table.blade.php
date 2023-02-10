@props(['search' => null])
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__body">
        <div id="kt_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="kt_table_1_length">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="kt_table_1_filter" class="dataTables_filter">
                        {{-- <label>Search:
                            {{ $search }}
                        </label> --}}
                        {{ $search }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table  table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="kt_table_1Arsh" role="grid" aria-describedby="kt_table_1_info" style="width: 1115px;">
                            <thead>
                                {{ $thead }}

                            </thead>
                            <tbody>
                                {{ $tbody }}
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>