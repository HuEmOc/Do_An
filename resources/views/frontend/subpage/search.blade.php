@extends('frontend.master')
@section('content')
    <html>
    <head>
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

    </head>
    <body  ng-app="phoneApp" ng-controller="searchController">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                Search By:
                <select class="form-control" ng-model='SearchTerm'>
                    <option value='$'>Any</option>
                    <option value='name'>Name</option>
                    <option value='alias'>Alias</option>
                    <option value='price'>Price</option>
                </select>
            </div>
            <div class="col-md-8">
                Search Key:
                <input type="text" class="form-control" ng-model="searchKeyword[SearchTerm]">
            </div>
        </div>
        <br />

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="">
                <h2 class="block-title">New phone</h2>
                <div class="block-content">
                    <div class="owl-product owl-carousel" style="display: inline">
                        <div ng-repeat="phone in phoneList | filter: searchKeyword">
                            <!-- sản phẩm -->
                            <div class="owl-item" style="width: 210px;" data-id="@{{ phone.id }}">
                                <div class="item">
                                    <div class="product-item">
                                        <div class="product-item-image">
                                            <a href="">
                                                <img class="img-responsive" src="{{asset('/upload/')}}/@{{phone.image }}">
                                            </a>
                                        </div>
                                        <a class="product-item-name">@{{ phone.name }}</a>
                                        <div>
                                            <a class="product-item-cart add_to_cart" href="javascript:void(0)" data-id=""><span></span>Thêm vào giỏ</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end sản phẩm -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>





    <script>
        var phoneApp = angular.module("phoneApp", []);
        phoneApp.controller('searchController', function ($scope,$http) {
            $scope.searchKeyword = {}
            $scope.SearchTerm = '$';
            $http.get('search').then(function (response) {
                $scope.phoneList = response.data.records;
            })

        });

           /* $scope.bookList = [
                { "id": 1, "title": "Hobbit", "author": "Aman", "price": 700 },
                { "id": 2, "title": "Lord of the rings", "author": "Sameer", "price": 1000 },
                { "id": 3, "title": "Harry Porter", "author": "Anuj", "price": 650 },
                { "id": 4, "title": "The little prince", "author": "Jatin", "price": 870 },
                { "id": 5, "title": "Angels and Demons", "author": "Shivam", "price": 890 }
            ];
      */

    </script>
    </body>
    </html>
@endsection

