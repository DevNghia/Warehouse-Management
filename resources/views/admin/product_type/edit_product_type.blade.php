	@extends('layout')
@section('admin_content')
  <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật loại sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form action="{{url('/update-product-type')}}/{{$product_type->product_type_id}}" id="formValidation" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label>Tên loại sản phẩm</label>
                                    <input type="text" class="form-control" value="{{$product_type->product_type_name}}" name="product_type_name" >
                                      <div class="form-group">
                                    <label>Ghi chú</label>
                                    <textarea  style="resize: none " rows="5"  class="form-control" name="note" >{{$product_type->note}} </textarea>
                                    </div>

                                </div>
                               
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection