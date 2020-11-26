<script src="{{ asset('/backend/lib/popper.js/popper.js') }}"></script>
<script src="{{ asset('/backend/lib/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('/backend/lib/jquery/jquery.js') }}"></script>
<script src="{{ asset('/backend/lib/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('/backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
<script src="{{ asset('/backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('/backend/lib/d3/d3.js') }}"></script>
<script src="{{ asset('/backend/lib/rickshaw/rickshaw.min.js') }}"></script>
<script src="{{ asset('/backend/lib/chart.js/Chart.js') }}"></script>
<script src="{{ asset('/backend/lib/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('/backend/lib/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('/backend/lib/Flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('/backend/lib/flot-spline/jquery.flot.spline.js') }}"></script>

<script src="{{ asset('/backend/lib/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset('/backend/lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/backend/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
<script src="{{ asset('/backend/lib/select2/js/select2.min.js') }}"></script>

<script>
    $(function(){
      'use strict';

      $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

      $('#datatable2').DataTable({
        bLengthChange: false,
        searching: false,
        responsive: true
      });

      // Select2
      $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
  </script>
<script src="{{ asset('public/backend/js/starlight.js') }}"></script>
<script src="{{ asset('public/backend/js/ResizeSensor.js') }}"></script>
<script src="{{ asset('public/backend/js/dashboard.js') }}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
      @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('messege') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
               toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
      @endif
   </script>





</body>
</html>
