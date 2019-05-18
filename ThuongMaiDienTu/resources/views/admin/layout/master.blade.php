<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/admin/css/sb-admin-2.min.css" rel="stylesheet">
   @yield('css')
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    @include('admin.partial.slider')
    <!-- END Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        @include('admin.partial.nav')
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        @yield('content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      @include('admin.layout.footer')
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  @include('admin.partial.modal')
  @yield('modal')
  <!-- Bootstrap core JavaScript-->
  <script src="/admin/vendor/jquery/jquery.min.js"></script>
  <script src="/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/admin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/admin/js/demo/chart-area-demo.js"></script>
  <script src="/admin/js/demo/chart-pie-demo.js"></script>

  <script src="/asset/ckeditor/ckeditor.js" charset="utf-8"></script>
  <script type="text/javascript">
    baseUrl = "http://thuongmaidientu.com";
    roxyFileman = '/asset/fileman/index.html?integration=ckeditor';
    options = {
            removeDialogTabs: 'link:upload;image:Upload',
            filebrowserBrowseUrl:roxyFileman,
            filebrowserUploadUrl:roxyFileman,
            filebrowserImageBrowseUrl:roxyFileman+'&type=image'
    };
    function openCustomRoxy(){
      $('#roxyCustomPanel').dialog({modal:true, width:875,height:600});
    }
    function closeCustomRoxy(){
      $('#roxyCustomPanel').dialog('close');
    }
    // function openCustomRoxy2(){
    //   $('#roxyCustomPanel2').dialog({modal:true, width:875,height:600});
    // }
    // function closeCustomRoxy2(){
    //   $('#roxyCustomPanel2').dialog('close');
    // }

    $(function(){
      CKEDITOR.replace( 'description_vi', options);
      CKEDITOR.replace( 'description_en', options);
    });
</script>

<script type="text/javascript">
<!--
$('#nav-tab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
//-->
</script>

{{-- <script src="/asset/jquery/jquery.min.js"></script> --}}
    <script src="/asset/jquery-ui-1.12.1/jquery-ui.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/asset/bootstrap/js/bootstrap.min.js"></script>

    @yield('script')
    
</body>

</html>