		@extends('layout')
@section('admin_content')
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Danh phiếu nhập
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
         <form action="/add-phieunhap" method="get">
         <button type="submit" class="btn btn-success">Thêm mới</button>
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
            <th>Mã phiếu nhập</th>
            <th>Nội dung</th>
            <th>Người nhập</th>
            <th>Ghi chú</th>
            <th>ngày tạo</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($all_phieunhap as $item)
            <tr>
            <td>{{$item->mapn}}</td>
            <td><span class="text-ellipsis">{{$item->content}}</span></td>
            <td><span class="text-ellipsis">{{$item->admins->admin_name}}</span></td>
            <td><span class="text-ellipsis">{{$item->note}}</span></td>
            <td><span class="text-ellipsis">{{$item->created_at}}</span></td>
            <td>
              <a href="{{url('/show-detail')}}/{{$item->mapn}}" class="active" ui-toggle-class=""><i class="fa fa-eye text-success text-active"></i></a>
             
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
            <li>{{$all_phieunhap->links()}}</li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection