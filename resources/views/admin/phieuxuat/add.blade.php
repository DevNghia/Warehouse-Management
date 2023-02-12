	@extends('layout')
@section('admin_content')
  <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm mới phiếu xuất
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
                                <form action="{{url('/phieuxuat')}}" id="formValidation" method="post" enctype="multipart/form-data">
                                    @csrf
                                     <div class="form-group">
                                         <label>Mã phiếu xuất</label>
                                    <input type="text" class="form-control" name="mapx" >
                                    <label>Nội dung phiếu xuất</label>
                                     <textarea id="hidden_snippet" style="resize: none " rows="5" class="form-control" name="content" placeholder="Nội dung sản phẩm"> </textarea>
                                     <label>Ghi chú</label>
                                    <textarea id="hidden_snippet" style="resize: none " rows="5" class="form-control" name="note" placeholder="Nội dung sản phẩm"> </textarea>
                                </div>
                                          <table class="table table-striped b-t b-light" id="tableEstimate">
                                            <thead>
                                                <tr>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Nhà cung cấp</th>
                                                    <th>Số lượng</th>
                                                 
                                                </tr>
                                                </thead>
                                                    <tbody>
                                                        <tr>
                                                        <td>
                                                            
                                                            <div class="col-sm-5 m-b-xs">
                                                                <select name="product[]" class="input-sm form-control w-sm inline v-middle">
                                                               @foreach ($product as $item)
                                                                        <option  value="{{$item->product_id}}">{{$item->product_name}}</option>
                                                                    @endforeach
                                                                
                                                                </select>              
                                                            </div>
                                                        </td>
                                                         <td>
                                                            <div class="col-sm-5 m-b-xs">
                                                                <select name="supplier[]" class="input-sm form-control w-sm inline v-middle">
                                                                        @foreach ($supplier as $item)
                                                                        <option value="{{$item->supplier_id}}" >{{$item->supplier_name}}</option>
                                                                    @endforeach
                                                              
                                                            
                                                                </select>              
                                                            </div>
                                                        </td>
                                                         <td><input type="number"  class="input-sm form-control" min="1" name="soluong[]" ></td>
                                                         
                                                        </tr>              
                                                    </tbody>
                                                    
                                             </table>
                                             <button type="button" class="btn btn-success" id="add">Thêm sản phẩm</button>
                                <button type="submit" class="btn btn-info">Lưu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
         <script>
	// function addmore(){
	// 	$('#add').append('   <tbody> <tr> <td> <div class="col-sm-5 m-b-xs"><select name="product" class="input-sm form-control w-sm inline v-middle"> @foreach ($product as $item) <option value="{{$item->product_id}}">{{$item->product_name}}</option>  @endforeach  </select>  </div>    </td> <td>  <div class="col-sm-5 m-b-xs"><select name="supplier" class="input-sm form-control w-sm inline v-middle">  @foreach ($supplier as $item) <option value="{{$item->supplier_id}}" >{{$item->supplier_name}}</option> @endforeach </select>  </div>  </td>  <td><input type="text"  class="input-sm form-control" name="soluong" ></td>  <td><input type="text" class="input-sm form-control" name="tongtien" ></td> </tr>      </tbody>')
                                                                                                             
	// }
     var rowIdx = 1;
      $("#add").on("click", function ()
            {
                // Adding a row inside the tbody.
                $("#tableEstimate tbody").append(`
                <tr id="R${++rowIdx}">
                     <td>
                                                            <div class="col-sm-5 m-b-xs">
                                                                <select name="product[]" class="input-sm form-control w-sm inline v-middle">
                                                               @foreach ($product as $item)
                                                                        <option  value="{{$item->product_id}}">{{$item->product_name}}</option>
                                                                    @endforeach
                                                                
                                                                </select>              
                                                            </div>
                                                        </td>
                                                         <td>
                                                            <div class="col-sm-5 m-b-xs">
                                                                <select name="supplier[]" class="input-sm form-control w-sm inline v-middle">
                                                                        @foreach ($supplier as $item)
                                                                        <option value="{{$item->supplier_id}}" >{{$item->supplier_name}}</option>
                                                                    @endforeach
                                                              
                                                            
                                                                </select>              
                                                            </div>
                                                        </td>
                                                         <td><input type="number"   class="input-sm form-control" min="1" name="soluong[]" ></td>
                                                        
                                                            <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="fa fa-trash-o"></i></a></td>
                </tr>`);
            });
$("#tableEstimate tbody").on("click", ".remove", function ()
            {
                // Getting all the rows next to the row
                // containing the clicked button
                var child = $(this).closest("tr").nextAll();
                // Iterating across all the rows
                // obtained to change the index
                child.each(function () {
                // Getting <tr> id.
                var id = $(this).attr("id");

                // Getting the <p> inside the .row-index class.
                var idx = $(this).children(".row-index").children("p");

                // Gets the row number from <tr> id.
                var dig = parseInt(id.substring(1));

                // Modifying row index.
                idx.html(`${dig - 1}`);

                // Modifying row id.
                $(this).attr("id", `R${dig - 1}`);
            });
    
                // Removing the current row.
                $(this).closest("tr").remove();
    
                // Decreasing total number of rows by 1.
                rowIdx--;
            });

</script>
@endsection