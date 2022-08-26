
    <div class="form-group">
        <label for="name">Tên sản phẩm: </label>
        <input id="name"
            class="form-control @{{(errors.name || myForm.name.$invalid) && 'is-invalid' || ''}}"
            ng-model="currentItem.name"
            name="name"
            required
        >
        <span style="color:red" 
            ng-show="myForm.name.$invalid">
            <span ng-show="myForm.name.$error.required">Tên sản phẩm không được để trống.</span>
        </span>
        <span style="color:red" 
            ng-if="errors.name">
            <span ng-show="errors.name">@{{errors.name[0]}}</span>
        </span>
    </div>
    <div class="form-group">
        <label for="code">Mã sản phẩm: </label>
        <input id="code"
            class="form-control  @{{(errors.code || myForm.code.$invalid) && 'is-invalid' || ''}}"
            ng-model="currentItem.code"
            name="code"
            required
        >
        <span style="color:red" 
            ng-show="myForm.code.$invalid">
            <span ng-show="myForm.code.$error.required">Mã sản phẩm không được để trống.</span>
        </span>
        <span style="color:red" 
        ng-if="errors.name">
        <span ng-show="errors.name">@{{errors.name[0]}}</span>
    </span>
    </div>
    <div class="form-group">
        <label for="brand">Hãng: </label>
        <input id="brand"
            class="form-control @{{myForm.brand.$invalid && 'is-invalid' || ''}}"
            name="brand"
            ng-model="currentItem.brand"
            required
        >
        <span style="color:red" 
            ng-show="myForm.brand.$invalid">
            <span ng-show="myForm.brand.$error.required">Hãng sản phẩm không được để trống.</span>
        </span>
    </div>
    <div class="form-group">
        <label for="type">Loại: </label>
        <input id="type"
            class="form-control @{{myForm.type.$invalid && 'is-invalid' || ''}}"
            ng-model="currentItem.type"
            name="type"
            required
        >
        <span style="color:red" 
            ng-show="myForm.type.$invalid">
            <span ng-show="myForm.type.$error.required">Loại sản phẩm không được để trống.</span>
        </span>
    </div>
    <div class="form-group">
        <label for="price">Giá: </label>
        <input id="price"
            class="form-control @{{myForm.price.$invalid && 'is-invalid' || ''}}"
            ng-model="currentItem.price"
            name="price"
            type="number"
            required
        >
        <span style="color:red" 
            ng-show="myForm.price.$invalid">
            <span ng-show="myForm.price.$error.required">Giá sản phẩm không được để trống.</span>
        </span>
    </div>
    <div class="form-group">
    <div class="form-group form-switch">
        <input class="form-check-input"  name="status" ng-model="currentItem.status" type="checkbox" id="flexSwitchCheckDefault">
        <label class="form-check-label" for="flexSwitchCheckDefault">Hoạt động</label>
      </div>
    </div>
    <div class="form-group">
        <label for="description">Mô tả: </label>
        <input id="description"
            class="form-control"
            ng-model="currentItem.description"
            name="description"
        >
        <span style="color:red" 
            ng-show="myForm.description.$dirty && myForm.description.$invalid">
        </span>
    </div>
    <input type="text" hidden ng-model="currentItem.id">