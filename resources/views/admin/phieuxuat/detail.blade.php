		@extends('layout')
@section('admin_content')
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Chi tiết phiếu xuất
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs"> 
      </div>
      <div class="col-sm-4">
       
      </div>
      
      <div class="col-sm-3">
        <div class="input-group">
          <form action="" method="get">
          <input type="text" class="input-sm form-control" name="keyword_submit" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit">Tìm kiếm</button>
          </span></form>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Nhà cung cấp</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
          @foreach ($detail as $item)
              <tr>
            <td>{{$i++}}</td>
            <td>{{$item->products->product_name}}</td>
            <td><span class="text-ellipsis">{{$item->suppliers->supplier_name}}</span></td>
            <td><span class="text-ellipsis">{{$item->soluong}}</span></td>
            <td><span class="text-ellipsis">{{$item->tongtien}}</span></td>
            
          </tr>
          @endforeach
            
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
       
        <div class="col-sm-12 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
           
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection