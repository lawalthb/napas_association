<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\LandingpageController;

Route::get('/', [LandingpageController::class, 'LandingPage'])->name('index');
Route::get('/contest', [LandingpageController::class, 'contest'])->name('contest');
Route::get('/thankyou', [LandingpageController::class, 'thankyou'])->name('thankyou');
Route::get('payment_callback', 'AuthController@PaymentCallback')->name('registerCallback');
//Route::get('', 'IndexController@index')->name('index')->middleware(['redirect.to.home']);
Route::get('index/login', 'IndexController@login')->name('login');

Route::post('auth/login', 'AuthController@login')->name('auth.login');
Route::any('auth/logout', 'AuthController@logout')->name('logout')->middleware(['auth']);

Route::get('auth/accountcreated', 'AuthController@accountcreated')->name('accountcreated');
Route::get('auth/accountpending', 'AuthController@accountpending')->name('accountpending');
Route::get('auth/accountblocked', 'AuthController@accountblocked')->name('accountblocked');
Route::get('auth/accountinactive', 'AuthController@accountinactive')->name('accountinactive');



Route::get('index/register', 'AuthController@register')->name('auth.register')->middleware(['redirect.to.home']);
Route::post('index/register', 'AuthController@register_store')->name('auth.register_store');

Route::get('webabouts', 'WebAboutsController@index')->name('webabouts.index');
Route::get('webabouts/index/{filter?}/{filtervalue?}', 'WebAboutsController@index')->name('webabouts.index');
Route::get('webabouts/view/{rec_id}', 'WebAboutsController@view')->name('webabouts.view');
Route::post('auth/login', 'AuthController@login')->name('auth.login');

Route::get('auth/password/forgotpassword', 'AuthController@showForgotPassword')->name('password.forgotpassword');
Route::post('auth/password/sendemail', 'AuthController@sendPasswordResetLink')->name('password.email');
Route::get('auth/password/reset', 'AuthController@showResetPassword')->name('password.reset.token');
Route::post('auth/password/resetpassword', 'AuthController@resetPassword')->name('password.resetpassword');
Route::get('auth/password/resetcompleted', 'AuthController@passwordResetCompleted')->name('password.resetcompleted');
Route::get('auth/password/linksent', 'AuthController@passwordResetLinkSent')->name('password.resetlinksent');

Route::get('auth/email/showverifyemail', 'AuthController@showVerifyEmail')->name('verification.notice');
Route::get('auth/email/verify', 'AuthController@verifyEmail')->name('verification.verify');
Route::get('auth/email/verified', 'AuthController@emailVerified')->name('verification.verified');
Route::get('auth/email/resend', 'AuthController@resendVerifyEmail')->name('verification.resend');


/**
 * All routes which requires auth
 */
