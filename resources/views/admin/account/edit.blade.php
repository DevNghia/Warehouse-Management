	@extends('layout')
@section('admin_content')
  <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            cập nhật tài khoản
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
                                <form action="{{url('/update-account')}}" id="formValidation" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label>Tên tài khoản</label>
                                    <input type="text" value="{{$account->admin_name}}" class="form-control" name="admin_name" >
                                </div>
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" value="{{$account->admin_email}}" class="form-control" name="admin_email" >
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" value="{{$account->admin_phone}}" class="form-control" name="admin_phone" >
                                </div>
                                 <div class="form-group">
                                    <label>mật khẩu</label>
                                    <input type="text" id="admin_password" class="form-control" name="admin_password" >
                                </div>
                                <div class="form-group">
                                    <label>nhập lại mật khẩu</label>
                                    <input type="text"  class="form-control" name="password_confirmation" >
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select class="form-control m-bot15" name="role_id">
                                        @foreach ($roles as $item)
                                             <option value="{{$item->role_id}}">{{$item->role_title}}</option>
                                        @endforeach
                           
                            </select>
                                </div>
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection