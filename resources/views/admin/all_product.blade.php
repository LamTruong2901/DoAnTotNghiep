@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
  
    <?php
	$message = Session()->get('message');
	if($message){
		echo '<span class="tex-aler">'.$message.'</span>';
		Session()->put('message',null);
	}
	?>
    
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Giá bán</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Nội dung</th>
            <th>danh mục</th>
            <th>thương hiệu</th>
            <th>Hiển thị</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($all_product as $key => $pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$pro->product_name}}</td>
            <td>{{$pro->product_price}}</td>
            <td><img src="/uploads/product/{{$pro->product_image}}" width="50px" ></td>
            <td>{{$pro->product_desc}}</td>
            <td>{!!$pro->product_content!!}</td>
            <td>{{$pro->category_name}}</td>
            <td>{{$pro->brand_name}}</td>
            <td><span class="text-ellipsis">
            <?php
              if($pro->product_status==0){
                ?>
                <a href="/unactive-product/{{$pro->product_id}}" class="fa fa-thumbs-down"></a>
             <?php
              }else{
              ?>  
              <a href="/active-product/{{$pro->product_id}}" class="fa fa-thumbs-up"></a>
              <?php
              }
              ?>
            </span></td>
   
            <td>
              <a href="/edit-product/{{$pro->product_id}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
               <a href="/delete-product/{{$pro->product_id}}" onclick="return confirm('Bạn có muốn xóa không')" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
        
         
        </div>
@endsection