Route::middleware(['auth', 'verified'])->group(function () {

	Route::get('home', 'HomeController@index')->name('home');



	/* routes for AcademicSessions Controller */
	Route::get('academicsessions', 'AcademicSessionsController@index')->name('academicsessions.index');
	Route::get('academicsessions/index/{filter?}/{filtervalue?}', 'AcademicSessionsController@index')->name('academicsessions.index');
	Route::get('academicsessions/view/{rec_id}', 'AcademicSessionsController@view')->name('academicsessions.view');
	Route::get('academicsessions/masterdetail/{rec_id}', 'AcademicSessionsController@masterDetail')->name('academicsessions.masterdetail');
	Route::get('academicsessions/add', 'AcademicSessionsController@add')->name('academicsessions.add');
	Route::post('academicsessions/add', 'AcademicSessionsController@store')->name('academicsessions.store');

	Route::any('academicsessions/edit/{rec_id}', 'AcademicSessionsController@edit')->name('academicsessions.edit');
	Route::get('academicsessions/delete/{rec_id}', 'AcademicSessionsController@delete');

	/* routes for AppSettings Controller */
	Route::get('appsettings', 'AppSettingsController@index')->name('appsettings.index');
	Route::get('appsettings/index/{filter?}/{filtervalue?}', 'AppSettingsController@index')->name('appsettings.index');
	Route::get('appsettings/view/{rec_id}', 'AppSettingsController@view')->name('appsettings.view');
	Route::get('appsettings/add', 'AppSettingsController@add')->name('appsettings.add');
	Route::post('appsettings/add', 'AppSettingsController@store')->name('appsettings.store');

	Route::any('appsettings/edit/{rec_id}', 'AppSettingsController@edit')->name('appsettings.edit');
	Route::get('appsettings/delete/{rec_id}', 'AppSettingsController@delete');

	/* routes for ContestCategories Controller */
	Route::get('contestcategories', 'ContestCategoriesController@index')->name('contestcategories.index');
	Route::get('contestcategories/index/{filter?}/{filtervalue?}', 'ContestCategoriesController@index')->name('contestcategories.index');
	Route::get('contestcategories/view/{rec_id}', 'ContestCategoriesController@view')->name('contestcategories.view');
	Route::get('contestcategories/masterdetail/{rec_id}', 'ContestCategoriesController@masterDetail')->name('contestcategories.masterdetail');
	Route::get('contestcategories/add', 'ContestCategoriesController@add')->name('contestcategories.add');
	Route::post('contestcategories/add', 'ContestCategoriesController@store')->name('contestcategories.store');

	Route::any('contestcategories/edit/{rec_id}', 'ContestCategoriesController@edit')->name('contestcategories.edit');
	Route::get('contestcategories/delete/{rec_id}', 'ContestCategoriesController@delete');

	/* routes for ContestNominees Controller */
	Route::get('contestnominees', 'ContestNomineesController@index')->name('contestnominees.index');
	Route::get('contestnominees/index/{filter?}/{filtervalue?}', 'ContestNomineesController@index')->name('contestnominees.index');
	Route::get('contestnominees/view/{rec_id}', 'ContestNomineesController@view')->name('contestnominees.view');
	Route::get('contestnominees/add', 'ContestNomineesController@add')->name('contestnominees.add');
	Route::post('contestnominees/add', 'ContestNomineesController@store')->name('contestnominees.store');

	Route::any('contestnominees/edit/{rec_id}', 'ContestNomineesController@edit')->name('contestnominees.edit');
	Route::get('contestnominees/delete/{rec_id}', 'ContestNomineesController@delete');

	/* routes for ContestVotes Controller */
	Route::get('contestvotes', 'ContestVotesController@index')->name('contestvotes.index');
	Route::get('contestvotes/index/{filter?}/{filtervalue?}', 'ContestVotesController@index')->name('contestvotes.index');
	Route::get('contestvotes/view/{rec_id}', 'ContestVotesController@view')->name('contestvotes.view');
	Route::get('contestvotes/add', 'ContestVotesController@add')->name('contestvotes.add');
	Route::post('contestvotes/add', 'ContestVotesController@store')->name('contestvotes.store');

	Route::any('contestvotes/edit/{rec_id}', 'ContestVotesController@edit')->name('contestvotes.edit');
	Route::get('contestvotes/delete/{rec_id}', 'ContestVotesController@delete');

	/* routes for ElectionAspirants Controller */
	Route::get('electionaspirants', 'ElectionAspirantsController@index')->name('electionaspirants.index');
	Route::get('electionaspirants/index/{filter?}/{filtervalue?}', 'ElectionAspirantsController@index')->name('electionaspirants.index');
	Route::get('electionaspirants/view/{rec_id}', 'ElectionAspirantsController@view')->name('electionaspirants.view');
	Route::get('electionaspirants/masterdetail/{rec_id}', 'ElectionAspirantsController@masterDetail')->name('electionaspirants.masterdetail');
	Route::get('electionaspirants/add', 'ElectionAspirantsController@add')->name('electionaspirants.add');
	Route::post('electionaspirants/add', 'ElectionAspirantsController@store')->name('electionaspirants.store');

	Route::any('electionaspirants/edit/{rec_id}', 'ElectionAspirantsController@edit')->name('electionaspirants.edit');
	Route::get('electionaspirants/delete/{rec_id}', 'ElectionAspirantsController@delete');

	/* routes for ElectionPositions Controller */
	Route::get('electionpositions', 'ElectionPositionsController@index')->name('electionpositions.index');
	Route::get('electionpositions/index/{filter?}/{filtervalue?}', 'ElectionPositionsController@index')->name('electionpositions.index');
	Route::get('electionpositions/view/{rec_id}', 'ElectionPositionsController@view')->name('electionpositions.view');
	Route::get('electionpositions/masterdetail/{rec_id}', 'ElectionPositionsController@masterDetail')->name('electionpositions.masterdetail');
	Route::get('electionpositions/add', 'ElectionPositionsController@add')->name('electionpositions.add');
	Route::post('electionpositions/add', 'ElectionPositionsController@store')->name('electionpositions.store');

	Route::any('electionpositions/edit/{rec_id}', 'ElectionPositionsController@edit')->name('electionpositions.edit');
	Route::get('electionpositions/delete/{rec_id}', 'ElectionPositionsController@delete');

	/* routes for ElectionVotes Controller */
	Route::get('electionvotes', 'ElectionVotesController@index')->name('electionvotes.index');
	Route::get('electionvotes/index/{filter?}/{filtervalue?}', 'ElectionVotesController@index')->name('electionvotes.index');
	Route::get('electionvotes/view/{rec_id}', 'ElectionVotesController@view')->name('electionvotes.view');
	Route::get('electionvotes/add', 'ElectionVotesController@add')->name('electionvotes.add');
	Route::post('electionvotes/add', 'ElectionVotesController@store')->name('electionvotes.store');

	Route::any('electionvotes/edit/{rec_id}', 'ElectionVotesController@edit')->name('electionvotes.edit');
	Route::get('electionvotes/delete/{rec_id}', 'ElectionVotesController@delete');

	/* routes for FinalProjects Controller */
	Route::get('finalprojects', 'FinalProjectsController@index')->name('finalprojects.index');
	Route::get('finalprojects/index/{filter?}/{filtervalue?}', 'FinalProjectsController@index')->name('finalprojects.index');
	Route::get('finalprojects/view/{rec_id}', 'FinalProjectsController@view')->name('finalprojects.view');
	Route::get('finalprojects/add', 'FinalProjectsController@add')->name('finalprojects.add');
	Route::post('finalprojects/add', 'FinalProjectsController@store')->name('finalprojects.store');

	Route::any('finalprojects/edit/{rec_id}', 'FinalProjectsController@edit')->name('finalprojects.edit');
	Route::get('finalprojects/delete/{rec_id}', 'FinalProjectsController@delete');

	/* routes for Levels Controller */
	Route::get('levels', 'LevelsController@index')->name('levels.index');
	Route::get('levels/index/{filter?}/{filtervalue?}', 'LevelsController@index')->name('levels.index');
	Route::get('levels/view/{rec_id}', 'LevelsController@view')->name('levels.view');
	Route::get('levels/masterdetail/{rec_id}', 'LevelsController@masterDetail')->name('levels.masterdetail');
	Route::get('levels/add', 'LevelsController@add')->name('levels.add');
	Route::post('levels/add', 'LevelsController@store')->name('levels.store');

	Route::any('levels/edit/{rec_id}', 'LevelsController@edit')->name('levels.edit');
	Route::get('levels/delete/{rec_id}', 'LevelsController@delete');

	/* routes for PriceSettings Controller */
	Route::get('pricesettings', 'PriceSettingsController@index')->name('pricesettings.index');
	Route::get('pricesettings/index/{filter?}/{filtervalue?}', 'PriceSettingsController@index')->name('pricesettings.index');
	Route::get('pricesettings/view/{rec_id}', 'PriceSettingsController@view')->name('pricesettings.view');
	Route::get('pricesettings/masterdetail/{rec_id}', 'PriceSettingsController@masterDetail')->name('pricesettings.masterdetail');
	Route::get('pricesettings/add', 'PriceSettingsController@add')->name('pricesettings.add');
	Route::post('pricesettings/add', 'PriceSettingsController@store')->name('pricesettings.store');

	Route::any('pricesettings/edit/{rec_id}', 'PriceSettingsController@edit')->name('pricesettings.edit');
	Route::get('pricesettings/delete/{rec_id}', 'PriceSettingsController@delete');

	/* routes for ProjectSupervisors Controller */
	Route::get('projectsupervisors', 'ProjectSupervisorsController@index')->name('projectsupervisors.index');
	Route::get('projectsupervisors/index/{filter?}/{filtervalue?}', 'ProjectSupervisorsController@index')->name('projectsupervisors.index');
	Route::get('projectsupervisors/view/{rec_id}', 'ProjectSupervisorsController@view')->name('projectsupervisors.view');
	Route::get('projectsupervisors/masterdetail/{rec_id}', 'ProjectSupervisorsController@masterDetail')->name('projectsupervisors.masterdetail');
	Route::get('projectsupervisors/add', 'ProjectSupervisorsController@add')->name('projectsupervisors.add');
	Route::post('projectsupervisors/add', 'ProjectSupervisorsController@store')->name('projectsupervisors.store');

	Route::any('projectsupervisors/edit/{rec_id}', 'ProjectSupervisorsController@edit')->name('projectsupervisors.edit');
	Route::get('projectsupervisors/delete/{rec_id}', 'ProjectSupervisorsController@delete');

	/* routes for ResourceCategories Controller */
	Route::get('resourcecategories', 'ResourceCategoriesController@index')->name('resourcecategories.index');
	Route::get('resourcecategories/index/{filter?}/{filtervalue?}', 'ResourceCategoriesController@index')->name('resourcecategories.index');
	Route::get('resourcecategories/view/{rec_id}', 'ResourceCategoriesController@view')->name('resourcecategories.view');
	Route::get('resourcecategories/masterdetail/{rec_id}', 'ResourceCategoriesController@masterDetail')->name('resourcecategories.masterdetail');
	Route::get('resourcecategories/add', 'ResourceCategoriesController@add')->name('resourcecategories.add');
	Route::post('resourcecategories/add', 'ResourceCategoriesController@store')->name('resourcecategories.store');

	Route::any('resourcecategories/edit/{rec_id}', 'ResourceCategoriesController@edit')->name('resourcecategories.edit');
	Route::get('resourcecategories/delete/{rec_id}', 'ResourceCategoriesController@delete');

	/* routes for ResourceItems Controller */
	Route::get('resourceitems', 'ResourceItemsController@index')->name('resourceitems.index');
	Route::get('resourceitems/index/{filter?}/{filtervalue?}', 'ResourceItemsController@index')->name('resourceitems.index');
	Route::get('resourceitems/view/{rec_id}', 'ResourceItemsController@view')->name('resourceitems.view');
	Route::get('resourceitems/masterdetail/{rec_id}', 'ResourceItemsController@masterDetail')->name('resourceitems.masterdetail');
	Route::get('resourceitems/add', 'ResourceItemsController@add')->name('resourceitems.add');
	Route::post('resourceitems/add', 'ResourceItemsController@store')->name('resourceitems.store');

	Route::any('resourceitems/edit/{rec_id}', 'ResourceItemsController@edit')->name('resourceitems.edit');
	Route::get('resourceitems/delete/{rec_id}', 'ResourceItemsController@delete');

	/* routes for ResourcesPaids Controller */
	Route::get('resourcespaids', 'ResourcesPaidsController@index')->name('resourcespaids.index');
	Route::get('resourcespaids/index/{filter?}/{filtervalue?}', 'ResourcesPaidsController@index')->name('resourcespaids.index');
	Route::get('resourcespaids/view/{rec_id}', 'ResourcesPaidsController@view')->name('resourcespaids.view');
	Route::get('resourcespaids/add', 'ResourcesPaidsController@add')->name('resourcespaids.add');
	Route::post('resourcespaids/add', 'ResourcesPaidsController@store')->name('resourcespaids.store');

	Route::any('resourcespaids/edit/{rec_id}', 'ResourcesPaidsController@edit')->name('resourcespaids.edit');
	Route::get('resourcespaids/delete/{rec_id}', 'ResourcesPaidsController@delete');

	/* routes for SupervisorUsers Controller */
	Route::get('supervisorusers', 'SupervisorUsersController@index')->name('supervisorusers.index');
	Route::get('supervisorusers/index/{filter?}/{filtervalue?}', 'SupervisorUsersController@index')->name('supervisorusers.index');
	Route::get('supervisorusers/view/{rec_id}', 'SupervisorUsersController@view')->name('supervisorusers.view');
	Route::get('supervisorusers/add', 'SupervisorUsersController@add')->name('supervisorusers.add');
	Route::post('supervisorusers/add', 'SupervisorUsersController@store')->name('supervisorusers.store');

	Route::any('supervisorusers/edit/{rec_id}', 'SupervisorUsersController@edit')->name('supervisorusers.edit');
	Route::get('supervisorusers/delete/{rec_id}', 'SupervisorUsersController@delete');

	/* routes for Transactions Controller */
	Route::get('transactions', 'TransactionsController@index')->name('transactions.index');
	Route::get('transactions/index/{filter?}/{filtervalue?}', 'TransactionsController@index')->name('transactions.index');
	Route::get('transactions/view/{rec_id}', 'TransactionsController@view')->name('transactions.view');
	Route::get('transactions/add', 'TransactionsController@add')->name('transactions.add');
	Route::post('transactions/add', 'TransactionsController@store')->name('transactions.store');

	Route::any('transactions/edit/{rec_id}', 'TransactionsController@edit')->name('transactions.edit');
	Route::get('transactions/delete/{rec_id}', 'TransactionsController@delete');

	/* routes for Users Controller */
	Route::get('users', 'UsersController@index')->name('users.index');
	Route::get('users/index/{filter?}/{filtervalue?}', 'UsersController@index')->name('users.index');
	Route::get('users/view/{rec_id}', 'UsersController@view')->name('users.view');
	Route::get('users/masterdetail/{rec_id}', 'UsersController@masterDetail')->name('users.masterdetail');
	Route::any('account/edit', 'AccountController@edit')->name('account.edit');
	Route::get('account', 'AccountController@index');
	Route::post('account/changepassword', 'AccountController@changepassword')->name('account.changepassword');
	Route::get('users/add', 'UsersController@add')->name('users.add');
	Route::post('users/add', 'UsersController@store')->name('users.store');

	Route::any('users/edit/{rec_id}', 'UsersController@edit')->name('users.edit');
	Route::get('users/delete/{rec_id}', 'UsersController@delete');

	/* routes for WebAbouts Controller */
	Route::get('webabouts/add', 'WebAboutsController@add')->name('webabouts.add');
	Route::post('webabouts/add', 'WebAboutsController@store')->name('webabouts.store');

	Route::any('webabouts/edit/{rec_id}', 'WebAboutsController@edit')->name('webabouts.edit');
	Route::get('webabouts/delete/{rec_id}', 'WebAboutsController@delete');

	/* routes for WebBenefits Controller */
	Route::get('webbenefits', 'WebBenefitsController@index')->name('webbenefits.index');
	Route::get('webbenefits/index/{filter?}/{filtervalue?}', 'WebBenefitsController@index')->name('webbenefits.index');
	Route::get('webbenefits/view/{rec_id}', 'WebBenefitsController@view')->name('webbenefits.view');
	Route::get('webbenefits/add', 'WebBenefitsController@add')->name('webbenefits.add');
	Route::post('webbenefits/add', 'WebBenefitsController@store')->name('webbenefits.store');

	Route::any('webbenefits/edit/{rec_id}', 'WebBenefitsController@edit')->name('webbenefits.edit');
	Route::get('webbenefits/delete/{rec_id}', 'WebBenefitsController@delete');

	/* routes for WebColours Controller */
	Route::get('webcolours', 'WebColoursController@index')->name('webcolours.index');
	Route::get('webcolours/index/{filter?}/{filtervalue?}', 'WebColoursController@index')->name('webcolours.index');
	Route::get('webcolours/view/{rec_id}', 'WebColoursController@view')->name('webcolours.view');
	Route::get('webcolours/add', 'WebColoursController@add')->name('webcolours.add');
	Route::post('webcolours/add', 'WebColoursController@store')->name('webcolours.store');

	Route::any('webcolours/edit/{rec_id}', 'WebColoursController@edit')->name('webcolours.edit');
	Route::get('webcolours/delete/{rec_id}', 'WebColoursController@delete');

	/* routes for WebContacts Controller */
	Route::get('webcontacts', 'WebContactsController@index')->name('webcontacts.index');
	Route::get('webcontacts/index/{filter?}/{filtervalue?}', 'WebContactsController@index')->name('webcontacts.index');
	Route::get('webcontacts/view/{rec_id}', 'WebContactsController@view')->name('webcontacts.view');
	Route::get('webcontacts/add', 'WebContactsController@add')->name('webcontacts.add');
	Route::post('webcontacts/add', 'WebContactsController@store')->name('webcontacts.store');

	Route::any('webcontacts/edit/{rec_id}', 'WebContactsController@edit')->name('webcontacts.edit');
	Route::get('webcontacts/delete/{rec_id}', 'WebContactsController@delete');

	/* routes for WebCounters Controller */
	Route::get('webcounters', 'WebCountersController@index')->name('webcounters.index');
	Route::get('webcounters/index/{filter?}/{filtervalue?}', 'WebCountersController@index')->name('webcounters.index');
	Route::get('webcounters/view/{rec_id}', 'WebCountersController@view')->name('webcounters.view');
	Route::get('webcounters/add', 'WebCountersController@add')->name('webcounters.add');
	Route::post('webcounters/add', 'WebCountersController@store')->name('webcounters.store');

	Route::any('webcounters/edit/{rec_id}', 'WebCountersController@edit')->name('webcounters.edit');
	Route::get('webcounters/delete/{rec_id}', 'WebCountersController@delete');

	/* routes for WebCtas Controller */
	Route::get('webctas', 'WebCtasController@index')->name('webctas.index');
	Route::get('webctas/index/{filter?}/{filtervalue?}', 'WebCtasController@index')->name('webctas.index');
	Route::get('webctas/view/{rec_id}', 'WebCtasController@view')->name('webctas.view');
	Route::get('webctas/add', 'WebCtasController@add')->name('webctas.add');
	Route::post('webctas/add', 'WebCtasController@store')->name('webctas.store');

	Route::any('webctas/edit/{rec_id}', 'WebCtasController@edit')->name('webctas.edit');
	Route::get('webctas/delete/{rec_id}', 'WebCtasController@delete');

	/* routes for WebEvents Controller */
	Route::get('webevents', 'WebEventsController@index')->name('webevents.index');
	Route::get('webevents/index/{filter?}/{filtervalue?}', 'WebEventsController@index')->name('webevents.index');
	Route::get('webevents/view/{rec_id}', 'WebEventsController@view')->name('webevents.view');
	Route::get('webevents/add', 'WebEventsController@add')->name('webevents.add');
	Route::post('webevents/add', 'WebEventsController@store')->name('webevents.store');

	Route::any('webevents/edit/{rec_id}', 'WebEventsController@edit')->name('webevents.edit');
	Route::get('webevents/delete/{rec_id}', 'WebEventsController@delete');

	/* routes for WebExcos Controller */
	Route::get('webexcos', 'WebExcosController@index')->name('webexcos.index');
	Route::get('webexcos/index/{filter?}/{filtervalue?}', 'WebExcosController@index')->name('webexcos.index');
	Route::get('webexcos/view/{rec_id}', 'WebExcosController@view')->name('webexcos.view');
	Route::get('webexcos/add', 'WebExcosController@add')->name('webexcos.add');
	Route::post('webexcos/add', 'WebExcosController@store')->name('webexcos.store');

	Route::any('webexcos/edit/{rec_id}', 'WebExcosController@edit')->name('webexcos.edit');
	Route::get('webexcos/delete/{rec_id}', 'WebExcosController@delete');

	/* routes for WebGalleries Controller */
	Route::get('webgalleries', 'WebGalleriesController@index')->name('webgalleries.index');
	Route::get('webgalleries/index/{filter?}/{filtervalue?}', 'WebGalleriesController@index')->name('webgalleries.index');
	Route::get('webgalleries/view/{rec_id}', 'WebGalleriesController@view')->name('webgalleries.view');
	Route::get('webgalleries/add', 'WebGalleriesController@add')->name('webgalleries.add');
	Route::post('webgalleries/add', 'WebGalleriesController@store')->name('webgalleries.store');

	Route::any('webgalleries/edit/{rec_id}', 'WebGalleriesController@edit')->name('webgalleries.edit');
	Route::get('webgalleries/delete/{rec_id}', 'WebGalleriesController@delete');

	/* routes for WebHeaders Controller */
	Route::get('webheaders', 'WebHeadersController@index')->name('webheaders.index');
	Route::get('webheaders/index/{filter?}/{filtervalue?}', 'WebHeadersController@index')->name('webheaders.index');
	Route::get('webheaders/view/{rec_id}', 'WebHeadersController@view')->name('webheaders.view');
	Route::get('webheaders/add', 'WebHeadersController@add')->name('webheaders.add');
	Route::post('webheaders/add', 'WebHeadersController@store')->name('webheaders.store');

	Route::any('webheaders/edit/{rec_id}', 'WebHeadersController@edit')->name('webheaders.edit');
	Route::get('webheaders/delete/{rec_id}', 'WebHeadersController@delete');

	/* routes for WebRegistrations Controller */
	Route::get('webregistrations', 'WebRegistrationsController@index')->name('webregistrations.index');
	Route::get('webregistrations/index/{filter?}/{filtervalue?}', 'WebRegistrationsController@index')->name('webregistrations.index');
	Route::get('webregistrations/view/{rec_id}', 'WebRegistrationsController@view')->name('webregistrations.view');
	Route::get('webregistrations/add', 'WebRegistrationsController@add')->name('webregistrations.add');
	Route::post('webregistrations/add', 'WebRegistrationsController@store')->name('webregistrations.store');

	Route::any('webregistrations/edit/{rec_id}', 'WebRegistrationsController@edit')->name('webregistrations.edit');
	Route::get('webregistrations/delete/{rec_id}', 'WebRegistrationsController@delete');

	/* routes for WebResources Controller */
	Route::get('webresources', 'WebResourcesController@index')->name('webresources.index');
	Route::get('webresources/index/{filter?}/{filtervalue?}', 'WebResourcesController@index')->name('webresources.index');
	Route::get('webresources/view/{rec_id}', 'WebResourcesController@view')->name('webresources.view');
	Route::get('webresources/add', 'WebResourcesController@add')->name('webresources.add');
	Route::post('webresources/add', 'WebResourcesController@store')->name('webresources.store');

	Route::any('webresources/edit/{rec_id}', 'WebResourcesController@edit')->name('webresources.edit');
	Route::get('webresources/delete/{rec_id}', 'WebResourcesController@delete');

	/* routes for WebSettings Controller */
	Route::get('websettings', 'WebSettingsController@index')->name('websettings.index');
	Route::get('websettings/index/{filter?}/{filtervalue?}', 'WebSettingsController@index')->name('websettings.index');
	Route::get('websettings/view/{rec_id}', 'WebSettingsController@view')->name('websettings.view');
	Route::get('websettings/add', 'WebSettingsController@add')->name('websettings.add');
	Route::post('websettings/add', 'WebSettingsController@store')->name('websettings.store');

	Route::any('websettings/edit/{rec_id}', 'WebSettingsController@edit')->name('websettings.edit');
	Route::get('websettings/delete/{rec_id}', 'WebSettingsController@delete');

	/* routes for WebSliders Controller */
	Route::get('websliders', 'WebSlidersController@index')->name('websliders.index');
	Route::get('websliders/index/{filter?}/{filtervalue?}', 'WebSlidersController@index')->name('websliders.index');
	Route::get('websliders/view/{rec_id}', 'WebSlidersController@view')->name('websliders.view');
	Route::get('websliders/add', 'WebSlidersController@add')->name('websliders.add');
	Route::post('websliders/add', 'WebSlidersController@store')->name('websliders.store');

	Route::any('websliders/edit/{rec_id}', 'WebSlidersController@edit')->name('websliders.edit');
	Route::get('websliders/delete/{rec_id}', 'WebSlidersController@delete');

	/* routes for WebTestimonials Controller */
	Route::get('webtestimonials', 'WebTestimonialsController@index')->name('webtestimonials.index');
	Route::get('webtestimonials/index/{filter?}/{filtervalue?}', 'WebTestimonialsController@index')->name('webtestimonials.index');
	Route::get('webtestimonials/view/{rec_id}', 'WebTestimonialsController@view')->name('webtestimonials.view');
	Route::get('webtestimonials/add', 'WebTestimonialsController@add')->name('webtestimonials.add');
	Route::post('webtestimonials/add', 'WebTestimonialsController@store')->name('webtestimonials.store');

	Route::any('webtestimonials/edit/{rec_id}', 'WebTestimonialsController@edit')->name('webtestimonials.edit');
	Route::get('webtestimonials/delete/{rec_id}', 'WebTestimonialsController@delete');

	/* routes for WebTopbars Controller */
	Route::get('webtopbars', 'WebTopbarsController@index')->name('webtopbars.index');
	Route::get('webtopbars/index/{filter?}/{filtervalue?}', 'WebTopbarsController@index')->name('webtopbars.index');
	Route::get('webtopbars/view/{rec_id}', 'WebTopbarsController@view')->name('webtopbars.view');
	Route::get('webtopbars/add', 'WebTopbarsController@add')->name('webtopbars.add');
	Route::post('webtopbars/add', 'WebTopbarsController@store')->name('webtopbars.store');

	Route::any('webtopbars/edit/{rec_id}', 'WebTopbarsController@edit')->name('webtopbars.edit');
	Route::get('webtopbars/delete/{rec_id}', 'WebTopbarsController@delete');

	/* routes for WebVissions Controller */
	Route::get('webvissions', 'WebVissionsController@index')->name('webvissions.index');
	Route::get('webvissions/index/{filter?}/{filtervalue?}', 'WebVissionsController@index')->name('webvissions.index');
	Route::get('webvissions/view/{rec_id}', 'WebVissionsController@view')->name('webvissions.view');
	Route::get('webvissions/add', 'WebVissionsController@add')->name('webvissions.add');
	Route::post('webvissions/add', 'WebVissionsController@store')->name('webvissions.store');

	Route::any('webvissions/edit/{rec_id}', 'WebVissionsController@edit')->name('webvissions.edit');
	Route::get('webvissions/delete/{rec_id}', 'WebVissionsController@delete');
});



