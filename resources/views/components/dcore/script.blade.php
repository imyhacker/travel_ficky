
  <!-- General JS Scripts -->
  <script src="https://demo.getstisla.com/assets/modules/jquery.min.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/popper.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/tooltip.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/moment.min.js"></script>
  <script src="https://demo.getstisla.com/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="https://demo.getstisla.com/assets/modules/jquery.sparkline.min.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/chart.min.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/summernote/summernote-bs4.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="https://demo.getstisla.com/assets/js/page/index.js"></script>
  
  <!-- Template JS File -->
  <script src="https://demo.getstisla.com/assets/js/scripts.js"></script>
  <script src="https://demo.getstisla.com/assets/js/custom.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready( function () {
    $('#table_id').DataTable();
    $('#table_admin').DataTable();

} );
  </script>
  @if(Session('sukses'))
  <script>
    Swal.fire({
  title: 'Sukses!',
  text: "{{session('sukses')}}",
  icon: 'success',
  confirmButtonText: 'Okey!'
})
  </script>
  @elseif(Session('error'))
  <script>
    Swal.fire({
      title: 'Ooopss!',
  text: "{{session('error')}}",
  icon: 'error',
  confirmButtonText: 'Okey!'
})
  </script>
  @endif
</body>
</html>