@extends('layouts.app')
@section('content')
    <div ng-app="productIndex">
        <div ng-controller="productController">
            <div class="header mb-2">
                <div class="right mb-1">
                    <a href="">
                        <button class="btn btn-success" style="right: 0px;" ng-click="open()">
                            <i class="fas fa-solid fa-plus"></i>
                            add
                        </button>
                    </a>
                </div>
                <div class="row">

                    <div class="col-3">
                        <select id="search-by-status" class="form-select d-inline" aria-label="Default select example"
                            ng-model="params.status" ng-options="x.value as x.title for x in status"
                            ng-change="findProduct()" name="status">

                        </select>
                    </div>
                    <div class="col-9">
                        <input class="form-control d-inline" type="text" name="name" ng-model="params.name">
                        <button class="btn btn-primary d-inline" ng-click="findProduct()">search</button>
                    </div>
                </div>
            </div>
            <button id="btn1" ng-click="openModal()" class="btn-primary">Open Modal</button>
            <table class="checkbox-datatable table table-hover nowrap" style="width: 100%; background-color: #CCFFFF">
                <thead style="background-color: #FFCC33">
                    <tr>
                        <th>Ảnh</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Thời gian tạo</th>
                        <th>Trạng thái</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    <tr ng-repeat="product in products">
                        <td>
                            <img class="product-image" ng-src="/images/product/@{{ product.image && product.image || 'default.png' }}" alt="">
                        </td>
                        <td>@{{ product.code }}</td>
                        <td>@{{ product.name }}</td>
                        <td>@{{ product.price }}</td>
                        <td>@{{ product.created_at }}</td>
                        <td class="product-status-@{{ product.status }}">@{{ product.status == 1 && 'Hoạt động' || 'Không hoạt động' }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <script type="text/ng-template" id="myModalContent.html">
            <div class="modal-header">
                <h3 class="modal-title">@{{ empty(currentItem) && 'Thêm mới sản phẩm' || 'Chỉnh sửa sản phẩm' }}</h3>
            </div>
            <div class="modal-body">
                <form ng-app="productIndex" ng-controller="validateController" name="myForm" novalidate>
                    @include('angular.form')
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" ng-click="ok()">OK</button>
                <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
            </div>
        </script>
    </div>
@endsection
@section('script')
    <script src="js/product/product-model.js"></script>
    <script src="js/bootstrap-custom/ui-bootstrap-custom-1.3.1.js"></script>
    <script src="js/bootstrap-custom/ui-bootstrap-custom-tpls-1.3.1.js"></script>
    <script src="js/product/product-controller.js"></script>
    <script src="js/product/product-service.js"></script>
    <script src="js/product/product-modal.js"></script>
    <script src="js/product/validate-controller.js"></script>
@endsection
@section('style')
    <link rel="stylesheet" href="js/bootstrap-custom/ui-bootstrap-custom-1.3.1-csp.css">
    <style>
        .product-image {
            width: 40px;
            height: 40px;
            margin-left: 25%
        }

        .product-status-0 {
            color: #d33622
        }

        .product-status-1 {
            color: #11e26f
        }

        .form-control {
            width: 90%;
        }

        .modal-backdrop.in {
            opacity: 0.5;
        }
    </style>
@endsection
