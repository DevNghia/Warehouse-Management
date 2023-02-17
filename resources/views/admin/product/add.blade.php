	@extends('layout')
@section('admin_content')
  <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm mới sản phẩm
                        </header>
                        <div class="panel-body">
                               @php
                                 $error = Session()->get('warrning');
                                if($error){
                                echo '<span class="error">'.$error.'</span>';
                                    Session()->put('error',null);
                                }
                                @endphp 
                            <div class="position-center">
                                <form action="{{url('/product')}}" id="formValidation" method="post" enctype="multipart/form-data">
                                    @csrf
                                     <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="product_name" >
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input type="file"  name="product_image" class="form-control" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label>Loại sản phẩm</label>
                                     <select name="product_type" class="form-control input-sm m-bot15">
                                    @foreach ($product_type as $item)
                                        <option value="{{$item->product_type_id}}">{{$item->product_type_name}}</option>
                                    @endforeach
                                   </select>
                                </div>
                                <div class="form-group">
                                    <label>Nhà cùng cấp</label>
                                     <select name="supplier" class="form-control input-sm m-bot15">
                                    @foreach ($supplier as $item)
                                        <option value="{{$item->supplier_id}}">{{$item->supplier_name}}</option>
                                    @endforeach
                                   </select>
                                </div>
                                 <div class="form-group">
                                    <label>Đơn vị</label>
                                     <select name="calculation" class="form-control input-sm m-bot15">
                                    @foreach ($calculation as $item)
                                        <option value="{{$item->calculation_id}}">{{$item->calculation_name}}</option>
                                    @endforeach
                                   </select>
                                </div>
                                <div class="form-group">
                                    <label>Giá nhập</label>
                                    <input type="text" class="form-control" name="import_price" >
                                </div>
                                <div class="form-group">
                                    <label>Giá bán lẻ</label>
                                    <input type="text" class="form-control" name="retail_price" >
                                </div>
                                <div class="form-group">
                                    <label>Giá Buôn</label>
                                    <input type="text" class="form-control" name="wholesale_price" >
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                     <select name="status" class="form-control input-sm m-bot15">
                                        <option value="1">Hoạt động</option>
                                        <option value="0">Tạm dừng</option>
                                   </select>
                                </div>
                                <button type="submit" class="btn btn-info">Thêm mới</button>
                            </form>
                            

                        </div>
                    </section>

            </div>
@endsection