	@extends('layout')
@section('admin_content')
  <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm mới tài khoản
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
                                <form action="{{url('/calculation')}}" id="formValidation" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label>Tên tài khoản</label>
                                    <input type="text" class="form-control" name="calculation_name" >
                                </div>
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="calculation_name" >
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="calculation_name" >
                                </div>
                                 <div class="form-group">
                                    <label>mật khẩu</label>
                                    <input type="text" class="form-control" name="calculation_name" >
                                </div>
                                <button type="submit" class="btn btn-info">Thêm mới</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection