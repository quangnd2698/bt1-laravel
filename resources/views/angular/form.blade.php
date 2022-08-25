
    <div class="form-group">
        <label for="name">Tên sản phẩm: </label>
        <input id="name"
            class="form-control"
            ng-model="name"
            required
        >
        <span style="color:red" 
            ng-show="myForm.name.$dirty && myForm.name.$invalid">
            <span ng-show="myForm.name.$error.required">Username is required.</span>
        </span>
    </div>
    <div class="form-group">
        <label for="code">Mã sản phẩm: </label>
        <input id="code"
            class="form-control"
            ng-model="code"
            required
        >
        <span style="color:red" 
            ng-show="myForm.code.$dirty && myForm.code.$invalid">
            <span ng-show="myForm.code.$error.required">Username is required.</span>
        </span>
    </div>
    <div class="form-group">
        <label for="brand">Hãng: </label>
        <input id="brand"
            class="form-control"
            ng-model="brand"
            required
        >
        <span style="color:red" 
            ng-show="myForm.brand.$dirty && myForm.brand.$invalid">
            <span ng-show="myForm.brand.$error.required">Username is required.</span>
        </span>
    </div>
    <div class="form-group">
        <label for="brand">Loại: </label>
        <input id="type"
            class="form-control"
            ng-model="type"
            required
        >
        <span style="color:red" 
            ng-show="myForm.type.$dirty && myForm.type.$invalid">
            <span ng-show="myForm.type.$error.required">Username is required.</span>
        </span>
    </div>
    <div class="form-group">
        <label for="price">Giá: </label>
        <input id="price"
            class="form-control"
            ng-model="price"
            required
        >
        <span style="color:red" 
            ng-show="myForm.price.$dirty && myForm.price.$invalid">
            <span ng-show="myForm.price.$error.required">Username is required.</span>
        </span>
    </div>
    <div class="form-group">
        <label for="brand">Mô tả: </label>
        <input id="description"
            class="form-control"
            ng-model="description"
            required
        >
        <span style="color:red" 
            ng-show="myForm.description.$dirty && myForm.description.$invalid">
            <span ng-show="myForm.description.$error.required">Username is required.</span>
        </span>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>