	@extends('layout')
@section('admin_content')
  <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật nhà cung cấp
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form action="{{url('/update-supplier')}}/{{$supplier->supplier_id}}" id="formValidation" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label>Tên nhà cung cấp</label>
                                    <input type="text" value="{{$supplier->supplier_name}}" class="form-control" name="supplier_name" >
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" value="{{$supplier->supplier_email}}" class="form-control" name="supplier_email" >
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" value="{{$supplier->supplier_phone}}" class="form-control" name="supplier_phone" >
                                </div>
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" value="{{$supplier->supplier_website}}" class="form-control" name="supplier_website" >
                                </div>
                               
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection