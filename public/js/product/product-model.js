var app = angular.module('productIndex', ['ui.bootstrap']);
app.filter('vnFormat', function() {
    return function(x) {
      	let ms = Date.parse(x);
        return ms;
    };
});
app.filter('dayVnFormat', function() {
    return function(x) {
        var weekday = {Sun: 'CN', Mon: 'T2', Tue: 'T3', Wed: 'T4', Thu: 'T5', Fri: 'T6', Sat: 'T7'};
        let day = x.slice(0, 3);
        return x.replace(day, weekday[day]);
    };
});

