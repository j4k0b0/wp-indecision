'use strict';

var app = angular.module
('indecisionsApp',
	[
		'ui.router',
		'angular-loading-bar',
		'ngCookies'
	]
)
app.config
	(
		[
			'$stateProvider',
			'$urlRouterProvider',
			'$locationProvider',
			'API_CONFIG',
			function ($stateProvider, $urlRouterProvider, $locationProvider, API_CONFIG)
			{
				$stateProvider
					.state
					('start',
						{
							url         : '/',
							templateUrl : API_CONFIG.WP_URL + '/assets/app/views/index.html',
							controller  : 'mainCtrl'
						}
					)
				$urlRouterProvider.otherwise('/');
			}
		]
	)
app.constant
	('API_CONFIG',
		{
		  WP_URL  : '/wp-content/themes/wp-indecision/',
		}
	)

app.run(['$rootScope', '$cookieStore', 'API_CONFIG', '$http', '$state', '$timeout',
	function($rootScope, $cookieStore, API_CONFIG, $http, $state, $timeout)
	{
		//Run app

	}
])