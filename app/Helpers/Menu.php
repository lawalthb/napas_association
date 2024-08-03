
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
			'path' => 'resourceitems',
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
			'path' => 'resourceitems/member_list',
			'label' => "_Resources", 
			'icon' => '<i class="material-icons ">picture_as_pdf</i>'
		],
		
		[
			'path' => 'electionpositions',
			'label' => "Election", 
			'icon' => '<i class="material-icons ">group_add</i>','submenu' => [
		[
			'path' => 'electionpositions',
			'label' => "Election Positions", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		],
		
		[
			'path' => 'electionaspirants',
			'label' => "Election Aspirants", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		],
		
		[
			'path' => 'electionvotes',
			'label' => "Election Votes", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		]
	]
		],
		
		[
			'path' => 'contestcategories',
			'label' => "Contest", 
			'icon' => '<i class="material-icons ">contact_mail</i>','submenu' => [
		[
			'path' => 'contestcategories',
			'label' => "Contest Categories", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		],
		
		[
			'path' => 'contestnominees',
			'label' => "Contest Nominees", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		],
		
		[
			'path' => 'contestvotes',
			'label' => "Contest Votes", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		]
	]
		],
		
		[
			'path' => 'users',
			'label' => "Users", 
			'icon' => '<i class="material-icons ">person</i>','submenu' => [
		[
			'path' => 'users',
			'label' => "Members", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		],
		
		[
			'path' => 'users',
			'label' => "Admins", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		]
	]
		],
		
		[
			'path' => 'finalprojects',
			'label' => "Final Year Projects", 
			'icon' => '<i class="material-icons ">assignment</i>','submenu' => [
		[
			'path' => 'projectsupervisors',
			'label' => "Project Supervisors", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		],
		
		[
			'path' => 'supervisorusers',
			'label' => "Supervisor & Member", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		],
		
		[
			'path' => 'finalprojects',
			'label' => "Topics", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		]
	]
		],
		
		[
			'path' => 'levels',
			'label' => "Levels", 
			'icon' => '<i class="material-icons ">format_list_numbered</i>'
		],
		
		[
			'path' => 'pricesettings',
			'label' => "Price Settings", 
			'icon' => '<i class="material-icons ">perm_data_setting</i>'
		],
		
		[
			'path' => 'appsettings',
			'label' => "App Settings", 
			'icon' => '<i class="material-icons ">settings</i>'
		],
		
		[
			'path' => 'roles',
			'label' => "Roles & Permission", 
			'icon' => '<i class="material-icons ">person_pin</i>','submenu' => [
		[
			'path' => 'roles',
			'label' => "Roles", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		],
		
		[
			'path' => 'permissions',
			'label' => "Permissions", 
			'icon' => '<i class="material-icons ">subdirectory_arrow_right</i>'
		]
	]
		],
		
		[
			'path' => 'allpermissions',
			'label' => "All Permissions", 
			'icon' => '<i class="material-icons">extension</i>'
		]
	] ;
	}
	
	public static function navbartopleft(){
		return [
		[
			'path' => 'allpermissions',
			'label' => "All Permissions", 
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
		],
		
		[
			'path' => 'allpermissions',
			'label' => "All Permissions", 
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
	
	public static function fileType2(){
		return [
		[
			'value' => 'Image', 
			'label' => "Images", 
		],
		[
			'value' => 'pdf', 
			'label' => "PDF/Doc/Excel", 
		],
		[
			'value' => 'videos', 
			'label' => "Videos/Audio", 
		],] ;
	}
	
	}