Route::get(
	'componentsdata/academic_session_id_option_list',
	function (Request $request) {
		$compModel = new App\Models\ComponentsData();
		return $compModel->academic_session_id_option_list($request);
	}
)->middleware(['auth']);

Route::get(
	'componentsdata/updated_by_option_list',
	function (Request $request) {
		$compModel = new App\Models\ComponentsData();
		return $compModel->updated_by_option_list($request);
	}
)->middleware(['auth']);

Route::get(
	'componentsdata/category_id_option_list',
	function (Request $request) {
		$compModel = new App\Models\ComponentsData();
		return $compModel->category_id_option_list($request);
	}
)->middleware(['auth']);

Route::get(
	'componentsdata/position_id_option_list',
	function (Request $request) {
		$compModel = new App\Models\ComponentsData();
		return $compModel->position_id_option_list($request);
	}
)->middleware(['auth']);

Route::get(
	'componentsdata/aspirant_id_option_list',
	function (Request $request) {
		$compModel = new App\Models\ComponentsData();
		return $compModel->aspirant_id_option_list($request);
	}
)->middleware(['auth']);

Route::get(
	'componentsdata/level_id_option_list',
	function (Request $request) {
		$compModel = new App\Models\ComponentsData();
		return $compModel->level_id_option_list($request);
	}
);

