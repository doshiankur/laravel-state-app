<?php

use Illuminate\Support\Facades\Route;
//hari
use App\Http\Controllers\Admin\achievement;
use App\Http\Controllers\Admin\Languages;
// use App\Http\Controllers\Auth\SendsPasswordResetEmails;
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

/*Route::get('/', function () {
//dd("hi");
return view('welcome');
});*/

Route::group(['prefix' => 'webpanel'], function () {
    Auth::routes();
});
//start on Sep2022
Route::get('forget-password', 'Auth\ForgotPasswordController@getEmail');
Route::post('forget-password', 'Auth\ForgotPasswordController@postEmail');
Route::get('reset-password/{token}/{email}', 'Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'Auth\ResetPasswordController@updatePassword');
//Forgot password End Sep2022


//Forgot password Old code
/*Route::get('forget-password','Auth\ForgotPasswordController@showForgetPasswordForm',['name'=>'forget.password.get']);
Route::post('forget-password','Auth\ForgotPasswordController@submitForgetPasswordForm',['name'=>'forget.password.post']); 
//ResetPasswordController
Route::get('reset-password/{token}','Auth\ForgotPasswordController@showResetPasswordForm',['name'=>'reset.password.get']);
Route::post('reset-password','Auth\ForgotPasswordController@submitResetPasswordForm',['name'=>'reset.password.post']);*/
// getPassword
// Route::get('/forget-password',[ForgotPasswordController::class,'showForgetPasswordForm']);
// Route::post('/forget-password',[ForgotPasswordController::class,'postEmail']);

// Route::get('/reset-password/{token}',[ResetPasswordController::class,'getPassword']);
// Route::post('/reset-password',[ResetPasswordController::class,'updatePassword']);
//submitForgetPasswordForm

//my code

// Route::get('/forget-password',[ForgotPasswordController::class,'getEmail']);
// Route::post('/forget-password',[ForgotPasswordController::class,'postEmail']);

// Route::get('/reset-password/{token}',[ResetPasswordController::class,'getPassword']);
// Route::post('/reset-password',[ResetPasswordController::class,'updatePassword']);

// ----

//End here

Route::group(['namespace' => 'Auth'], function(){   
    Route::get('/logout', 'LoginController@logout');
});


Route::group(['namespace' => 'Admin', 'prefix' => 'webpanel', 'middleware' => ['auth','clear']], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    Route::get('/membership','MembershipContoller@getMembers',['name'=>'membership']);//Membership from getting data
    Route::get('/membership/view/{membershipid}','MembershipContoller@viewMembers');
    Route::get('/membership/query/{memebrshipid}','MembershipContoller@addQuery');//Membership Query view 
    Route::get('/membership/status/{memebrshipid}','MembershipContoller@changeQuery');//Change the memebership status 
    Route::get('/membership/verify/{memebrshipid}','MembershipContoller@ChangeStatus');//Change the memebrship status as per the applicable    

   Route::get('/approverdmembership','MembershipContoller@approverdmembership',['name'=>'approverdmembership']);//Membership from getting data
   Route::post('approverdmembership/exportcsv','MembershipContoller@exportcsv',['name'=>'exportcsv']);//Download  only Approverd Membership data excel between date seleted




    Route::PATCH('/membership/{id}','MembershipContoller@update');//Membership Query view 

    Route::resource('announcement','AnnounceController',['name'=>'announcement']);
    Route::resource('libraryTime','LibraryTimecontroller',['name'=>'libraryTime']);
    Route::resource('users', 'UsersController', ['name' => 'users']);
    Route::resource('languages', 'LanguageController', ['name' => 'languages']);
    Route::resource('aboutus', 'AboutusController', ['name' => 'aboutus']);
    
    //hari

    Route::resource('achievement', 'AchivementController', ['name' => 'achievement']);
    Route::resource('programcalender', 'ProgramCalenderController', ['name' => 'programcalender']);
    Route::resource('knowledgecategory', 'KnowledgeCategoryController', ['name' => 'knowledgecategory']);
    Route::resource('knowledgecenter', 'KnowledgeCenterController', ['name' => 'knowledgecenter']);
    
    
    Route::resource('activities', 'ActivitiesController', ['name' => 'activities']);
    Route::resource('administrativeoffices', 'AdministrativeofficeController', ['name' => 'administrativeoffices']);
    Route::resource('bookexchanges', 'BookExchangeContoller', ['name' => 'bookexchanges']);
    Route::resource('functions','FunctionsController',['name'=>'functions']);
    Route::resource('introduction', 'IntroductionController', ['name' => 'introduction']);
    Route::resource('librarian_desk', 'LibrarianDeskController', ['name' => 'librarian_desk']);
    Route::resource('announcement', 'AnnounceController', ['name' => 'announcement']);
    Route::resource('leaders', 'LeaderController', ['name' => 'leaders']);
    Route::resource('partners', 'PartnersController', ['name' => 'partners']);
    Route::resource('copyrights', 'CopyRightController', ['name' => 'copyright']);
    Route::resource('upcoming_event', 'UpcomingEventsController', ['name' => 'upcoming_event']);

    Route::resource('tvroom', 'TvRoomController', ['name' => 'tvroom']);
    Route::resource('technicaldepartment', 'TechnicalDepartmentController', ['name' => 'technicaldepartment']);
    Route::resource('studentreadingroom', 'StudentReadingRoomController', ['name' => 'studentreadingroom']);
    Route::resource('member_application_type', 'MemberApplicationTypeController', ['name' => 'memberapplicationtype']);

    // Route::resource('librarian_desk','LibrarianDeskController',['name'=>'librarian_desk']);
    Route::resource('languages','LanguageController',['name'=>'languages']);

    
    Route::resource('aboutus','AboutusController',['name'=>'aboutus']);
    Route::resource('activities','ActivitiesController',['name'=>'activities']);
    Route::resource('administrativeoffices','AdministrativeofficeController',['name'=>'administrativeoffices']);
    Route::resource('bookexchanges','BookExchangeContoller',['name'=>'bookexchanges']);
    Route::resource('functions','FunctionsController',['name'=>'functions']);


    Route::resource('introduction','IntroductionController',['name'=>'introduction']);
    Route::resource('librarian_desk','LibrarianDeskController',['name'=>'librarian_desk']);
    Route::resource('announcement','AnnounceController',['name'=>'announcement']);
    Route::resource('leaders','LeaderController',['name'=>'leaders']);
    Route::resource('partners','PartnersController',['name'=>'partners']);
    Route::resource('copyrights','CopyRightController',['name'=>'copyright']);


    Route::resource('missionvisions','MissionVissionController',['name'=>'missionvisions']);
    Route::resource('managementofvillagelibraries','ManagementofvillagelibrariesController',
        ['name'=>'managementofvillagelibraries']);


    // Route::resource('librarian_desk','LibrarianDeskController',['name'=>'librarian_desk']);    
    // Route::resource('introduction','IntroductionController',['name'=>'introduction']);
    //Route::get('/logout', 'AdminController@logout' )->name('logout')->middleware('auth');
    /**
     * Logout Route
     */

 //start code for reading corner HP
  Route::resource('readingcorner','ReadingCornerController',['name'=>'readingcorner']);//end code here for reading corner HP   
    
  Route::resource('referenceservice','ReferenceServiceController',['name'=>'strReferenceService']); 
  Route::resource('saleofoldmagazines','SaleofOldMagazinController',['name'=>'saleofoldmagazines']);
  // Route::resource('photo_gallery','PhotoGalleryController',['name'=>'photo_gallery']);
  // Route::resource('allPhotoGallery/{id}','AllPhotosGalleryController',['name'=>'allPhotoGallery']);
  //  Route::post('allPhotoGallery/deleteeventgallery','AllPhotosGalleryController@destroyimage',['name'=>'allPhotoGallery']);

    
    Route::resource('event','EventController',['name'=>'event']);
    Route::post('changeeventstatus','EventController@changeeventstatus');

    Route::post('eventgallery/deleteeventgallery','EventGalleryController@destroyimage',['name'=>'event']);
    Route::any('eventgallery/{id}','EventGalleryController@index',['name'=>'event']);


    
  
    //hari

    //Route::resource('achivment', 'AchivmentController', ['name' => 'achivment']);


    Route::post('changememberapplicationtypestatus','MemberApplicationTypeController@memberAppstatus');
    Route::post('changeaboutusstatus', 'AboutusController@aboutUsstatus');
    Route::post('changeactivitystaus', 'ActivitiesController@activitystatus');
    Route::post('changeadministrativeofficestatus','AdministrativeofficeController@administativeOfficestatus');
    Route::post('changeannouncementstatus','AnnounceController@announcementstatus');
    Route::post('changebookxchangesstatus','BookExchangeContoller@changeBookxstatus');
    Route::post('changecopyrightsstatus','CopyRightController@copyRightstatus');
    Route::post('changefunctionstatus','FunctionsController@functionStatus');
    Route::post('changeintrostatus','IntroductionController@changeIntroductionstatus');
    Route::post('changelanguagestatus','LanguageController@languagestatus');
    Route::post('changeleadersstatus','LeaderController@leaderstatus');
    Route::post('changelibrariandeskstatus','LibrarianDeskController@librarianDeskstatus');
    Route::post('changelibrarytimestatus','LibraryTimecontroller@libraryTimestatus');
    Route::post('changemanagementofvillagestatus','ManagementofvillagelibrariesController@managementOfVillagestatus');
    Route::post('changemissionvissionstatus','MissionVissionController@missionVissionstatus');
    Route::post('changepartnersstatus','PartnersController@partnerStatus');
    Route::post('changereadingcornerstatus','ReadingCornerController@readingCornerstatus');
    Route::post('changereferanceservicestatus','ReferenceServiceController@referanceServicestatus');
    Route::post('changesaleofoldmagazinesstatus','SaleofOldMagazinController@saleOfOldstatus');
    Route::post('changestudentreadingroom','StudentReadingRoomController@studentReadingstatus');
    Route::post('changestudenttechnicaldepartmentstatus','TechnicalDepartmentController@studentTechnicalDeptstatus');
    Route::post('changetvroomstatus','TvRoomController@tvRoomstatus');
    Route::post('changeupcomingeventstatus','UpcomingEventsController@upComingstatus');
    Route::post('changeachievementstatus','AchivementController@achievementstatus');
    Route::post('changeprogramcalenderstatus','ProgramCalenderController@programCalenderstatus');
    Route::post('changeknowledgecategorystatus','KnowledgeCategoryController@knowledgecategorystatus');
    Route::post('changeknowledgecenterstatus','KnowledgeCenterController@knowledgecenterstatus');
    //End Here
    
  //AllPhotosGallery
});
//Route::get('/', 'HomeController@index')->name('home');
Route::group(['namespace' => 'Admin','middleware' => ['auth']], function () {
 Route::get('/', 'AdminController@index');
});