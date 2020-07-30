<script src="{{ asset('admin_admin/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin_admin/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_admin/lib/ionicons/ionicons.js') }}"></script>
<script src="{{ asset('admin_admin/lib/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_admin/lib/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_admin/lib/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin_admin/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_admin/lib/select2/js/select2.min.js') }}"></script>

<script src="{{ asset('admin_admin/js/azia.js') }}"></script>
<script>
    $(document).ready(function(){
        'use strict';

        $('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page'
            }
        });

        $('#datatable2').DataTable({
            language: {
                searchPlaceholder: '...جستجو کنید',
                sSearch: '',
                lengthMenu: '_MENU_ items/page'
            },
            responsive: true
        });

        $(document).ready(function(){
            $('.select2').select2({
                placeholder: 'Choose one'
            });

            $('.select2-no-search').select2({
                minimumResultsForSearch: Infinity,
                placeholder: 'Choose one'
            });
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
</script>