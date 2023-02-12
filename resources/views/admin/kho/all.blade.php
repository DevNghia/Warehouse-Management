		@extends('layout')
@section('admin_content')
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Quản lý kho hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
            @php
        $message = Session()->get('message');
          $error = Session()->get('error');
	if($message){
		echo '<span class="tex-alers">'.$message.'</span>';
		Session()->put('message',null);
    }
    if($error){
      echo '<span class="error">'.$error.'</span>';
		Session()->put('error',null);
    }
    @endphp    
      </div>
     <div class="col-sm-9">
         
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
            <th>ảnh</th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            {{-- <th>Đơn vị </th> --}}
            <th>Số lượng</th>
        
          </tr>
        </thead>
        @php
            $i=1;
        @endphp
        <tbody>
        
          @foreach ($all_product as $item)
            <tr>
            <td>{{$i++}}</td>
              <td><img src="/upload/product/{{$item->products->product_image}}"width="50px" alt=""></td>
               <td>{{$item->product_id}}</td>
               <td><span class="text-ellipsis">{{$item->products->product_name}}</span></td>
               <td><span class="text-ellipsis">{{($item->amount)}}</span></td>
              
          </tr>
          @endforeach
            
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
       
        <div class="col-sm-12 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {{-- <li>{{$all_product->links()}}</li> --}}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection