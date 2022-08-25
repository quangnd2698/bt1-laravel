     app.controller('ModalInstanceCtrl', function ($scope, $uibModalInstance, currentItem) {
  
    $scope.currentItem = currentItem;
    $scope.selected = {
      item: $scope.currentItem[0]
    };
  
    $scope.ok = function () {
      $uibModalInstance.close($scope.selected.item);
    };
  
    $scope.cancel = function () {
      $uibModalInstance.dismiss('cancel');
    };
  });