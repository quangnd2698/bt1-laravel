@extends('layouts.app')
@section('content')
    <div ng-app="productIndex">
        <div ng-controller="productController">
            <div class="header mb-2">
                <div class="right mb-1">
                    <a href="">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal"
                            ng-click="showCreateForm()">
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
                            <option value="">Chọn trạng thái</option>
                        </select>
                    </div>
                    <div class="col-9">
                        <input class="form-control name-search d-inline" type="text" name="name"
                            ng-model="params.name">
                        <button class="btn btn-primary d-inline" ng-click="findProduct()">search</button>
                    </div>
                </div>
            </div>
            <table class="checkbox-datatable table table-hover nowrap" style="width: 100%; background-color: #CCFFFF">
                <thead style="background-color: #FFCC33">
                    <tr>
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
                        <td>@{{ product.code }}</td>
                        <td>@{{ product.name }}</td>
                        <td>@{{ product.price }}</td>
                        <td>@{{ product.created_at | vnFormat | date : 'EEE - d/M/yyyy HH:mm' : "+0700" | dayVnFormat }}</td>
                        <td ng-style="getByField(product.status).style">@{{ getByField(product.status).title }}</td>
                        <td>
                            <div class="d-inline mr-2"> <a class="edit-product" href="" data-toggle="modal"
                                    data-target="#exampleModal" ng-click="showEditForm(product)">
                                    edit</a>
                            </div>
                            <div class="d-inline mr-2"> <a class="delete-product" href=""
                                    ng-click="destroyItem(product)">
                                    <i class="fas fa-solid fa-trash pointer"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="d-inline" style="width: auto">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item" ng-click="changePage(pageCurrent - 1)" ng-if="pageCurrent > 1"><a
                                    class="page-link" href="#">Previous</a></li>
                            <li ng-repeat="page in getListPage(pageCount)" class="page-item @{{ (pageCurrent == page) && 'active' || '' }}"
                                ng-click="changePage(page)"><a class="page-link" href="#">@{{ page }}</a>
                            </li>
                            <li class="page-item" ng-click="changePage(pageCurrent + 1)" ng-if="hasNext"><a
                                    class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="d-inline" style="width: auto">
                    <select id="search-by-status" class="form-select d-inline" aria-label="Default select example"
                        ng-model="params.page_size" ng-options="page.value as page.title for page in pageSizes"
                        ng-change="changePageSize()">

                    </select>
                </div>
                <div class="d-inline" style="width: 150px"> Tổng số: @{{ totalCount }}</div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" ng-bind="currentItem.id ? 'Edit' : 'Create'"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body m-3">
                            <form name="myForm" novalidate>
                                @include('angular.form')

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary d-inline"
                                ng-disabled="myForm.name.$invalid || myForm.code.$invalid || myForm.price.$invalid || myForm.brand.$invalid || myForm.type.$invalid"
                                ng-click="saveProduct()">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('script')
    <script src="js/product/product-model.js"></script>
    <script src="js/bootstrap-custom/ui-bootstrap-custom-1.3.1.js"></script>
    <script src="js/bootstrap-custom/ui-bootstrap-custom-tpls-1.3.1.js"></script>
    <script src="js/product/product-controller.js"></script>
    <script src="js/product/product-service.js"></script>
    <script src="js/product/product-modal.js"></script>
@endsection
@section('style')
    <link rel="stylesheet" href="js/bootstrap-custom/ui-bootstrap-custom-1.3.1-csp.css">
    <style>
        .product-image {
            width: 40px;
            height: 40px;
            margin-left: 25%
        }

        .product-status-0,
        .product-status- {
            color: #d33622
        }

        .product-status-1,
        .product-status-true {
            color: #11e26f
        }

        .name-search {
            width: 90%;
        }

        .modal-backdrop.in {
            opacity: 0.5;
        }

        .ng-invalid-required.ng-empty.ng-touched {
            border-color: #dc3545
        }

        .delete-product {
            color: #d33622
        }
    </style>
@endsection
