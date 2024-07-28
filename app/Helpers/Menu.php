
<?php
	class Menu{
		
	public static function navbarsideleft(){
		return [
		[
			'path' => 'home',
			'label' => "Home", 
			'icon' => '<i class="material-icons ">airplay</i>'
		],
		
		[
			'path' => 'academicsessions',
			'label' => "Academic Sessions", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'transactions',
			'label' => "_Transactions", 
			'icon' => '<i class="material-icons ">attach_money</i>'
		],
		
		[
			'path' => 'transactions/member_list',
			'label' => "Transaction", 
			'icon' => '<i class="material-icons ">attach_money</i>'
		],
		
		[
			'path' => 'webcolours',
			'label' => "Website Management", 
			'icon' => '<i class="material-icons ">add_to_queue</i>'
		],
		
		[
			'path' => '#',
			'label' => "Resources", 
			'icon' => '<i class="material-icons ">picture_as_pdf</i>','submenu' => [
		[
			'path' => 'resourcecategories',
			'label' => "Categories", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		],
		
		[
			'path' => 'resourceitems',
			'label' => "Resource Items", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		],
		
		[
			'path' => 'resourcespaids',
			'label' => "Resources Paids", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		]
	]
		],
		
		[
			'path' => 'contestcategories',
			'label' => "Contest Categories", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'contestnominees',
			'label' => "Contest Nominees", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'contestvotes',
			'label' => "Contest Votes", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'electionaspirants',
			'label' => "Election Aspirants", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'electionpositions',
			'label' => "Election Positions", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'electionvotes',
			'label' => "Election Votes", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'finalprojects',
			'label' => "Final Projects", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'levels',
			'label' => "Levels", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'pricesettings',
			'label' => "Price Settings", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'projectsupervisors',
			'label' => "Project Supervisors", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'supervisorusers',
			'label' => "Supervisor Users", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'users',
			'label' => "Users", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'appsettings',
			'label' => "App Settings", 
			'icon' => '<i class="material-icons">extension</i>'
		]
	] ;
	}
	
	public static function navbartopleft(){
		return [
		[
			'path' => 'appsettings',
			'label' => "App Settings", 
			'icon' => '<i class="material-icons">extension</i>'
		]
	] ;
	}
	
	public static function navbartopright(){
		return [
		[
			'path' => 'appsettings',
			'label' => "App Settings", 
			'icon' => '<i class="material-icons">extension</i>'
		]
	] ;
	}
	
		
	public static function isActive(){
		return [
		[
			'value' => 'Yes', 
			'label' => "Yes", 
		],
		[
			'value' => 'No', 
			'label' => "No", 
		],] ;
	}
	
	public static function paymentStatus(){
		return [
		[
			'value' => 'approved', 
			'label' => "approved", 
		],
		[
			'value' => 'pending', 
			'label' => "pending", 
		],] ;
	}
	
	public static function paymentStatus2(){
		return [
		[
			'value' => 'pending', 
			'label' => "pending", 
		],
		[
			'value' => 'approved', 
			'label' => "approved", 
		],] ;
	}
	
	public static function fileType(){
		return [
		[
			'value' => 'image', 
			'label' => "image", 
		],
		[
			'value' => 'pdf', 
			'label' => "pdf", 
		],
		[
			'value' => 'videos', 
			'label' => "videos", 
		],] ;
	}
	
	public static function status(){
		return [
		[
			'value' => 'Pending', 
			'label' => "Pending", 
		],
		[
			'value' => 'Success', 
			'label' => "Success", 
		],
		[
			'value' => 'Failed', 
			'label' => "Failed", 
		],] ;
	}
	
	public static function memberType(){
		return [
		[
			'value' => 'Regular', 
			'label' => "Regular", 
		],
		[
			'value' => 'Alumni', 
			'label' => "Alumni", 
		],
		[
			'value' => 'Part-time', 
			'label' => "Part-time", 
		],] ;
	}
	
	public static function role(){
		return [
		[
			'value' => 'Member', 
			'label' => "Member", 
		],
		[
			'value' => 'Admin', 
			'label' => "Admin", 
		],
		[
			'value' => 'Lecturer', 
			'label' => "Lecturer", 
		],] ;
	}
	
	public static function topBar(){
		return [
		[
			'value' => 'on', 
			'label' => "on", 
		],
		[
			'value' => 'off', 
			'label' => "off", 
		],] ;
	}
	
	}
