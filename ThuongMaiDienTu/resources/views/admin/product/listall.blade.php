@extends('admin.layout.master')
@section('title','Sản phẩm')
@section('content')
<div class="container-fluid">
    @include('admin.product.tablist')
    @include('admin.partial.message')
    <div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tất cả hàng</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Product name</th>
                      <th>Product Photo</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Created at</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Product name</th>
                        <th>Product Photo</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Created at</th>
                        <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @php
                     $i=0;   
                    @endphp
                    @forelse ($products as $pr)
                    <tr>
                        <td class="text-center">{{$i++}}</td>
                        <td class="text-center">{{$pr->name}}</td>
                        <td class="text-center"><img src="{{$pr->img}}" /></td>
                        <td class="text-center">{{$pr->price}}</td>
                        <td class="text-center">{{$pr->count}}</td>
                        <td class="text-center">{{$pr->created_at}}</td>
                        <td class="text-center">
                            <!-- <a href="#"
                            class="btn btn-success" title="Chi tiết">
                            <i class="fa fa-list-alt"></i></a> -->
                            <a href="{{ route('product.edit', $pr->id) }}"
                            class="btn btn-warning" title="Sửa">
                            <i class="fa fa-pencil-square-o"></i></a>
                            <button class="btn btn-danger deleteproduct" data-toggle="modal" data-target="#deleteproduct
                            data_id="{{ $pr->id }}" title="Xóa">
                            <i class="fa fa-trash-o"></i></button>
                        </td>
                      </tr>
                    @empty
                        <h1>Không có sản phẩm nào</h1>
                    @endforelse
                    
                  </tbody>
                </table>
                <div class="col-md-12">{{ $products->links() }}</div>
              </div>
            </div>
          </div>
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Hàng còn</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th>STT</th>
                          <th>Product name</th>
                          <th>Product Photo</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Created at</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Product name</th>
                            <th>Product Photo</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Created at</th>
                            <th></th>
                        </tr>
                      </tfoot>
                  <tbody>
                    
                      @php
                      $j=0;   
                     @endphp
                     @forelse ($products as $pr)
                     @if ($pr->count >0)
                     <tr>
                        <td class="text-center">{{$j++}}</td>
                        <td class="text-center">{{$pr->name}}</td>
                        <td class="text-center"><img src="{{$pr->img}}" /></td>
                        <td class="text-center">{{$pr->price}}</td>
                        <td class="text-center">{{$pr->count}}</td>
                        <td class="text-center">{{$pr->created_at}}</td>
                        <td class="text-center">
                            <!-- <a href="#"
                            class="btn btn-success" title="Chi tiết">
                            <i class="fa fa-list-alt"></i></a> -->
                            <a href="{{ route('product.edit', $pr->id) }}"
                            class="btn btn-warning" title="Sửa">
                            <i class="fa fa-pencil-square-o"></i></a>
                            <button class="btn btn-danger delete"
                            data_id="{{ $pr->id }}" title="Xóa">
                            <i class="fa fa-trash-o"></i></button>
                        </td>
                      </tr>
                     @endif
                     
                     @empty
                         <h1>Không có sản phẩm nào</h1>
                     @endforelse
                  </tbody>
                </table>

              </div>
            </div>
          </div>
            </div>

            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Hàng hết</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th>STT</th>
                          <th>Product name</th>
                          <th>Product Photo</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Created at</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Product name</th>
                            <th>Product Photo</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Created at</th>
                            <th></th>
                        </tr>
                      </tfoot>
                  <tbody>
                   
                      @php
                      $s=0;   
                     @endphp
                     @forelse ($products as $pr)
                     @if ($pr->count<=0)
                     <tr>
                        <td class="text-center">{{$s++}}</td>
                        <td class="text-center">{{$pr->name}}</td>
                        <td class="text-center"><img src="{{$pr->img}}" /></td>
                        <td class="text-center">{{$pr->price}}</td>
                        <td class="text-center">{{$pr->count}}</td>
                        <td class="text-center">{{$pr->created_at}}</td>
                        <td class="text-center">
                            <!-- <a href="#"
                            class="btn btn-success" title="Chi tiết">
                            <i class="fa fa-list-alt"></i></a> -->
                            <a href="{{ route('product.edit', $pr->id) }}"
                            class="btn btn-warning" title="Sửa">
                            <i class="fa fa-pencil-square-o"></i></a>
                            <button class="btn btn-danger delete"
                            data_id="{{ $pr->id }}" title="Xóa">
                            <i class="fa fa-trash-o"></i></button>
                        </td>
                      </tr>
                     @endif
                     
                     @empty
                         <h1>Không có sản phẩm nào</h1>
                     @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
            </div>
        </div>    
    </div>

</div>
        
@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    td img{
      width: 50px;
      height: 50px;
    }
  
  </style>
@stop
@section('modal')
<div id="deleteModal" class="modal fade" role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content">
        {!! Form::open(['method' => 'DELETE', 'route'=>['product.delete'], 'id'=>'frm_delete']) !!}
            <div class="modal-header">
                <h4 class="modal-title">Xóa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa sản phẩm này không!</p>
            </div>
            <div class="modal-footer">
                {!! Form::hidden('id', 0, array('id' => 'delete_id')) !!}
                <button type="submit" class="btn btn-primary">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        {!! Form::close() !!}
        </div>
      </div>
</div>
@stop

@section('script')
<script type="text/javascript">

$('.deleteproduct').on('click', function(){
  $('#delete_id').val($(this).attr('data_id'));
  $('#deleteModal').modal();
});

</script>
@stop