Route::get(
	'componentsdata/resourceitems_category_id_option_list',
	function (Request $request) {
		$compModel = new App\Models\ComponentsData();
		return $compModel->resourceitems_category_id_option_list($request);
	}
)->middleware(['auth']);

Route::get(
	'componentsdata/resources_id_option_list',
	function (Request $request) {
		$compModel = new App\Models\ComponentsData();
		return $compModel->resources_id_option_list($request);
	}
)->middleware(['auth']);

Route::get(
	'componentsdata/supervisor_id_option_list',
	function (Request $request) {
		$compModel = new App\Models\ComponentsData();
		return $compModel->supervisor_id_option_list($request);
	}
)->middleware(['auth']);

Route::get(
	'componentsdata/price_settings_id_option_list',
	function (Request $request) {
		$compModel = new App\Models\ComponentsData();
		return $compModel->price_settings_id_option_list($request);
	}
)->middleware(['auth']);

Route::get(
	'componentsdata/users_firstname_value_exist',
	function (Request $request) {
		$compModel = new App\Models\ComponentsData();
		return $compModel->users_firstname_value_exist($request);
	}
);

Route::get(
	'componentsdata/users_phone_value_exist',
	function (Request $request) {
		$compModel = new App\Models\ComponentsData();
		return $compModel->users_phone_value_exist($request);
	}
);

