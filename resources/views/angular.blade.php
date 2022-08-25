<!doctype html>
<html ng-app>
  <head>
    <script src="js/angular-1.8.2/angular.min.js"></script>
  </head>
  <body>
    <div>
      <label>Name:</label>
      <input type="text" ng-model="yourName" placeholder="Enter a name here">
      <hr>
      <h1> @{{yourName}}!</h1>
    </div>
  </body>
</html>