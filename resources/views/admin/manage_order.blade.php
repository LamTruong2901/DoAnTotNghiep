@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <form action="">
          @csrf
        <select name="sort_order" id="sort" >
          <option  value="{{Request::url()}}?sort_by=none">-----Lọc đơn hàng-----</option>
          <option  value="{{Request::url()}}?sort_by=0">Đã xử xý</option>
          <option  value="{{Request::url()}}?sort_by=1">Chưa xử lý</option>
          <option  value="{{Request::url()}}?sort_by=2">Đang giao</option>
          <option  value="{{Request::url()}}?sort_by=3">Đã nhận</option>
        </select>
           </form>       
      </div>
      <div class="col-sm-4">
      </div>
   
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
            
            <th>STT </th>
            <th>Mã đơn hàng</th>
             <th>Ngày đặt</th>
            <th>Tình trạng đơn hàng</th>        
            <th style="width:30px;"></th>
          </tr>
        </thead>
        @php
            $i=1;
        @endphp
        <tbody>
          @foreach ( $order as $key => $ord)
          <tr>
            <td>{{$i++}}</td>
         <td>{{$ord->order_code}}</td>
         <td>{{$ord->created_at}}</td>
         {{-- @if ($ord->order_status==1)
             <td>Đơn hàng mới</td>
         @else
              <td>Đã xử lý</td>
         @endif --}}
         
         <td>
           <?php
              if($ord->order_status==0){
                ?>
                <p>Đã xử lý</p>
             <?php
              }else if($ord->order_status==1){
              ?>  
              <p>Chưa xử lý</p>
              <?php
              }elseif ($ord->order_status==2) {
              ?>
              <p>Đang giao</p>
              <?php
              }else{
              ?>
              <p>Đã nhận</p>
              <?php
              }
              ?>
         </td>
        
            <td>
              <a href="/view-order/{{$ord->order_code}}" class="active" ui-toggle-class=""><i class="fa fa-eye text-success text-active"></i></a>
               <a href="/delete-order/{{$ord->order_id}}" onclick="return confirm('Bạn chắc có muốn xóa đơn hàng không')" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
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