Route::get(
	'componentsdata/users_email_value_exist',
	function (Request $request) {
		$compModel = new App\Models\ComponentsData();
		return $compModel->users_email_value_exist($request);
	}
);


Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');


/**
 * All static content routes
 */
Route::get(
	'info/about',
	function () {
		return view("pages.info.about");
	}
);
Route::get(
	'info/faq',
	function () {
		return view("pages.info.faq");
	}
);

Route::get(
	'info/contact',
	function () {
		return view("pages.info.contact");
	}
);
Route::get(
	'info/contactsent',
	function () {
		return view("pages.info.contactsent");
	}
);

Route::post(
	'info/contact',
	function (Request $request) {
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required'
		]);

		$senderName = $request->name;
		$senderEmail = $request->email;
		$message = $request->message;

		$receiverEmail = config("mail.from.address");

		Mail::send(
			'pages.info.contactemail',
			[
				'name' => $senderName,
				'email' => $senderEmail,
				'comment' => $message
			],
			function ($mail) use ($senderEmail, $receiverEmail) {
				$mail->from($senderEmail);
				$mail->to($receiverEmail)
					->subject('Contact Form');
			}
		);
		return redirect("info/contactsent");
	}
);


Route::get(
	'info/features',
	function () {
		return view("pages.info.features");
	}
);
Route::get(
	'info/privacypolicy',
	function () {
		return view("pages.info.privacypolicy");
	}
);
Route::get(
	'info/termsandconditions',
	function () {
		return view("pages.info.termsandconditions");
	}
);

Route::get('info/changelocale/{locale}', function ($locale) {
	app()->setlocale($locale);
	session()->put('locale', $locale);
	return redirect()->back();
})->name('info.changelocale');
