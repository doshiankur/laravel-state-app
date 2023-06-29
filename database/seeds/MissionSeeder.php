<?php
namespace Database\Seeds;


use Illuminate\Database\Seeder;
use App\Http\Models\MissionVission;
use Illuminate\Support\Facades\DB;

class MissionSeeder extends Seeder 
{
      /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        DB::table('mst_mission_vision')->insert([
          'strMissionVission'=>'સમાજના તમામ વર્ગના લોકોને જાહેર ગ્રંથાલય સેવા પૂરી પાડવી. સામાન્ય પ્રજાજનો ઉપરાંત વિશિષ્ટ વર્ગો જેવા કે અંધજનો, વૃધ્ધો, બાળકો, મહિલાઓ વગેરેને જાહેર ગ્રંથાલય સેવાઓ સહજ પ્રાપ્ત બને તે રીતે પ્રજાને જાહેર ગ્રંથાલય સેવાથી સાંકળી લેવી.',
          'strLanguageCode'=>'gu'
        ]);
    }
}
?>