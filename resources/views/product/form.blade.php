{{ csrf_field() }}
@if(isset($product))
<input type="text" hidden name="id" value="{{$product->id}}"/>
@endif
<div class="form-group row @if ($errors->has('name')) {{'has-danger'}} @endif">
    <label class="col-sm-12 col-md-2 col-form-label"><h6>Tên</h6></label>
    <div class="col-sm-12 col-md-8">
        <input class="form-control @if ($errors->has('name')) {{'form-control-danger'}} @endif" 
            name="name" type="text"
            @if(isset($product))
                value="{{$product->name}}"
            @endif>
        @if ($errors->has('name'))
            <p style="color: red">{{ $errors->first('name') }}</p>
        @endif
    </div>
</div>
<div class="form-group row @if ($errors->has('code')) {{'has-danger'}} @endif">
    <label class="col-sm-12 col-md-2 col-form-label"><h6>Mã sản phẩm</h6></label>
    <div class="col-sm-12 col-md-8">
        <input class="form-control @if ($errors->has('code')) {{'form-control-danger'}} @endif"
        name="code"
        @if(isset($product))
            value="{{$product->code}}"
        @endif>
        @if ($errors->has('code'))
            <p style="color: red">{{ $errors->first('code') }}</p>
        @endif
    </div>
</div>

<div class="form-group row @if ($errors->has('type')) {{'has-danger'}} @endif">
    <label class="col-sm-12 col-md-2 col-form-label"><h6>Loại sản phẩm</h6></label>
    <div class="col-sm-12 col-md-8">
        <input class="form-control @if ($errors->has('type')) {{'form-control-danger'}} @endif"
        name="type" type="text"
            @if(isset($product))
                value="{{$product->type}}"
            @endif>
        @if ($errors->has('type'))
            <p style="color: red">{{ $errors->first('type') }}</p>
        @endif
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label"><h6>Trạng thái</h6></label>
    <div class="col-sm-12 col-md-8">
        <div class="custom-control custom-radio mb-5">
            <input type="radio" id="customRadio1" value="0" name="status" class="custom-control-input" checked>
            <label class="custom-control-label" for="customRadio1">Ngừng hoạt động</label>
        </div>
        <div class="custom-control custom-radio mb-5=">
            <input type="radio" id="customRadio2" value="1" name="status" class="custom-control-input" 
            @if (isset($product) && $product->status == '1') {{'checked'}} @endif>
            <label class="custom-control-label" for="customRadio2">Hoạt động</label>
        </div>
        @if ($errors->has('status'))
        <p style="color: red">{{ $errors->first('status') }}</p>
    @endif
    </div>
</div>
<div class="form-group row @if ($errors->has('brand')) {{'has-danger'}} @endif">
    <label class="col-sm-12 col-md-2 col-form-label"><h6>Hãng sản xuất</h6></label>
    <div class="col-sm-12 col-md-8">
        <input class="form-control @if ($errors->has('brand')) {{'form-control-danger'}} @endif"
            name="brand"
            @if(isset($product))
                value="{{$product->brand}}"
            @endif>
        @if ($errors->has('brand'))
            <p style="color: red">{{ $errors->first('brand') }}</p>
        @endif
    </div>
</div>
<div class="form-group row @if ($errors->has('price')) {{'has-danger'}} @endif">
    <label class="col-sm-12 col-md-2 col-form-label"><h6>Giá</h6></label>
    <div class="col-sm-12 col-md-8">
        <input class="form-control @if ($errors->has('price')) {{'form-control-danger'}} @endif"
            name="price" type="number"
            @if(isset($product))
                value="{{$product->price}}"
            @endif>
        @if ($errors->has('price'))
            <p style="color: red">{{ $errors->first('price') }}</p>
        @endif
    </div>
</div>
<div class="form-group row @if ($errors->has('price')) {{'has-danger'}} @endif">
    <label class="col-sm-12 col-md-2 col-form-label"><h6>Mô tả</h6></label>
    <div class="col-sm-12 col-md-8">
        <textarea name="description" class="form-control">@if(isset($product)){{$product->description}}@endif</textarea>
@if ($errors->has('description'))
        <p style="color: red">{{ $errors->first('description') }}</p>
    @endif
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label"><h6>Ảnh</h6></label>
    <div class="form-group col-md-9" id="form_gr">
        <div class="col-sm-12 col-md-8">
            <input type="file" class="custom-file-input" name="image" id="image"
            @if(isset($product))
                value="{{$product->image}}"
            @endif>
            <label class="custom-file-label"> Chọn ảnh </label>
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label"></label>
    <div class="col-sm-12 col-md-3" id="div_avatar">
        <img id="img_avartar" class="img-thumbnail" style="width: 200px" 
        @if(isset($product) && $product->image) {{$product->image}}
            src = "/images/product/{{$product->image}}"
        @else
            src = "/images/product/avatar.jpg"
        @endif >
    </div>
</div>
<br>
<div class="row justify-content-md-center col-sm-12">
    <input style class="col-sm-12 col-md-2 btn btn-primary" type="submit" value="Lưu" id="submit">
</div>