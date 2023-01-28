<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="L" name="description"/>
<meta content="L" name="author"/>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- App favicon -->
<link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Bootstrap Css -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
<!-- Icons Css -->
<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- App Css-->
<link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>
{{-- <link href="{{asset('css/custom.css')}}" id="app-style" rel="stylesheet" type="text/css" /> --}}

{{--Toastr--}}
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
   <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>





@yield('custom_css')
@yield('inline_css')

