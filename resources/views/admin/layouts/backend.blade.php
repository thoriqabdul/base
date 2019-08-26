<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>{{env('APP_NAME','Ligana.ID')}}-Admin</title>

    <meta name="description" content="ProperID">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="{{asset('/css/oneui.min.css')}}">

    @yield('css_after')
    <style>
        .dataTables_filter{
            float: right;
        }
        .table{
            width: 100% !important;
        }
        .simplebar-content{
          overflow-x: hidden !important;
        }
    </style>

<!-- Scripts -->
    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
</head>
<body>
<!-- Page Container -->
<!--
    Available classes for #page-container:

GENERIC

    'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

SIDEBAR & SIDE OVERLAY

    'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
    'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
    'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
    'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
    'sidebar-dark'                              Dark themed sidebar

    'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
    'side-overlay-o'                            Visible Side Overlay by default

    'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

    'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

HEADER

    ''                                          Static Header if no class is added
    'page-header-fixed'                         Fixed Header

HEADER STYLE

    ''                                          Light themed Header
    'page-header-dark'                          Dark themed Header

MAIN CONTENT LAYOUT

    ''                                          Full width Main Content if no class is added
    'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
    'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
-->
<div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed">

    <!-- Sidebar -->
    <!--
        Sidebar Mini Mode - Display Helper classes

        Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
        Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
            If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

        Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
        Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
        Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
    -->

    <!-- MenuSidebar Part -->
    @include('admin.layouts.sidebar')



    <!-- Header part -->
    @include('admin.layouts.header')




    <!-- Main Container -->
    <main id="main-container">
        @yield('content')
    </main>
    <!-- END Main Container -->


    <!-- footer Part -->
    @include('admin.layouts.footer')

    @include('admin.layouts._modal')

</div>
<!-- END Page Container -->

<!-- OneUI Core JS -->
<script src="{{asset('js/oneui.core.min.js')}}"></script>
<script src="{{asset('js/oneui.app.min.js')}}"></script>

<script src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>

{{--editor --}}
{{-- <script src="{{asset('js/plugins/summernote/summernote-bs4.min.js')}}"></script> --}}

{{--jquery price format--}}
{{-- <script src="{{asset('js/plugins/Jquery-Price-Format/jquery.priceformat.js')}}"></script> --}}
<!-- bootstrap date timepciker -->
{{-- <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script> --}}
<script>jQuery(function(){ One.helpers(['summernote']); });</script>
<script>
     $('body').on('click', '#modal-show', function(event){
            event.preventDefault();
            var me = $(this),
            url = me.attr('href'),
            title = me.attr('title');

            $('.block-title').text(title);


            $.ajax({
                url : url,
                dataType: 'html',
                success: function(response){
                    console.log(response);
                    $('#modal-content').html(response);
                }
            });
            $('#modal-block-fromright').modal('show');
        })
</script>
{{-- <script>
    $('.datepicker').datetimepicker({
        //autoclose: true,
        format : "yyyy-mm-dd",
        startDate: "-7d",
        icons: {
            up: "fa fa-chevron-circle-up",
            down: "fa fa-chevron-circle-down",
            next: 'fa fa-chevron-circle-right',
            previous: 'fa fa-chevron-circle-left'
        }
    });
    $('.datepicker-no-limit').datetimepicker({
        //autoclose: true,
        format : "YYYY-MM-DD",
        viewMode:'months',
        icons: {
            up: "fa fa-chevron-circle-up",
            down: "fa fa-chevron-circle-down",
            next: 'fa fa-chevron-circle-right',
            previous: 'fa fa-chevron-circle-left'
        }
    });
    $('.datetimepicker-no-limit').datetimepicker({
        //autoclose: true,
        format : "yyyy-mm-dd hh:ii",
        pickTime: true,
        autoclose: true,
        icons: {
            up: "fa fa-chevron-circle-up",
            down: "fa fa-chevron-circle-down",
            next: 'fa fa-chevron-circle-right',
            previous: 'fa fa-chevron-circle-left'
        }

    });
    $('.datetimepicker').datetimepicker({
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left",
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-circle-up",
            down: "fa fa-chevron-circle-down",
            next: 'fa fa-chevron-circle-right',
            previous: 'fa fa-chevron-circle-left'
        }

    });

    $('.numeric_only').bind('keyup paste', function(){this.value = this.value.replace(/[^0-9]/g, ''); });

    $(".curency").on("keyup",function(){
        var rgx = /^[0-9]*\.?[0-9]*$/;
        if($(this).val().match(rgx)){
            return true;
        }else{
            alert("Hanya bisa di input angka dan titik");
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });


    function onlyNumbersWithDot(e) {
        var charCode;
        if (e.keyCode > 0) {
            charCode = e.which || e.keyCode;
        }
        else if (typeof (e.charCode) != "undefined") {
            charCode = e.which || e.keyCode;
        }
        if (charCode == 46)
            return true
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script> --}}
@yield('js_after')

</body>
</html>
