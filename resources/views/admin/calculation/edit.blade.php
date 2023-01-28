	@extends('layout')
@section('admin_content')
  <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật đơn vị tính
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form action="{{url('/update-calculation')}}/{{$calculation->calculation_id}}" id="formValidation" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label>Tên đơn vị</label>
                                    <input type="text" class="form-control" value="{{$calculation->calculation_name}}" name="calculation_name" >
                                </div>
                               
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection