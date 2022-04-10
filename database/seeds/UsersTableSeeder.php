<?php
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('role_user')->truncate();
        $admin = User::create([
            'name' => 'admin',
            'phone_number' => '216',
            'address' => 'Tunis',
            'postcode' => '7000',
            'state' => 'Tunis',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678')
        ]);

        
        $adminRole = Role::where('name', 'admin')->first();
        
        $admin->roles()->attach($adminRole);
        
  }
}
