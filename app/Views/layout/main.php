<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="icon" href="<?= base_url('templates/'); ?>assets/img/selin-bulat.png">
  <title>SI-PAKAN</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('templates/'); ?>node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?= base_url('templates/'); ?>node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="<?= base_url('templates/'); ?>node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url('templates/'); ?>node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

  <link rel="stylesheet" href="<?= base_url('templates/'); ?>node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('templates/'); ?>node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('templates/'); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url('templates/'); ?>assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
       <!-- Navbar -->
       <?= $this->include('templates/navbar'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?= $this->include('templates/sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <?= $this->renderSection('content'); ?>
        
        <!-- /.content-wrapper -->
        <?= $this->include('templates/footer'); ?>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url('templates/'); ?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?= base_url('templates/'); ?>node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="<?= base_url('templates/'); ?>node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="<?= base_url('templates/'); ?>node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="<?= base_url('templates/'); ?>node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="<?= base_url('templates/'); ?>node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="<?= base_url('templates/'); ?>node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('templates/'); ?>node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('templates/'); ?>node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url('templates/'); ?>assets/js/scripts.js"></script>
  <script src="<?= base_url('templates/'); ?>assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url('templates/'); ?>assets/js/page/index.js"></script>
  <script src="<?= base_url('templates/'); ?>assets/js/page/modules-datatables.js"></script>

  <script>
    $(document).ready(function() {
        $('#table-1').DataTable();
    });
</script>
</body>
</html>
