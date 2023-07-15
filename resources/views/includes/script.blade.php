<script>
  var APP_URL = "{{ env('APP_URL') }}";
</script>
  <!-- plugins:js -->
  <script src="{{ URL::asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{ URL::asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ URL::asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{ URL::asset('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ URL::asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{ URL::asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{ URL::asset('assets/js/template.js')}}"></script>
  <script src="{{ URL::asset('assets/js/settings.js')}}"></script>
  <script src="{{ URL::asset('assets/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ URL::asset('assets/js/jquery.cookie.j')}}s" type="text/javascript"></script>
  <script src="{{ URL::asset('assets/js/dashboard.js')}}"></script>
  <script src="{{ URL::asset('assets/js/Chart.roundedBarCharts.js')}}"></script>

  <script src="{{ URL::asset('assets/vendors/sweetalert/sweetalert.min.js')}}"></script>
  <script src="{{ URL::asset('assets/vendors/jquery-toast-plugin/jquery.toast.min.js')}}"></script>
  <script src="{{ URL::asset('assets/vendors/select2/select2.min.js') }}"></script>
  <script src="{{ URL::asset('js/app.js') }}"></script>
  <!-- End custom js for this page-->


@stack('scripts')
