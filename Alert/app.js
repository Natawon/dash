var app = angular.module("app", []);
app.controller("test_app", function($scope, $http,$interval) {
    $scope.btnName = "Insert";
    $scope.insert = function() {
        // alert('insert clicked!');
        if ($scope.name == null) {
            // console.log("Enter Your Name");
            alert("Enter Your Name");
        } else if ($scope.date_starts == null) {
            alert("Enter Your date_starts");
        } else if ($scope.date_expire == null) {
            alert("Enter Your date_expire");
        } 
        else {
        
        $http.post("insert.php",{
            'name':$scope.name,
            'date_starts':$scope.date_starts,
            'date_expire':$scope.date_expire,
            


            // 'Max_total':$scope.Max_total,


            'btnName':$scope.btnName,

            'id': $scope.id



        }).then(function(data){
            $scope.name=null;
            $scope.date_starts=null;
            $scope.date_expire=null;
            


            // $scope.Max_total=null;

            $scope.show_data();
         alert("เพิ่มข้อมูลสำเร็จ");


            //console.log(data.data);

        })
        
}
           
    }

    $scope.show_data = function() {
        $http.get("display3.php")
            .success(function(data) {
                $scope.names = data;
            });
    }
    $scope.update_data = function(id,name,lastname,address,gender,age,dates,tele) {
        $scope.id            = id;
        $scope.name          = name;
        $scope.lastname      = lastname;
        $scope.address       = address;
        $scope.age           = age;
        $scope.gender        = gender;
        $scope.dates         = dates;
        $scope.tele          = tele;


        // $scope.Max_total     = Max_total;


        $scope.btnName = "Update";
                 // alert('Save');

        console.log('ok');
    }
    $scope.delete_data = function(id) {
        if (confirm("คุณต้องการลบใช่ไหม?")) {
            $http.post("delete.php", {
                    'id': id
                })
                .success(function(data) {
                    alert(data);
                    $scope.show_data();
                });
        } else {
            return false;
        }
    }



});