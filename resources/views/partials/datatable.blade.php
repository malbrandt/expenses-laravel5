@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.dataTable').dataTable({
                "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false,
                }]
            });
        });
    </script>
@endsection