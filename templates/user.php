<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="#">
<meta name="author" content="#">
<link rel="icon" type="image/png" sizes="16x16" href="<?=$this->baseUrl()?>img/hp-favicon.png">
<title><?=$title?></title>
<!-- Bootstrap Core CSS -->
<link href="<?=$this->baseUrl()?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Data table -->
<link href="<?=$this->baseUrl()?>plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<!-- Date picker plugins css -->
<link href="<?=$this->baseUrl()?>plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<!-- Daterange picker plugins css -->
<link href="<?=$this->baseUrl()?>plugins/bower_components/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="<?=$this->baseUrl()?>plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- Footable CSS -->
<link href="<?=$this->baseUrl()?>plugins/bower_components/footable/css/footable.core.css" rel="stylesheet">
<link href="<?=$this->baseUrl()?>plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
<!-- Select 2 -->
<link href="<?=$this->baseUrl()?>plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
<link href="<?=$this->baseUrl()?>plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
<link href="<?=$this->baseUrl()?>plugins/bower_components/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
<!-- Menu CSS -->
<link href="<?=$this->baseUrl()?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!-- toast CSS -->
<link href="<?=$this->baseUrl()?>plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
<!-- morris CSS -->
<link href="<?=$this->baseUrl()?>plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
<!-- Clock CSS -->
<link href="<?=$this->baseUrl()?>/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?=$this->baseUrl()?>css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?=$this->baseUrl()?>css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="<?=$this->baseUrl()?>css/colors/blue.css" id="theme"  rel="stylesheet">

<!-- jQuery -->
<script src="<?=$this->baseUrl()?>plugins/bower_components/jquery/dist/jquery.min.js"></script>

</head>
<body>
<!-- Preloader -->
<div class="preloader hidden-print">
  <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
  <!-- HEADER -->

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
      <div class="top-left-part"><a class="logo" href="#"><b><img src="<?=$this->baseUrl()?>plugins/images/harmonipermana-logo.png" width="150" alt="home" /></b><span class="hidden-xs"></span></a></div>
      <ul class="nav navbar-top-links navbar-left hidden-xs active">
        <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="ti-menu"></i></a></li>
        <li class="in">
          <form role="search" class="app-search hidden-xs">
            <input type="text" placeholder="Search..." class="form-control">
            <a href="" class="active"><i class="fa fa-search"></i></a>
          </form>
        </li>
      </ul>
      <ul class="nav navbar-top-links navbar-right pull-right">
        
        <!-- /.dropdown -->
        <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"><img src="<?=$this->baseUrl()?>plugins/images/users/avatar.png" alt="user-img" width="36" class="img-circle"> </a>
          <ul class="dropdown-menu dropdown-user animated flipInY">
            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
            <li><a href="<?= $this->pathFor('user-logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
      </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
  </nav>
  <!-- Left navbar-header -->
  <div class="navbar-default sidebar hidden-print" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li><a href="/board/<?= $_SESSION['id']; ?>" class="waves-effect"><i class="icon-list fa-fw"></i> <span class="hide-menu">Job Desc <span class="fa arrow"></span></span></a>
                </li>
        </ul>
    </div>
  </div>
  <style type="text/css">
    .white-box {
    background: #ffffff;
    margin: 0;
    padding: 25px;
    width: auto;
    margin-bottom: 15px;
    border-radius: 0;
    }
  </style>
  <!-- Left navbar-header end -->
  <!-- Page Content -->
    <div id="page-wrapper" style="min-height: 601px;">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-sm-2 col-xs-9">
          <a class="btn btn-block btn-outline btn-rounded btn-info"><span><?=$title?></span></a>
        </div>
        <div class="col-sm-2 col-lg-1 col-xs-9">
          <a class="btn btn-block btn-outline btn-rounded btn-info"><span class="ti-lock"> Private</span></a>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="#">Show Menu</a></li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="white-box">
            <h3 class="box-title m-b-0">Data Users</h3>
             <p class="text-muted m-b-20"><a href="<?php echo $this->pathFor('form-user'); ?>" class="btn btn-primary">Tambah</a></p>
            <table id="myTable" class="table table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>username</th>
                  <th>role</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($users as $user): ?>
                <tr>
                  <td class="text-nowrap">
                      <a href="<?php echo $this->pathFor('update-user', ['id' => $user->id]) ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i></a>
                      <a href="<?php echo $this->pathFor('delete-user', ['id' => $user->id]) ?>" data-toggle="tooltip" data-original-title="Hapus"> <i class="fa fa-close text-danger m-r-10"></i> </a>
                  </td>
                  <td><?= $user->username; ?></td>
                  <td><?php if($user->role==0){ echo "User"; } else { echo "Administrator";} ?></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- .right-sidebar -->
      <div class="right-sidebar">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="slimscrollright" style="overflow: hidden; width: auto; height: 100%;">
          <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
          <div class="r-panel-body">
            <ul>
              <li><b>Layout Options</b></li>
              <li>
                <div class="checkbox checkbox-info">
                  <input id="checkbox1" type="checkbox" class="fxhdr">
                  <label for="checkbox1"> Fix Header </label>
                </div>
              </li>
              
            </ul>
            <ul id="themecolors" class="m-t-20">
              <li><b>With Light sidebar</b></li>
              <li><a href="javascript:void(0)" theme="default" class="default-theme">1</a></li>
              <li><a href="javascript:void(0)" theme="green" class="green-theme">2</a></li>
              <li><a href="javascript:void(0)" theme="gray" class="yellow-theme">3</a></li>
              <li><a href="javascript:void(0)" theme="blue" class="blue-theme">4</a></li>
              <li><a href="javascript:void(0)" theme="purple" class="purple-theme">5</a></li>
              <li><a href="javascript:void(0)" theme="megna" class="megna-theme working">6</a></li>
              <li><b>With Dark sidebar</b></li>
              <br>
              <li><a href="javascript:void(0)" theme="default-dark" class="default-dark-theme">7</a></li>
              <li><a href="javascript:void(0)" theme="green-dark" class="green-dark-theme">8</a></li>
              <li><a href="javascript:void(0)" theme="gray-dark" class="yellow-dark-theme">9</a></li>

              <li><a href="javascript:void(0)" theme="blue-dark" class="blue-dark-theme">10</a></li>
              <li><a href="javascript:void(0)" theme="purple-dark" class="purple-dark-theme">11</a></li>
              <li><a href="javascript:void(0)" theme="megna-dark" class="megna-dark-theme">12</a></li>
            </ul>
            <ul class="m-t-20 chatonline">
              <li><b>Chat option</b></li>
              <li><a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a></li>
              <li><a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a></li>
              <li><a href="javascript:void(0)"><img src="../plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a></li>
              <li><a href="javascript:void(0)"><img src="../plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a></li>
              <li><a href="javascript:void(0)"><img src="../plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a></li>
              <li><a href="javascript:void(0)"><img src="../plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a></li>
              <li><a href="javascript:void(0)"><img src="../plugins/images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a></li>
              <li><a href="javascript:void(0)"><img src="../plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a></li>
            </ul>
          </div>
        </div><div class="slimScrollBar" style="background: rgb(220, 220, 220); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
      </div>
      <!-- /.right-sidebar -->
    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2016 © Elite Admin brought to you by themedesigner.in </footer>
  </div>
