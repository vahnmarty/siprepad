
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}css/datatables.min.css" />
<script src="{{ asset('/') }}js/jquery.dataTables.min.js" defer></script>

<script>
    $(function() {

        var datatable = $('#kt_table_1Arsh').DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            searchable: true,
            bFilter: false,
            ordering: false,
            info: true,
            autoWidth: true,
            responsive: true,
            dom: 'lBfrtip',
            processing: true,
            pageLength: 5,
            lengthMenu: [5, 10, 20, 50, 100, 200, 500],
            "columnDefs": [
        { "orderable": false, "targets": [0, 4, 5, 6] },
        { "orderable": true, "targets": [1, 2, 3] }
    ]
        });
        $('#serachData').click(function() {
            datatable.column(0).search($("#searchFirstName").val().trim()).draw();
            datatable.column(2).search($("#searchEmail").val().trim()).draw();
            datatable.column(1).search($("#searchLastName").val().trim()).draw();
            datatable.column(3).search($("#searchPhone").val().trim()).draw();
        });
        $('#resetData').click(function() {
//             console.log("i")
            $("#searchFirstName").val('');
            $("#searchEmail").val('')
            $("#searchLastName").val('')
            $("#searchPhone").val('')
            datatable.search('').columns().search('').draw();
            
        });
    });
</script>