app.controller('productController', function($scope, productsService, $uibModal, $http){
    $scope.params = [];
    $scope.modaltitle = 'Thêm mới sản phẩm';
    $scope.status = [
        {value: '' , title: 'chọn trạng thái'},
        {value: 1 , title: 'Hoạt động'},
        {value: 0 , title: 'Không hoạt động'},
    ]
    getProducts();
    // $scope.products = productsService.getProducts($scope.params).result
    // // init();
    // // async function init() {
    // //     var data = await productsService.getProducts($scope.params);
    // //     $scope.products = data.result
    // //     console.log($scope.products)
    // // }
    $scope.findProduct = function () {
        getProducts()
    }

    function getProducts() {
        $http.get("http://127.0.0.1:8000/api/products",{
            params: $scope.params
        })
        .then(function(response) {
            $scope.products = response.data.result;
        });
    }
    
    $scope.open = function (size) {
        var modalInstance = $uibModal.open({
          animation: false,
          templateUrl: 'myModalContent.html',
          controller: 'ModalInstanceCtrl',
          backdrop: true,
          backdropClass: 'in',
          size: size,
          resolve: {
            currentItem: function () {
              return $scope.status;
            },
          }
        });
  
        modalInstance.result.then(function (selectedItem) {
          $scope.selected = selectedItem;
        }, function () {
        //   $log.info('Modal dismissed at: ' + new Date());
        });
    };
});
