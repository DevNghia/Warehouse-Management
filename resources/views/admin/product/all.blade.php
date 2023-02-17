		@extends('layout')
@section('admin_content')
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Danh sách sản phẩm
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
        <form action="{{url('/import-product')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <input type="file" name="file" accept=".xlsx"><br>
       <input type="submit" value="Import Excel" name="import_csv" class="btn btn-warning">
        </form>
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
            <th>Mã loại sản phẩm</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Loại sản phẩm</th>
            <th>Nhà cung cấp</th>
            <th>Người tạo</th>
            <th>Đơn vị</th>
            <th>Giá nhập</th>
            <th>Giá bán lẻ</th>
            <th>Giá buôn</th>
             <th>Trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($all_product as $item)
              <tr>
            <td>{{$item->product_id}}</td>
            <td><span class="text-ellipsis">{{$item->product_name}}</span></td>
            <td><img src="/upload/product/{{$item->product_image}}"width="50px" alt=""></td>
            <td><span class="text-ellipsis">{{$item->product_types->product_type_name}}</span></td>
            <td><span class="text-ellipsis">{{$item->suppliers->supplier_name}}</span></td>
            <td><span class="text-ellipsis">{{$item->admins->admin_name}}</span></td>
            <td><span class="text-ellipsis">{{$item->calculations->calculation_name}}</span></td>
            <td><span class="text-ellipsis">{{$item->import_price}} vnđ</span></td> 
            <td><span class="text-ellipsis">{{$item->retail_price}} vnđ</span></td>
             <td><span class="text-ellipsis">{{$item->wholesale_price}} vnđ</span></td>
               <td><span class="text-ellipsis">
                @if ($item->status==0)
                     <a href="/unactive-product/{{$item->product_id}}" class="fa fa-thumbs-down"></a>
                @else
                     <a href="/active-product/{{$item->product_id}}" class="fa fa-thumbs-up"></a>
                @endif  
              </span></td>
             <td><span class="text-ellipsis">{{$item->created_at}}</span></td>
              <td><span class="text-ellipsis">{{$item->updated_at}}</span></td>
            <td>
              <a href="{{url('/edit-product')}}/{{$item->product_id}}" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i></a>
               <a class="active"  ui-toggle-class=""><i data-id_product="{{$item->product_id}}" class="fa fa-times text-danger text"></i></i></a>
             
            </td>
          
          </tr>
          @endforeach
            
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
       
        <div class="col-sm-12 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li>{{$all_product->links()}}</li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection