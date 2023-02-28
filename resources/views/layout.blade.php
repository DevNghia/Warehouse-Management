
<!DOCTYPE html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='{{asset('//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic')}}' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('css/font.css')}}" type="text/css"/>
<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('css/monthly.css')}}">
<!-- //calendar -->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<!-- //font-awesome icons -->
<script src="{{asset('js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('js/raphael-min.js')}}"></script>
<script src="{{asset('js/morris.js')}}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{url('/dashboard')}}" class="logo">
        NHÓM 5
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
   
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/nguyenchinghia.jpg">

                <span class="username">
                    @php
                        $name = Session()->get('admin_name');
                    if($name){
                        echo $name;
                    }
                    @endphp
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{url('/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{url('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-book"></i>
                        <span>Vị trí</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{url('/show-product-type')}}">Danh sách vị trí</a></li>
						<li><a href="{{url('/add-product-type')}}">Thêm mới vị trí</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-book"></i>
                        <span>Đơn vị tính</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{url('/show-calculation')}}">Danh sách đơn vị tính</a></li>
						<li><a href="{{url('/add-calculation')}}">Thêm mới đơn vị tính</a></li>
                    </ul>
                </li>
                 <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-book"></i>
                        <span>Nhà cung cấp</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{url('/show-supplier')}}">Danh sách nhà cung cấp</a></li>
						<li><a href="{{url('/add-supplier')}}">Thêm mới nhà cung cấp</a></li>
                    </ul>
                </li>
                   <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-book"></i>
                        <span>sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{url('/show-product')}}">Danh sách sản phẩm</a></li>
						<li><a href="{{url('/add-product')}}">Thêm mới sản phẩm</a></li>
                    </ul>
                </li>
               
              
                 <li class="sub-menu">
                    <a href="">
                        <i class="fa fa-book"></i>
                        <span>Quản lý nhập xuất</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{url('/show-phieunhap')}}">Danh sách phiếu nhập</a></li>
						<li><a href="{{url('/show-phieuxuat')}}">Danh sách phiếu xuất</a></li>
                    </ul>
                </li>
                  <li class="sub-menu">
                    <a href="{{url('/show-kho')}}">
                        <i class="fa fa-book"></i>
                        <span>Quản lý kho hàng</span>
                    </a>
                    
                </li>
            <li class="sub-menu">
                    <a href="{{url('/show-all-account')}}">
                        <i class="fa fa-book"></i>
                        <span>Quản lý tài khoản người dùng</span>
                    </a>
                    
                </li>
         
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		@yield('admin_content')
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2023 Visitors. All rights reserved | Design by <a href="https://github.com/DevNghia">DevNghia</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>

<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->	

<!-- calendar -->
	<script type="text/javascript" src="{{asset('js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> 
<script src="{{asset('js/validation.js')}}"></script>
<script src="{{asset('js/sweetalert.all.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@if (session('message'))
<script>
Swal.fire({
title: "Lỗi",
text: "{{ session('message') }}",
icon: "error",
});
</script>
@endif
@include('sweetalert::alert')
<script>
   $(document).ready(function(){
		$('.text-danger').click(function(){
          var id = $(this).data('id_product_type');
             var token = $("meta[name='csrf-token']").attr("content");
            Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
      
    	$.ajax({
         url: '{{('delete-product-type/')}}'+id,
        type: 'GET',
        data: {
            "_token": token,
        },
              	     success:function(){
                       Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success', 
    )
                }
            	});
   window.setTimeout(function () {
    location.reload();
  }, 3000);
  }
})
        });
				
});

</script>
	<!-- //calendar -->
<script>
     $( function() {
    $( "#datepicker" ).datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin:["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ nhật"],
        duration: "slow"
    });
     $( "#datepicker2" ).datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin:["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ nhật"],
        duration: "slow"
    });
      $( "#datepicker3" ).datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin:["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ nhật"],
        duration: "slow"
    });
     $( "#datepicker4" ).datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin:["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ nhật"],
        duration: "slow"
    });
  } );    
 
  $(document).ready(function() {
    chart30day();
  
    function chart30day(){
               var _token = $('input[name="_token"]').val();
                 $.ajax({
            url:"{{url('/30day')}}",
            method: "POST",
            dataType: "JSON",
            data:{_token:_token},
            success:function(data){
                chart.setData(data);
            }
        })
         }	
		var chart = new Morris.Bar({
			element: 'myfirstchart',
			padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth:true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity:0.85,

            xkey: 'created_at',
            ykeys: ['soluongn'],
            labels: ['Số lượng nhập']
		});

	 $('#btn-dashboard-filter').click(function(){
         var _token = $('input[name="_token"]').val();
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();
        $.ajax({
            url:"{{url('/filter-by-date')}}",
            method: "POST",
            dataType: "JSON",
            data:{from_date:from_date,to_date:to_date,_token:_token},
            success:function(data){
                chart.setData(data);
            }
        })
         })
	});
    $(document).ready(function() {	
         chart30days();
     function chart30days(){
               var _token = $('input[name="_token"]').val();
                 $.ajax({
            url:"{{url('/30days')}}",
            method: "POST",
            dataType: "JSON",
            data:{_token:_token},
            success:function(data){
                chart.setData(data);
            }
        })
         }
		var chart = new Morris.Bar({
			element: 'mysecondchart',
			padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth:true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity:0.85,

            xkey: 'created_at',
            ykeys: ['soluongx'],
            labels: ['Số lượng xuất']
		});
	 $('#btn-dashboard-filter2').click(function(){
         var _token = $('input[name="_token"]').val();
            var from_date = $('#datepicker3').val();
            var to_date = $('#datepicker4').val();
        $.ajax({
            url:"{{url('/filter-by-date2')}}",
            method: "POST",
            dataType: "JSON",
            data:{from_date:from_date,to_date:to_date,_token:_token},
            success:function(data){
                chart.setData(data);
            }
        })
         })
         
	});
</script>  
</body>
</html>
