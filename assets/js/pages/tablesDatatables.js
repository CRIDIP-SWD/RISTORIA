/*
 *  Document   : tablesDatatables.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Tables Datatables page
 */

var TablesDatatables = function() {

    return {
        init: function() {
            /* Initialize Bootstrap Datatables Integration */
            App.datatables();

            /* Initialize Datatables */
            $('#example-datatable').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 1, 2 ] } ],
                "iDisplayLength": 10,
                "aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "All"]]
            });
            /* Initialize Datatables */
            $('#famille-article').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0, 1 ] } ],
                "iDisplayLength": 10,
                "aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "All"]]
            });
            /* Initialize Datatables */
            $('#article').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 1, 2 ] } ],
                "iDisplayLength": 10,
                "aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "All"]]
            });
            /* Initialize Datatables */
            $('#menu').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0, 1 ] } ],
                "iDisplayLength": 10,
                "aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "All"]]
            });
            /* Initialize Datatables */
            $('#user').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 1, 2 ] } ],
                "iDisplayLength": 10,
                "aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "All"]]
            });

            /* Add placeholder attribute to the search input */
            $('.dataTables_filter input').attr('placeholder', 'Rechercher');
        }

    };
}();