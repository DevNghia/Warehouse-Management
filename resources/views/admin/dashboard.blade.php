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
									<h3>Thống kê hàng hóa</h3>
										<div class="toolbar">
										
										
								</div>
										</div>
								</header>
						
								<div class="col-md-12">
								<div id="myfirstchart3" style="height: 250px;"></div>
									</div>
							</div>
							
						</div>
						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3>Thống kê nhập hàng</h3>
										<div class="toolbar">
										
										
								</div>
										</div>
								</header>
							<form autocomplete="off">
								@csrf
									<div class="agileits-box-body clearfix">
									<div class="col-md-2">
									<p>Từ ngày: <input type="text" id="datepicker" class="form-control"> </p>
									<input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
									</div>
									<div class="col-md-2">
									<p>Đến ngày: <input type="text" id="datepicker2" class="form-control"> </p>
				
								</div>
							</form>
								<div class="col-md-12">
								<div id="myfirstchart" style="height: 250px;"></div>
									</div>
							</div>
							
						</div>
						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3>Thống kê xuất hàng</h3>
										<div class="toolbar">
										
										
								</div>
										</div>
								</header>
							<form autocomplete="off">
								@csrf
									<div class="agileits-box-body clearfix">
									<div class="col-md-2">
									<p>Từ ngày: <input type="text" id="datepicker3" class="form-control"> </p>
									<input type="button" id="btn-dashboard-filter2" class="btn btn-primary btn-sm" value="Lọc kết quả">
									</div>
									<div class="col-md-2">
									<p>Đến ngày: <input type="text" id="datepicker4" class="form-control"> </p>
				
								</div>
							</form>
								<div class="col-md-12">
								<div id="mysecondchart" style="height: 250px;"></div>
									</div>
							</div>
							
						</div>
	<!--//agileinfo-grap-->

				</div>
			</div>
		</div>
		@php
use App\Models\Product;
     $get = Product::select("*", DB::raw("count(*) as supplier_count"))
            ->groupBy(DB::raw("supplier_id"))
            ->with('suppliers')
            ->get();
		$chart_data[]= array();
        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'supplier' => $val->supplier_count,
                'label'  => $val->suppliers->supplier_name,
                 'value'  => $val->supplier_count,

            );
        }

         $data = json_encode($chart_data);
@endphp
		<script>
			    Morris.Donut({
  element: 'myfirstchart3',
  colors:['red','green'],
  data: <?php echo $data; ?>
});
		</script>
        @endsection
		