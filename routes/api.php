<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\LanguageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Start FrontEnd Side API AD
//start Sanctum code token ankur doshi

Route::get('/sanctum/csrf-cookie','Frontend\LoginController@authenticate');





//Set all the routes in the group
//Route::middleware(['auth:sanctum'])->group(function () {

Route::post('/getintroduction','Frontend\IntroductionController@getContents');
Route::get('/getLanguage','Frontend\LanguageController@getLanguage');
Route::post('/getupcomingevent','Frontend\UpcomingEventController@getUpcomingEvent');
Route::post('/getupcomingeventlist','Frontend\UpcomingEventController@getUpcomingEventList');//For List
Route::post('/getannouncement','Frontend\AnnouncementController@getAnnouncementContents');
Route::post('/getannouncementlist','Frontend\AnnouncementController@getAnnouncementContentsList');
Route::post('/getpartners','Frontend\PartnersController@getPartners');
Route::post('/getleaders','Frontend\LeadersController@getLeaders');
Route::post('/getlibrariandesk','Frontend\LibrarianDeskController@getLibrarianDesk');
Route::post('/getgallery','Frontend\GalleryController@getGallery');
Route::post('/getlibrarytime','Frontend\LibraryTimeController@getLibraryTime');
Route::post('/getmission','Frontend\MissionController@getMission');
Route::post('/getfunction','Frontend\FunctionsController@getFunctions');
Route::post('/getactivities','Frontend\ActivitiesController@getActivities');
Route::post('/gettvroom','Frontend\TVRoomController@getTVRoom');
Route::post('/getAdministrative','Frontend\AdministrativeofficeController@getAdministrative');
Route::post('/getTechnicalDepartment','Frontend\TechnicaldepartmentController@getTechnicalDepartment');
Route::post('/getCopyRight','Frontend\CopyrightController@getCopyRight');
Route::post('/getStudentroomreading','Frontend\StudentreadingroomController@getStudentReadingRoom');
Route::post('/getbookexchange','Frontend\BookExchangeController@getBookExchange');
Route::post('/getrefrenceservice','Frontend\ReferenceserviceController@getRefrenceService');
Route::post('/getreadingcorner','Frontend\ReadingCornerController@getReadingCorner');
Route::post('/getSaleOldMagazine','Frontend\SaleOldMagazineController@getSaleOldMagazine');
Route::post('/getmanagementvillage','Frontend\ManagementVillageLibrariesController@getManagementVillage');
Route::post('/getaboutus','Frontend\AboutusController@getAboutus');
Route::post('/getachievement','Frontend\AchievementController@getAchievement');
//for user Signup and login API HP
Route::post('/register','Frontend\UserController@register');
Route::post('/login','Frontend\UserController@login');
Route::post('/savePassword','Frontend\UserController@savePassword');
Route::post('/forgotpassword','Frontend\UserController@forgotPassword');//forgotPassword
//updatepassword
Route::post('/updatepassword','Frontend\UserController@updatepassword');
//End here code for SignUp and Login API HP
Route::post('/savemembers','Frontend\MembershipContoller@saveMembership')->name('membership');//Save membership
Route::get('/getmembershipdetails/{userid}','Frontend\MembershipContoller@getMembershipFromLoginUser')->name('membership_dashboard');//getting Whole the memebership data from Login UserID
Route::post('/membershipdetail','Frontend\MembershipContoller@getMembershipFromMembershipID');//getting memebrship data from memebrshipID for Edit and Print
Route::post('/membershipedit','Frontend\MembershipContoller@editMembership');//updating memebrship data from memebrshipID 
Route::post('/finalmembership','Frontend\MembershipContoller@finalsubmitMembership');//Final attachment data as per the memebrshipID
Route::post('/viewquery','Frontend\MembershipContoller@viewMemebrshipQuery');//View memebrship query as per the memebershipID
Route::get('/getMemberApplicationType','Frontend\MemberApplicationTypeController@getMemberApplicationType');
Route::post('/payment','Frontend\MembershipContoller@changeMemebrshipStatus');//View memebrship query as per the memebershipID

//Route::post('/savemembers','Frontend\MembershipContoller@saveMembership')->name('membership');//Save membership
//Route::get('/getmembershipdetails/{userid}','Frontend\MembershipContoller@getMembershipFromLoginUser');//getting Whole the memebership data from Login UserID
//Route::post('/membershipdetail','Frontend\MembershipContoller@getMembershipFromMembershipID');//getting memebrship data from memebrshipID for Edit and Print
//Route::get('/getMemberApplicationType','Frontend\MemberApplicationTypeController@getMemberApplicationType');
//End FrontEnd Side API
Route::post('/eventdetails','Frontend\EventController@geteventdetails');
//Route::post('/harinCustomMethod','Frontend\EventController@getHarinMethod');

Route::post('/geteventgallery','Frontend\EventController@geteventgallery');
Route::post('/getprogramcalendar','Frontend\ProgramcalendarController@getProgramCalendar');

//domy API For Payment gatway
 Route::post('/paymentdata','Frontend\PaymentController@index');


 Route::get('/usercount','Frontend\UserController@NumberOfUsers');
Route::post('/paymentdetails','Frontend\MembershipContoller@getpaymentdetails');//getting Whole the memebership data from Login UserID

Route::post('/search','Frontend\SearchContoller@SearchString');//Search Whole string from database