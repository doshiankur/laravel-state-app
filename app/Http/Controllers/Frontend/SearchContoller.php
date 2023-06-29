<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SearchContoller extends Controller
{
    
    public function SearchString(Request $request){
        
        //dd("hi");//dd($request);
        
        $txtSearch=$request->input('search');
        $language_code=$request->input('language');
       //DB::enableQueryLog();
       $reqults=DB::select("SELECT strPageName,strTitle,strLanguageCode  FROM `mst_mission_vision`
                            WHERE (strTitle LIKE '%$txtSearch%' or strMissionVission like '%$txtSearch%' or strPageName like '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL 
                           UNION
                            SELECT strPageName,strDescription,strLanguageCode from mst_aboutus 
                            where (strDescription like '%$txtSearch%' or strPageName like '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL
                            UNION
                            SELECT strPageName,strDescription,strLanguageCode FROM `mst_achievement` 
                            where (strPageName LIKE '%$txtSearch%' or strDescription LIKE '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL
                            UNION
                            select strPageName,strActivities,strLanguageCode from mst_activities 
                            where (strActivities like '%$txtSearch%' or strPageName LIKE '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL
                            UNION
                            SELECT strPageName,strAdministrative,strLanguageCode FROM `mst_administrativeoffice`
                             where (strAdministrative like '%$txtSearch%' or strPageName LIKE '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL 
                            UNION
                            select strPageName,strBookExchange,strLanguageCode from mst_bookexchange 
                            where (strBookExchange like '%$txtSearch%' or strPageName LIKE '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL 
                            UNION
                            SELECT strPageName,strCopyright,strLanguageCode  FROM `mst_copyright` 
                            WHERE (`strCopyright` LIKE '%$txtSearch%' or strPageName LIKE '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL 
                            UNION
                            SELECT strPageName,strFunction,strLanguageCode from mst_functions 
                              WHERE (`strFunction` LIKE '%$txtSearch%' or strPageName LIKE '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL 
                            UNION
                            SELECT strPageName,str_introcontent,strLanguage FROM `mst_introduction`
                             where (str_introcontent LIKE '%$txtSearch%' or strPageName LIKE '%$txtSearch%' ) AND strLanguage='$language_code' and enmStatus='1' and deleted_at IS NULL
                            UNION
                            SELECT strPageName,strDesignation,strLanguageCode FROM `mst_leaders` 
                            where (strLeadersName like '%$txtSearch%' or strDesignation like '%$txtSearch%' or strPageName LIKE '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL
                            UNION
                            SELECT strPageName,strManagementVillagelibraries,strLanguageCode FROM `mst_managementofvillagelibraries` 
                                where (strManagementVillagelibraries like '%$txtSearch%' or strPageName like '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL
                            UNION
                            SELECT strPageName,strReadingCorner,strLanguageCode FROM `mst_readingcorner` 
                                where (strReadingCorner like '%$txtSearch%' or strPageName like '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL 
                            UNION
                            SELECT strPageName,strReferenceService,strLanguageCode FROM `mst_referenceservice` 
                                where (strReferenceService like '%$txtSearch%' or strPageName LIKE '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL 
                            UNION
                            SELECT strPageName,strSaleofOldMagazines,strLanguageCode FROM `mst_saleofoldmagazines` 
                                WHERE (strSaleofOldMagazines like '%$txtSearch%' or strPageName like '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL
                            UNION
                            SELECT strPageName,strStudentreadingroom,strLanguageCode FROM `mst_studentreadingroom` 
                                where (strStudentreadingroom like '%$txtSearch%' or strPageName like '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL
                            UNION
                            SELECT strPageName,strTechnical,strLanguageCode FROM `mst_technicaldepartment`
                                 where (strTechnical like '%$txtSearch%' or strPageName like '%$txtSearch%')
                                    AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL 
                            UNION
                            SELECT strPageName,strTVRoom,strLanguageCode FROM `mst_tvroom` 
                            where (strTVRoom like '%$txtSearch%' or strPageName like '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL

                            union 
                           SELECT strPageName,strLibraryMessage,strLanguageCode FROM `mst_librarian_desk`
                            where (strLibraryMessage like '%$txtSearch%' 
                                   or strPageName like '%$txtSearch%') 
                            AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL
                            UNION
                            SELECT strPageName,strTitle,strLanguageCode FROM `mst_programcalendar` 
                                where (strTitle like '%$txtSearch%' or strPageName like '%$txtSearch%') AND strLanguageCode='$language_code' and enmStatus='1' and deleted_at IS NULL
                            UNION 
                            SELECT strPageName,strEventTitile,strLanguageCode  FROM `mst_upcoming_event`
                              where (strEventTitile like '%$txtSearch%' 
                                     or strPageName like '%$txtSearch%' or strEventDescription like '%$txtSearch%') 
                              AND strLanguageCode='$language_code' and enmStatus='1' 
                              and deleted_at IS NULL
                           UNION
                           SELECT strPageName,str_content,strLanguage  FROM `mst_announcement`
                           where (str_content like '%$txtSearch%' or strPageName like '%$txtSearch%') 
                              AND strLanguage='$language_code' and enmStatus='1' 
                              and deleted_at IS NULL
                          UNION
                           SELECT strPageName,str_content,strLanguage  FROM `mst_libraryTime`
                           where (strPageName like '%$txtSearch%' or str_content like '%$txtSearch%') 
                              AND strLanguage='$language_code' and enmStatus='1' 
                              and deleted_at IS NULL

                           UNION
                           
                           SELECT strPageName,strName,strLanguageCode FROM `mst_event` WHERE (`strName` LIKE '%$txtSearch%' or strPageName like '%$txtSearch%' 
                                    or txtVenue like '%$txtSearch%') 
                           AND strLanguageCode='$language_code' and enmStatus='1' 
                           and enmDeleted='0'
                           UNION  

                        SELECT strPageName,strCommonPage,strLanguageCode FROM `mst_common_pages` 
                                where (strCommonPage like '%$txtSearch%' or strPageName like '%$txtSearch%') 
                                    AND strLanguageCode='$language_code'");

//echo "<pre>";print_r(DB::getQueryLog());exit;
              $page_array = array(
                                  array('pagename_gu'=>'અમારા વિશે',
                                        'pagename_en'=>'About Us',
                                        'pageurl'=>'aboutus'),

                                  array('pagename_gu'=>'પરિચય',
                                        'pagename_en'=>'Introduction',
                                        'pageurl'=>'introduction'),

                                  array('pagename_gu'=>'મિશન અને વિઝન',
                                        'pagename_en'=>'Mission and Vision',
                                        'pageurl'=>'missionandvision'),

                                  array('pagename_gu'=>'પ્રવૃતિઓ',
                                        'pagename_en'=>'Activities',
                                        'pageurl'=>'activities'),

                                  array('pagename_gu'=>'કાર્યો',
                                        'pagename_en'=>'Functions',
                                        'pageurl'=>'functions'),

                                  array('pagename_gu'=>'સિધ્ધિઓ',
                                        'pagename_en'=>'Achievements',
                                        'pageurl'=>'achievement'),

                                  array('pagename_gu'=>'ટી.વી. કક્ષ',
                                        'pagename_en'=>'T.V. Room',
                                        'pageurl'=>'tvroom-section'),

                                  array('pagename_gu'=>'કોપીરાઇટ વિભાગ',
                                        'pagename_en'=>'Copyright Section',
                                        'pageurl'=>'copyright-section'),

                                  array('pagename_gu'=>'વિદ્યાર્થી વાંચનખંડ',
                                        'pagename_en'=>'Reading Hall',
                                        'pageurl'=>'readinghallforboys-service'),
                                 
                                  array('pagename_gu'=>'જ્ઞાન કેન્દ્ર',
                                        'pagename_en'=>'Knowledge Center',
                                        'pageurl'=>'knowledgecenter') ,

                                 array('pagename_gu'=>'પુસ્તક આપ-લે',
                                        'pagename_en'=>'Books Issue-Return',
                                        'pageurl'=>'books-issue-return'),

                                 array('pagename_gu'=>'સામાયિક/સમાચારપત્ર વાંચનાલય સેવા',
                                        'pagename_en'=>'Magazine / Newspaper Library Service',
                                        'pageurl'=>'newspaperreadinglibraryservice'),

                                 array('pagename_gu'=>'સંદર્ભ સેવા',
                                        'pagename_en'=>'Reference Services',
                                        'pageurl'=>'referenceservice'),
                                 
                                 array('pagename_gu'=>'દિવ્યાંગજનોને ગ્રંથાલય અને માહિતી સેવા',
                                        'pagename_en'=>'Library and information service for the disabled',
                                        'pageurl'=>'library-and-information-service-for-disabled'),

                                 array('pagename_gu'=>'રીડીંગ કોર્નર',
                                        'pagename_en'=>'Reading Corner',
                                        'pageurl'=>'readingcorner'),

                                 array('pagename_gu'=>'જૂના સામાયિકોનું વેચાણ',
                                        'pagename_en'=>'Sale of Old Magazine',
                                        'pageurl'=>'saleofoldmagazines'),                                

                                 array('pagename_gu'=>'ગ્રામ ગ્રંથાલયોનું સંચાલન',
                                        'pagename_en'=>'Management of Village Libraries',
                                        'pageurl'=>'managementofvillagelibraries'),

//static page section start here
                                 array('pagename_gu'=>'વિદ્યાર્થી વાંચનખંડ',
                                        'pagename_en'=>'Reading Hall for Boys',
                                        'pageurl'=>'readinghallforboys-section'),

                                 array('pagename_gu'=>'જ્ઞાન કેન્દ્ર વિભાગ',
                                        'pagename_en'=>'Knowledge Center Section',
                                        'pageurl'=>'knowledgecenter-section'), 

                                 array('pagename_gu'=>'દિવ્યાંગ વિભાગ',
                                        'pagename_en'=>'Braille Section',
                                        'pageurl'=>'braille-section'), 

                                 array('pagename_gu'=>'ગુજરાતી પુસ્તક આપ-લે વિભાગ',
                                     'pagename_en'=>'Gujarati Books Issue-Return',
                                     'pageurl'=>'gujarati-book-issue-return-section'), 

                                 array('pagename_gu'=>'હિન્દી અને અંગ્રેજી પુસ્તક આપ-લે વિભાગ',
                                        'pagename_en'=>'Hindi & English Books Issue-Return',
                                        'pageurl'=>'hindi-english-book-issue-return-section'), 

                                 array('pagename_gu'=>'બાળ વિભાગ',
                                        'pagename_en'=>'Children Section',
                                        'pageurl'=>'children-section'), 

                                 array('pagename_gu'=>'સામાયિક/સમાચારપત્ર વિભાગ',
                                        'pagename_en'=>'Magazine/Newspaper Section',
                                        'pageurl'=>'magazine-newspaper-section'), 

                                 array('pagename_gu'=>'સંદર્ભ સાહિત્ય વિભાગ',
                                        'pagename_en'=>'Reference Section',
                                        'pageurl'=>'reference-section'),
                                                                         
                                 array('pagename_gu'=>'વહીવટી કાર્યાલય',
                                        'pagename_en'=>'Administrative Office',
                                        'pageurl'=>'administrativeoffice-sections'), 

                                 array('pagename_gu'=>'ટી.વી. કક્ષ',
                                        'pagename_en'=>'T.V. Room',
                                        'pageurl'=>'tvroom-section'), 

                                 array('pagename_gu'=>'વિદ્યાર્થીનીઓનો અધ્યયન કક્ષ',
                                        'pagename_en'=>'Reading Hall for Girls',
                                        'pageurl'=>'readinghallforgirls-section'), 

                                 array('pagename_gu'=>'વહીવટી કાર્યાલય',
                                        'pagename_en'=>'Administrative Office',
                                        'pageurl'=>'administrativeoffice-sections'),

                                 array('pagename_gu'=>'વહીવટી કાર્યાલય',
                                        'pagename_en'=>'Administrative Office',
                                        'pageurl'=>'administrativeoffice-sections'),

                                 array('pagename_gu'=>'તકનીકી વિભાગ',
                                        'pagename_en'=>'Technical Section',
                                        'pageurl'=>'technical-section'),

                                 array('pagename_gu'=>'ફરતું પુસ્તકાલય વિભાગ',
                                        'pagename_en'=>'Mobile Library Section',
                                        'pageurl'=>'mobilelibrary-section'), 

                                  array('pagename_gu'=>'રીડીંગ કોર્નર વિભાગ',
                                        'pagename_en'=>'Reading Corner Section',
                                        'pageurl'=>'readingcorner-section'), 

                                 array('pagename_gu'=>'સભ્ય બનો',
                                        'pagename_en'=>'Membership',
                                        'pageurl'=>'membership'), 

                                  array('pagename_gu'=>'નાગરિક અધિકારપત્ર',
                                        'pagename_en'=>'Civil Rights Charter',
                                        'pageurl'=>'civilrights'),

                                  array('pagename_gu'=>'ફોટો ગેલેરી',
                                        'pagename_en'=>'Photo Gallery',
                                        'pageurl'=>'photogallery'),

                                  array('pagename_gu'=>'વિડિયો ગેલેરી',
                                        'pagename_en'=>'Video Gallery',
                                        'pageurl'=>'video_gallery'),

                                  array('pagename_gu'=>'સંપર્ક માહિતી',
                                        'pagename_en'=>'Contact Information',
                                        'pageurl'=>'contactinformation'),
                                  array('pagename_gu'=>'વહીવટી માળખું',
                                        'pagename_en'=>'Administrative Structure',
                                        'pageurl'=>'administrativestructuresss'),
                                  array('pagename_gu'=>'ફરતા પુસ્તકાલયની સેવા',
                                        'pagename_en'=>'Mobile Library Service',
                                        'pageurl'=>'mobilelibraryservice'),
                                  array('pagename_gu'=>'કાર્યક્રમ કેલેન્ડર – ૨૦૨૨',
                                        'pagename_en'=>'Programme Calendar – 2022',
                                        'pageurl'=>'programcalendar'),
                                  array('pagename_gu'=>'નેતાઓ',
                                        'pagename_en'=>'Leaders',
                                        'pageurl'=>'leader_section'),
                                  array('pagename_gu'=>'ગ્રંથપાલના ડેસ્ક પરથી',
                                        'pagename_en'=>"From Librarian's Desk",
                                        'pageurl'=>'librarian_desk'),
                                  array('pagename_gu'=>'આગામી ઇવેન્ટ',
                                        'pagename_en'=>"Upcoming Event",
                                        'pageurl'=>'all_upcomingevents'),

                                  array('pagename_gu'=>'જાહેરાત',
                                        'pagename_en'=>"Announcement",
                                        'pageurl'=>'all_announcement'),

                                  array('pagename_gu'=>'ગ્રંથાલય સમય',
                                        'pagename_en'=>"Library Time",
                                        'pageurl'=>'library_time')
                              );
             //dd($page_array);
             //$key = array_search('મિશન અને વિઝન', array_column($page_array, 'name'));
             //echo $page_array[$key]['url'];exit;
//dd($reqults);
$array_unique=array_unique(array_column($reqults, 'strPageName'));
$new_array=array_intersect_key($reqults, $array_unique);
//echo sizeof($new_array);
$final_print_array=array_values($new_array);
//echo "<pre>";print_r($final_print_array);exit;
        for($i=0;$i<sizeof($final_print_array);$i++){             
            //echo $reqults[$i]->strPageName."<br>";
              //if(in_array($reqults[$i]->strPageName,$page_array)){
               // echo "sfsdaf";exit;
                     $data[$i]['strPageName']=$final_print_array[$i]->strPageName;
                     $data[$i]['strTitle']=$final_print_array[$i]->strTitle;
                     $data[$i]['strLanguageCode']=$final_print_array[$i]->strLanguageCode;
                     
                   if($data[$i]['strLanguageCode']=='gu'){                         
                    $page_key = array_search($final_print_array[$i]->strPageName, array_column($page_array, 'pagename_gu'));
                   }else{
                   $page_key = array_search($final_print_array[$i]->strPageName, array_column($page_array, 'pagename_en'));
                     }

                      $data[$i]['pageURL']=$page_array[$page_key]['pageurl'];
              //}             
         }
         if(sizeof($reqults)>0){
         return response()->json(['status'=>200,
                                 'content'=>$data,
                                 'message'=>'Search Content Successfully']);
         }else{
         
         $data='not found';
         return response()->json(['status'=>404,
                                 'content'=>$data,
                                 'message'=>'Search Content Not Found']);
         }
       
    }
}