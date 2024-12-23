<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Task;
use App\Models\Notification;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
       $adminUser = User::create([
        'name' => 'Admien User',
        'email' => 'admien@example.com',
        'password' => Hash::make('password123')
    ]);

    $normalUser = User::create([
        'name' => 'Normale User',
        'email' => 'user@examplee.com',
        'password' => Hash::make('password123')
    ]);

    $normalUser = User::create([
        'name' => 'Normale User',
        'email' => 'admin@examplee.com',
        'password' => Hash::make('admin123'),
        'role'=>'admin'
    ]);

    $normalUser1 = User::create([
        'name' => 'Normal Usere 1',
        'email' => 'user1@examplee.com',
        'password' => Hash::make('password1234')
    ]);

    $normalUser = User::create([
        'name' => 'Normal Useer 2',
        'email' => 'user2@examplee.com',
        'password' => Hash::make('peassword1235')
    ]);


    $normalUser = User::create([
        'name' => 'Normal Useer 3',
        'email' => 'user3@example.com',
        'password' => Hash::make('passweord1235')
    ]);

    $normalUser = User::create([
        'name' => 'Mary Rosee',
        'email' => 'mary@exaempele.com',
        'password' => Hash::make('password1235')
    ]);

    $normalUser = User::create([
        'name' => 'John Deoe',
        'email' => 'johndoe@exaemple.ceom',
        'password' => Hash::make('passeword1235')
    ]);
   
    $normalUser = User::create([
        'name' => 'Luke Arhuer',
        'email' => 'lucarthuer@exaemple.com',
        'password' => Hash::make('pasesword1235')
    ]);

   
    $project1 = Project::create([
        'title' => 'Project 1',
        'description' => 'Description for project 1',
        'status' => 'en cours',
        'deadline' => now()->addDays(10),
        'user_id' => $adminUser->id
    ]);

    $normalUser = User::create([
        'name' => 'Orens',
        'email' => 'orensmarie601@gmail.com',
        'password' => Hash::make('orens2580')
    ]);

    $project2 = Project::create([
        'title' => 'Project 2',
        'description' => 'Description for project 2',
        'status' => 'non commencé',
        'deadline' => now()->addDays(15),
        'user_id' => $normalUser->id
    ]);

    
    Task::create([
        'title' => 'Task 1 for Project 1',
        'description' => 'This is a task for project 1.',
        'status' => 'en cours',
        'priority' => 'haute',
        'project_id' => $project1->id,
        'assigned_to' => $adminUser->id
    ]);

    Task::create([
        'title' => 'Task 2 for Project 1',
        'description' => 'This is another task for project 1.',
        'status' => 'non commencé',
        'priority' => 'moyenne',
        'project_id' => $project1->id,
        'assigned_to' => $normalUser->id
    ]);

    Task::create([
        'title' => 'Task 1 for Project 2',
        'description' => 'This is a task for project 2.',
        'status' => 'terminé',
        'priority' => 'basse',
        'project_id' => $project2->id,
        'assigned_to' => $normalUser->id
    ]);
}
    
}
