@section('scripts')
    <script type="text/javascript">
        $(function(){
            $('[tooltip]').each(function() {
                $(this).attr('data-toggle', 'tooltip');
                $(this).attr('data-placement', 'bottom');
                $(this).attr('title', $(this).attr('tooltip'));
                $(this).removeAttr('tooltip');
                $(this).tooltip();
            });
        });
    </script>
@endsection