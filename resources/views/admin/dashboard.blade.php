@extends('layout')
@include('sweetalert::alert')
@section('admin_content')
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Tồn kho</h4>
					<h3>{{$product}}</h3>
					<p>Sản phẩm</p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Số lượng nhập</h4>
						<h3>{{$nhap}}</h3>
						<p>Sản phẩm</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Số lượng xuất</h4>
						<h3>{{$xuat}}</h3>
						<p>Sản phẩm</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		
		   <div class="clearfix"> </div>
		</div>	
		<!-- //market-->
		<div class="row">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">
					<!--agileinfo-grap-->
						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3>Thống kê nhập hàng</h3>
										<div class="toolbar">
										
											
										</div>
								</header>
								<div class="agileits-box-body clearfix">
									<div id="hero-area"></div>
								</div>
							</div>
						</div>
	<!--//agileinfo-grap-->

				</div>
			</div>
		</div>
		
        @endsection
		