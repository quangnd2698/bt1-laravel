
    <div class="form-group">
        <label for="name">Tên sản phẩm: </label>
        <input id="name"
            class="form-control"
            ng-model="currentItem.name"
            name="name"
            required
        >
        <span style="color:red" 
            ng-show="myForm.name.$dirty && myForm.name.$invalid">
            <span ng-show="myForm.name.$error.required">Tên sản phẩm không được để trống.</span>
        </span>
    </div>
    <div class="form-group">
        <label for="code">Mã sản phẩm: </label>
        <input id="code"
            class="form-control"
            ng-model="currentItem.code"
            name="code"
            required
        >
        <span style="color:red" 
            ng-show="myForm.code.$dirty && myForm.code.$invalid">
            <span ng-show="myForm.code.$error.required">Mã sản phẩm không được để trống.</span>
        </span>
    </div>
    <div class="form-group">
        <label for="brand">Hãng: </label>
        <input id="brand"
            class="form-control"
            name="brand"
            ng-model="currentItem.brand"
            required
        >
        <span style="color:red" 
            ng-show="myForm.brand.$dirty && myForm.brand.$invalid">
            <span ng-show="myForm.brand.$error.required">Hãng sản phẩm không được để trống.</span>
        </span>
    </div>
    <div class="form-group">
        <label for="type">Loại: </label>
        <input id="type"
            class="form-control"
            ng-model="currentItem.type"
            name="type"
            required
        >
        <span style="color:red" 
            ng-show="myForm.type.$dirty && myForm.type.$invalid">
            <span ng-show="myForm.type.$error.required">Loại sản phẩm không được để trống.</span>
        </span>
    </div>
    <div class="form-group">
        <label for="price">Giá: </label>
        <input id="price"
            class="form-control"
            ng-model="currentItem.price"
            name="price"
            required
        >
        <span style="color:red" 
            ng-show="myForm.price.$dirty && myForm.price.$invalid">
            <span ng-show="myForm.price.$error.required">Giá sản phẩm không được để trống.</span>
        </span>
    </div>
    <div class="form-group">
        <label for="description">Mô tả: </label>
        <input id="description"
            class="form-control"
            ng-model="description"
            name="currentItem.description"
        >
        <span style="color:red" 
            ng-show="myForm.description.$dirty && myForm.description.$invalid">
        </span>
    </div>