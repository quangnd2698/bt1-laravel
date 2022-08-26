app.controller('productController', function ($scope, productsService, $uibModal, $http) {
    $scope.params = [];
    $scope.modaltitle = 'Thêm mới sản phẩm';
    $scope.currentItem = [];
    $scope.errors = [];
    $scope.pageCount = 0;
    $scope.pageCurrent = 0;
    $scope.params.page_size = '5';
    $scope.hasNext = false;
    $scope.totalCount = 0;
    $scope.pageSizes = [
        { value: '5', title: '5' },
        { value: '10', title: '10' },
        { value: '20', title: '20' },
        { value: '50', title: '50' },
    ];
    $scope.status = [
        { value: 1, title: 'Hoạt động', style: { color: 'green'} },
        { value: 0, title: 'Không hoạt động', style: { color: 'red'} },
    ];

    $scope.getByField = function (value) {
        for (var i in $scope.status) {
            if ($scope.status[i].value == value) {
                return $scope.status[i];
            }
        }
    }

    getProducts();
    // $scope.products = productsService.getProducts($scope.params).result
    // // init();
    // // async function init() {
    // //     var data = await productsService.getProducts($scope.params);
    // //     $scope.products = data.result
    // //     console.log($scope.products)
    // // }
    $scope.findProduct = function () {
        $scope.params.page_id = null
        getProducts()
    }

    function getProducts() {
        $http.get("http://127.0.0.1:8000/api/products", {
            params: $scope.params
        })
        .then(function (response) {
            if (response.data) {
                $scope.products = response.data.result;

                if (response.data.meta) {
                    $scope.pageCount = response.data.meta.page_count
                    $scope.pageCurrent = response.data.meta.page_id
                    $scope.params.page_size = response.data.meta.page_size
                    $scope.totalCount = response.data.meta.total_count
                    $scope.hasNext = response.data.meta.has_next
                } 
            }
        });
    }

    function getFromData() {
        return {
            name: $scope.currentItem.name,
            code: $scope.currentItem.code,
            type: $scope.currentItem.type,
            brand: $scope.currentItem.brand,
            price: $scope.currentItem.price,
            description: $scope.currentItem.description,
            status: $scope.currentItem.status,
            id: $scope.currentItem.id
        };
    }

    $scope.saveProduct = function () {
        var data = getFromData();
        if ($scope.currentItem.id) {
            $http.put("http://127.0.0.1:8000/api/products/" + $scope.currentItem.id, data)
            .then(function (response) {
                if (response.data.result && response.data.result.id) {
                    var index = findIndexById(response.data.result.id);
                    if (index >= 0) {
                        $scope.products[index] = response.data.result
                    }
                    $("#exampleModal .close").click();
                }
            }, function errorCallback(response) {
                if (response.data) {
                    $scope.errors = response.data
                }
            });
        } else {
            $http.post("http://127.0.0.1:8000/api/products", data)
            .then(function (response) {
                $scope.products.unshift(response.data.result);
                $("#exampleModal .close").click();
            }, function errorCallback(response) {
                if (response.data) {
                    $scope.errors = response.data
                }
            });
        }
    }

    $scope.showCreateForm = function () {
        $scope.currentItem = []
    }

    $scope.showEditForm = function (item) {
        $scope.currentItem = angular.copy(item);
        if (item.status) {
            $scope.currentItem.status = true
        }
    }


    $scope.destroyItem = function (item) {

        $http.delete("http://127.0.0.1:8000/api/products/" + item.id)
        .then(function (response) {
            var key = findIndexById(item.id)
            if (key >= 0) {
                $scope.products.splice(key, 1);
            }
        });
    }

    function findIndexById(itemId) {
        return $scope.products.findIndex(({ id }) => id === itemId);
    }
    
    $scope.getListPage = function (max) {
        var pages = [];
        for (var i = 1; i <= max; i++) {
            pages.push(i);
        }
        return pages;
    }

    $scope.changePage = function (pageId) {
        $scope.params.page_id = pageId;
        getProducts();
    }

    $scope.changePageSize = function () {
        $scope.params.page_id = null
        getProducts();
    }

});
