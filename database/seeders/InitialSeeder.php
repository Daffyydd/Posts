<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Salutation;
use App\Models\Relationship;
use App\Models\User;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salutations = ['Mr', 'Mrs', 'Ms', 'Miss', 'Mst', 'Hon', 'Dr', 'Prof', 'HE'];
        $relationships = ['Spouse', 'Father', 'Mother', 'Son', 'Daughter', 'Mother-in-law', 'Father-in-law', 'Sister-in-law', 'Brother-in-law', 'Step-Father', 'Step-Mother', 'Step-Brother', 'Step-Sister', 'Guardian', 'Cousin'];

        foreach ($salutations as $salutation) {
            Salutation::create([
                'salutation_name' => $salutation,
            ]);
        }        
        foreach ($relationships as $relationship) {
            Relationship::create([
                'relationship_name' => $relationship,
            ]);
        }

        $user =User::create([
            'name'=>'David Nyakundi',
            'email' => 'd@gmail.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);
    }
}