</div>
<!-- /#wrapper -->


<!-- Bootstrap Core JavaScript -->
<script src="<?=$this->baseUrl()?>bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?=$this->baseUrl()?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="<?=$this->baseUrl()?>js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?=$this->baseUrl()?>js/waves.js"></script>
<!--Counter js -->
<script src="<?=$this->baseUrl()?>plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="<?=$this->baseUrl()?>plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!--Morris JavaScript -->
<script src="<?=$this->baseUrl()?>plugins/bower_components/raphael/raphael-min.js"></script>
<script src="<?=$this->baseUrl()?>plugins/bower_components/morrisjs/morris.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?=$this->baseUrl()?>js/custom.js"></script>
<script src="<?=$this->baseUrl()?>js/dashboard1.js"></script>
<!-- Sparkline chart JavaScript -->
<script src="<?=$this->baseUrl()?>plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="<?=$this->baseUrl()?>plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
<script src="<?=$this->baseUrl()?>plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<script src="<?=$this->baseUrl()?>plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
<!-- React JS -->
<script src="https://fb.me/react-with-addons-15.2.1.js"></script>
<script src="https://fb.me/react-dom-15.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.34/browser.min.js"></script>
<!-- Select2 -->
<script src="<?=$this->baseUrl()?>plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
<script src="<?=$this->baseUrl()?>plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?=$this->baseUrl()?>plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?=$this->baseUrl()?>plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=$this->baseUrl()?>plugins/bower_components/multiselect/js/jquery.multi-select.js"></script>
<!-- Plugin JavaScript -->
<script src="<?=$this->baseUrl()?>plugins/bower_components/moment/moment.js"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="<?=$this->baseUrl()?>plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- Date range Plugin JavaScript -->
<script src="<?=$this->baseUrl()?>plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?=$this->baseUrl()?>plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?=$this->baseUrl()?>plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>

<script src="<?=$this->baseUrl()?>js/numeral.js"></script>
<script src="<?=$this->baseUrl()?>plugins/bower_components/nestable/jquery.nestable.js"></script>
<script>
    $(document).ready(function(){
      $('#myTable').DataTable();
      $(document).ready(function() {
        var table = $('#example').DataTable({
          "columnDefs": [
          { "visible": false, "targets": 2 }
          ],
          "order": [[ 2, 'asc' ]],
          "displayLength": 25,
          "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;

            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
              if ( last !== group ) {
                $(rows).eq( i ).before(
                  '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                  );

                last = group;
              }
            } );
          }
        } );

    // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
      var currentOrder = table.order()[0];
      if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
        table.order( [ 2, 'desc' ] ).draw();
      }
      else {
        table.order( [ 2, 'asc' ] ).draw();
      }
    } );
  } );
    });
  </script>
<!--Style Switcher -->
<!-- <script src="<?=$this->baseUrl()?>plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script> -->
<!-- Footable -->
<script src="<?=$this->baseUrl()?>plugins/bower_components/footable/js/footable.all.min.js"></script>
<script src="<?=$this->baseUrl()?>plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>

<!-- VUEJS -->
<script src="<?=$this->baseUrl()?>js/vue.min.js"></script>
<script src="<?=$this->baseUrl()?>js/vue-resource.min.js"></script>
<script src="<?=$this->baseUrl()?>js/app/vue.checkout-add.js"></script>
<script src="<?=$this->baseUrl()?>js/app/vue.periodic-rate.js"></script>
<script src="<?=$this->baseUrl()?>js/app/vue.currency.js"></script>
<script src="<?=$this->baseUrl()?>js/app/vue.roomchange.js"></script>
<script src="<?=$this->baseUrl()?>js/app/vue.costListBuild.js"></script>
<script src="<?=$this->baseUrl()?>js/app/vue.roomrates.js"></script>
<script src="<?=$this->baseUrl()?>js/app/reservation.js"></script>
<script src="<?=$this->baseUrl()?>js/app/logistic-purchase-request.js"></script>

</body>
</html>
