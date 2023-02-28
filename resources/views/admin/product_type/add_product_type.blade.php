	@extends('layout')
@section('admin_content')
  <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm mới vị trí
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
                                <form action="{{url('/product-type')}}" id="formValidation" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label>Tên vị trí</label>
                                    <input type="text" class="form-control" name="product_type_name" >
                                      <div class="form-group">
                                    <label>Ghi chú</label>
                                    <textarea  style="resize: none " rows="5" class="form-control" name="note"  > </textarea>
                                    </div>

                                </div>
                               
                                <button type="submit" class="btn btn-info">Thêm mới</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection