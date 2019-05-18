@extends('admin.layout.master')
@section('title','Trang Quan Tri')
@section('content')
<div class="container-fluid">

        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create new a Product
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active">
                                  <a  class="nav-link active" id="pills-home-tab" data-toggle="tab" href="#vi" role="tab" aria-controls="pills-home" aria-selected="true">{{config('app.locales.vi')}}</a>
                                </li>
                                <li class="">
                                  <a href="#en"  class="nav-link" data-toggle="tab" aria-expanded="false">{{config('app.locales.en')}}</a>
                                </li>
                            </ul>
            
                            <!-- Tab panes -->
                            {!! Form::open(['url' => Route('product.update',$product->id), 'class' => 'tab-content form-horizontal', 'role' => 'form']) !!}
                            <div class="tab-pane fade show active" id="vi">
                              <p></p>
                              <div>
                                <div class="form-group {{ ($errors->has('nameproduct.vi')) ? 'has-error' : '' }}">
                                    <label for="title" class="col-sm-3 control-label">Tên sản phẩm(<span class="text-danger">*</span>)</label>
                                    <div class="col-sm-9">
                                    {!! Form::text('nameproduct[vi]',old('nameproduct.vi', $product->translation('vi')->name),['class'=>'form-control']) !!}
                                    {!! $errors->has('nameproduct.vi') ? '<p class="text-danger">'.$errors->first('nameproduct.vi').'</p>' : '' !!}
                                    </div>
                                </div>
            
                                <div class="form-group {{ ($errors->has('brand.vi')) ? 'has-error' : '' }}">
                                    <label for="brief" class="col-sm-3 control-label">Mô tả ngắn(<span class="text-danger">*</span>)</label>
                                    <div class="col-sm-9">
                                    {!! Form::textarea('brandproduct[vi]',old('brandproduct.vi', $product->translation('vi')->brand),['class'=>'form-control', 'rows'=>3]) !!}
                                    {!! ($errors->has('brandproduct.vi') ? '<p class="text-danger">'.$errors->first('brandproduct.vi').'</p>' : '') !!}
                                    </div>
                                </div>
            
                                <div class="form-group {{ ($errors->has('content.vi')) ? 'has-error' : '' }}">
                                    <label for="brief" class="col-sm-3 control-label">Mô tả chi tiết(<span class="text-danger">*</span>)</label>
                                    <div class="col-sm-9">
                                    {!! Form::textarea('descriptionproduct[vi]',old('descriptionproduct.vi', $product->translation('vi')->description),['class'=>'form-control', 'id'=>'description_vi']) !!}
                                    {!! ($errors->has('descriptionproduct.vi') ? '<p class="text-danger">'.$errors->first('descriptionproduct.vi').'</p>' : '') !!}
                                    </div>
                                </div>
            
                                </div>
                            </div>
                            <div class="tab-pane fade" id="en">
                              <p></p>
                                <div>
                                <div class="form-group {{ ($errors->has('nameproduct.en')) ? 'has-error' : '' }}">
                                    <label for="title" class="col-sm-3 control-label">Product name(<span class="text-danger">*</span>)</label>
                                    <div class="col-sm-9">
                                    {!! Form::text('nameproduct[en]',old('nameproduct.en', $product->translation('en')->name),['class'=>'form-control']) !!}
                                    {!! $errors->has('nameproduct.en') ? '<p class="text-danger">'.$errors->first('nameproduct.en').'</p>' : '' !!}
                                    </div>
                                </div>
                                <div class="form-group {{ ($errors->has('brandproduct.en')) ? 'has-error' : '' }}">
                                    <label for="brief" class="col-sm-3 control-label">Short description</label>
                                    <div class="col-sm-9">
                                    {!! Form::textarea('brandproduct[en]',old('brandproduct.en', $product->translation('en')->brand),['class'=>'form-control', 'rows'=>3]) !!}
                                    {!! ($errors->has('brandproduct.en') ? '<p class="text-danger">'.$errors->first('brandproduct.en').'</p>' : '') !!}
                                    </div>
                                </div>
            
                                <div class="form-group {{ ($errors->has('descriptionproduct.en')) ? 'has-error' : '' }}">
                                    <label for="brief" class="col-sm-3 control-label">Description</label>
                                    <div class="col-sm-9">
                                    {!! Form::textarea('descriptionproduct[en]',old('descriptionproduct.en', $product->translation('en')->description),['class'=>'form-control', 'id'=>'description_en']) !!}
                                    {!! ($errors->has('descriptionproduct.en') ? '<p class="text-danger">'.$errors->first('descriptionproduct.en').'</p>' : '') !!}
                                    </div>
                                </div>
                               </div>
                            </div>
                            <div class="form-group {{ ($errors->has('photo')) ? 'has-error' : '' }}">
                                <label for="photo" class="col-sm-3 control-label">Photo</label>
                                <div class="col-sm-7">
                                {!! Form::hidden('img', old('photo',$product->img), ['id'=>'photo']) !!}
                                <a href="javascript:openCustomRoxy()"><img src="{{old('photo', '/img/no-photo.png')}}" id="customRoxyImage" style="max-width:200px;"></a>
                                <div id="roxyCustomPanel" style="display: none;">
                                  <iframe src="/asset/fileman/index.html?integration=custom" style="width:100%;height:100%" frameborder="0"></iframe>
                                </div>
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('category_id')) ? 'has-error' : '' }}">
                                <label for="category_id" class="col-sm-3 control-label">Category</label>
                                <div class="col-sm-9">
                                {!! Form::select('category_id',$tree,null,['class'=>'form-control']) !!}
                                {!! ($errors->has('category_id') ? '<p class="text-danger">'.$errors->first('category_id').'</p>' : '') !!}
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('price')) ? 'has-error' : '' }}">
                                <label for="source" class="col-sm-3 control-label">Price</label>
                                <div class="col-sm-9">
                                {!! Form::number('price',old('price', $product->price),['class'=>'form-control']) !!}
                                {!! ($errors->has('price') ? '<p class="text-danger">'.$errors->first('price').'</p>' : '') !!}
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('count')) ? 'has-error' : '' }}">
                                <label for="source" class="col-sm-3 control-label">Quantity</label>
                                <div class="col-sm-9">
                                {!! Form::number('count',old('count', $product->count),['class'=>'form-control']) !!}
                                {!! ($errors->has('count') ? '<p class="text-danger">'.$errors->first('count').'</p>' : '') !!}
                                </div>
                            </div>
                            <div class="form-group {{ ($errors->has('source')) ? 'has-error' : '' }}">
                                <label for="source" class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-7">
                                  <label class="checkbox-inline">{!! Form::checkbox('status', 1, true) !!} Publish</label>
                                </div>
                            </div>
                            <div class="col-sm-7 col-sm-offset-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Thêm sản phẩm</button>
                                <a href="{{ Route('product.list') }}" class="btn btn-danger" role="button">Cancel</a>
                            </div>
                        {!! Form::close() !!}
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
              </div>

</div>
@php var_dump($tree); @endphp
        
@stop

@section('script')

@stop