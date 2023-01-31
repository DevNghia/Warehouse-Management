		@extends('layout')
@section('admin_content')
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        Nhà cung cấp
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
            <th>Mã nhà cung cấp</th>
            <th>Tên nhà cung cấp</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Ngày Tạo</th>
            <th>Ngày cập nhật</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php
              $i=1;
          @endphp
          @foreach ($all_supplier as $item)
              <tr>
           <td>{{$i++}}</td>
            <td>{{$item->supplier_id}}</td>
            <td><span class="text-ellipsis">{{$item->supplier_name}}</span></td>
                 <td><span class="text-ellipsis">{{$item->supplier_email}}</span></td>
                  <td><span class="text-ellipsis">{{$item->supplier_phone}}</span></td>
                   <td><span class="text-ellipsis"><a href="{{$item->supplier_website}}">{{$item->supplier_website}}</a></span></td>
             <td><span class="text-ellipsis">{{$item->created_at}}</span></td>
              <td><span class="text-ellipsis">{{$item->updated_at}}</span></td>
            <td>
              <a href="{{url('/edit-supplier')}}/{{$item->supplier_id}}" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i></a>
               <a href="{{url('/delete-supplier')}}/{{$item->supplier_id}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></i></a>
              
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
            <li>{{$all_supplier->links()}}</li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection