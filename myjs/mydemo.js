$(function () {
    $('#table1').DataTable({
        /*"destroy":true,*/
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "lengthChange": false,
        "columnDefs": [ { "width": "12%", "targets": -1 }],
        "language": {
            "paginate": {
                "next": "下一页",
                "previous": "上一页",
            },
            "info": "总项数： _TOTAL_",
            "infoEmpty": "",
            "infoFiltered": "",
            "zeroRecords": "没有查询到匹配项！"
        },
        "scrollX": true,
    });
});