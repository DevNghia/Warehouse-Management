	@extends('layout')
@section('admin_content')
  <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm
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
                                <form action="{{url('/update-product')}}/{{$product->product_id}}" id="formValidation" method="post" enctype="multipart/form-data">
                                    @csrf
                                     <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" value="{{$product->product_name}}" class="form-control" name="product_name" >
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input type="file" value="{{$product->product_image}}" name="product_image" class="form-control" accept="image/*">
                                       <img src="/upload/product/{{$product->product_image}}" width="100px" >
                                </div>
                                <div class="form-group">
                                    <label>Loại sản phẩm</label>
                                     <select name="product_type" class="form-control input-sm m-bot15">
                                    @foreach ($product_type as $item)
                                        @if($item->product_type_id==$product->product_type_id)
                                        <option selected value="{{$item->product_type_id}}">{{$item->product_type_name}}</option>
                                        @else
                                        <option value="{{$item->product_type_id}}">{{$item->product_type_name}}</option>
                                        @endif
                                    @endforeach
                                   </select>
                                </div>
                                <div class="form-group">
                                    <label>Nhà cùng cấp</label>
                                     <select name="calculation" class="form-control input-sm m-bot15">
                                    @foreach ($calculation as $item)
                                       @if($item->calculation_id==$product->calculation_id)
                                        <option selected value="{{$item->calculation_id}}">{{$item->calculation_name}}</option>
                                        @else
                                         <option value="{{$item->calculation_id}}">{{$item->calculation_name}}</option>
                                        @endif
                                    @endforeach
                                   </select>
                                </div>
                                <div class="form-group">
                                    <label>Giá nhập</label>
                                    <input type="text" value="{{$product->import_price}}" class="form-control" name="import_price" >
                                </div>
                                <div class="form-group">
                                    <label>Giá bán lẻ</label>
                                    <input type="text" value="{{$product->retail_price}}" class="form-control" name="retail_price" >
                                </div>
                                <div class="form-group">
                                    <label>Giá Buôn</label>
                                    <input type="text" value="{{$product->wholesale_price}}" class="form-control" name="wholesale_price" >
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                     <select name="status" class="form-control input-sm m-bot15">
                                        @if ($product->status==1)
                                            <option value="1">Hoạt động</option>
                                            <option value="0">Tạm dừng</option>
                                        @else
                                               <option value="0">Tạm dừng</option>
                                                 <option value="1">Hoạt động</option>
                                        @endif
                                     
                                   </select>
                                </div>
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection