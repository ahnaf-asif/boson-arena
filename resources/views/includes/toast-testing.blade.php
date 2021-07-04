@section('script-after-all-things')

    @if(session('success'))
    <script>
        $(function () {
            toastr["success"]("{{session('success')}}");
        });
    </script>
    @endif

    @if(session('error'))
        <script>
            $(function () {
                toastr["error"]("{{session('error')}}");
            });
        </script>
    @endif

@endsection
