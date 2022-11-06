<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

     <link href="{{asset('assets/bootstrap/css/bootstrap.css')}}" rel="stylesheet" />

  
  <link href="{{asset('assets/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
  <link href="{{asset('assets/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">

        <!-- Icons css -->
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

        <!-- Internal Data table css -->
         <link href="{{asset('assets/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 15px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 15px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Booking') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('layouts.sidebar')
            @yield('content')
        </main>
    </div>

        <script src="{{asset('assets/jquery/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
       
        <script src="{{asset('assets/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
        <script src="{{asset('assets/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>



        <script src=" {{asset('developer/js/notify.min.js')}}"></script>
        <script src="{{asset('assets/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/datatable/js/dataTables.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/datatable/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/datatable/js/responsive.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/datatable/js/jquery.dataTables.js')}}"></script>
        <script src="{{asset('assets/datatable/js/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('assets/datatable/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/datatable/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/datatable/js/jszip.min.js')}}"></script>
        <script src="{{asset('assets/datatable/js/pdfmake.min.js')}}"></script>
        <script src="{{asset('assets/datatable/js/vfs_fonts.js')}}"></script>
        <script src="{{asset('assets/datatable/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/datatable/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets/datatable/js/buttons.colVis.min.js')}}"></script>
        <script src="{{asset('assets/datatable/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/datatable/js/responsive.bootstrap4.min.js')}}"></script>
          <script src="{{ asset('datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('developer/js/jquery.validate.js') }}"></script>
        <script src="{{ asset('developer/js/jquery.validate.min.js') }}"></script>

        <script type="text/javascript">

        function callBackDataTablesSan(table_id,url,options=[],extra_data=null){

            var columns = createColumns(table_id,extra_data);
             let defaults = {
                    buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
                    responsive: true,
                    bDestroy: true,
                    bSearchable:true,
                    deferRender: true,
                    serverSide: true,
                    processing: true,
                    paging: true,

                    // drawCallback: changeListCheck,
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        // lengthMenu: 'MENU ',
                    },
                    lengthMenu: [[-1, 10, 25, 50, 100, 500, 1000], ['All', 10, 25, 50, 100, 500, 1000]],
                    bAutoWidth: false,
                    ajax: {
                        url:url,
                        data:function ( d ) {
                              return extra_data ? $.extend( {}, d, extra_data ) : d ;
                          }
                    },
                    method: "GET",
                    columns: columns,
                    pageLength: 10,
                    searching: true,
                    bFilter: false,
                    bStateSave: true,
                    fnStateSave : function (oSettings, oData) {
                        localStorage.setItem(table_id, JSON.stringify(oData));
                    },
                    fnStateLoad: function (oSettings) {
                        return JSON.parse(localStorage.getItem(table_id));
                    }
                };
                jQuery.extend(defaults, options)
                // console.log(defaults);
            var table = $(table_id).DataTable(defaults);
            table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
            $(table_id).DataTable().ajax.reload();
            return table;
        }

          function createColumns(table_id){
            var columns = [];
            $(table_id).find('thead th').each(function(){
                var data =[]
                $.each(this.attributes, function() {
                    if(this.specified) {
                        if(this.name.includes("data")){
                            var name = this.name.replace("data-","");
                            var value = this.value;
                            data.push({[name] :value});
                        }
                    }
                  });
                columns.push(data);
            });
            console.log(columns);
            return columns;
        }
            



        </script>

     @yield('script')
</body>
</html>
