<?php
namespace Database\Seeders;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('Classrooms')->delete();
        $Classrooms = [
            ['en'=> 'First grade', 'ar'=> 'الصف الاول'],
            ['en'=> 'Second grade', 'ar'=> 'الصف الثاني'],
            ['en'=> 'Third grade', 'ar'=> 'الصف الثالث'],
        ];

        foreach ($Classrooms as $Classroom) {
            Classroom::create([
            'Name_Class' => $Classroom,
            'Grade_id' => Grade::all()->unique()->random()->id
            ]);
        }
    }
}