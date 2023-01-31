	@extends('layout')
@section('admin_content')
  <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm mới nhà cung cấp
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
                                <form action="{{url('/supplier')}}" id="formValidation" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label>Tên nhà cung cấp</label>
                                    <input type="text" class="form-control" name="supplier_name" >
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="supplier_email" >
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="supplier_phone" >
                                </div>
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" class="form-control" name="supplier_website" >
                                </div>
                               
                                <button type="submit" class="btn btn-info">Thêm mới</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection