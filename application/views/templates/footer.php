<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url() ?>assets/assets/js/stisla.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url() ?>assets/assets/js/scripts.js"></script>
  <script src="<?= base_url() ?>assets/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url() ?>assets/assets/js/page/index-0.js"></script>

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/fc-3.3.2/fh-3.1.8/r-2.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/fc-3.3.2/fh-3.1.8/r-2.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/datatables.min.js"></script>

  <!-- <script>
  $(document).ready(function() {
    $('#table-1').DataTable();
  } );
  </script> -->

  <script>
  $(document).ready(function() {
    var table = $('#table-1').DataTable({
      paging: true,
      ordering: false,
      fixedHeader: true
      });
    });
  </script>

</body>
</html>
