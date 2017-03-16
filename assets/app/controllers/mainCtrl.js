'use strict';

angular.module('indecisionsApp')
.controller
('mainCtrl',
	['$scope', '$rootScope', '$http', 'API_CONFIG', '$timeout',
		function ($scope, $rootScope, $http, API_CONFIG, $timeout)
		{
			$scope.indecisionList = [];
			$scope.choice = false;
			$scope.name;
			$scope.information;
			$scope.result;

			//Get Indecisions
			$scope.getData = function()
			{
				var req =
				{
					method : 'POST',
					url    : API_CONFIG.WP_URL + 'lib/get-indecisions.php',
					data   : { ID: $scope.pageID }
				}
				$http(req)
					.success
					(
						function(data)
						{
							$scope.indecisionList = data;
						}
					)
			};//end GetData

			$scope.deleteThis = function(id)
			{
				var req =
				{
					method : 'POST',
					url    : API_CONFIG.WP_URL + 'lib/remove-indecision.php',
					data   : { ID: $scope.pageID, ind_id: id }
				}
				$http(req)
					.success
					(
						function()
						{
							$scope.getData();
						}
					)
			};//end deleteThis

			$scope.addIndecision = function()
			{
				var req =
				{
					method : 'POST',
					url    : API_CONFIG.WP_URL + 'lib/update-indecisions.php',
					data   : { ID: $scope.pageID, name: $scope.name, information: $scope.information }
				}
				$http(req)
					.success
					(
						function()
						{
							$scope.getData();
							$scope.name = '';
							$scope.information ='';
						}
					)
			};

			$scope.selectChoice = function(){
				var req =
				{
					method : 'POST',
					url    : API_CONFIG.WP_URL + 'lib/choose-indecision.php',
					data   : { ID: $scope.pageID }
				}
				$http(req)
					.success
					(
						function(data)
						{
							$scope.choice = true;
							$scope.result = data;
						}
					)
			};

			$scope.getData();

		}
	]
)
