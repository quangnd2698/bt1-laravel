app.service('productsService', function ($http) {

    this.getProducts = async function (params) {
        var data = []
        await $http.get("http://127.0.0.1:8000/api/products",{
            params: params
        })
        .then(function(response) {
            data = response.data;
        });
        return data
    };

    this.insertProduct = function (name, code, description, price) {

        return $http.post("app/server/db.php?action=insert",
            {
                'name': name,
                'code': code,
                'description': description,
                'price': price
            });
    };

    this.deleteProduct = function (id) {
        return $http.post("app/server/db.php?action=delete",{'id': id});
    };

});