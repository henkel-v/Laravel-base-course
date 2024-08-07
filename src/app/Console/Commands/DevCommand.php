<?php

namespace App\Console\Commands;

use App\Models\Avatar;
use App\Models\Client;
use App\Models\Department;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Review;
use App\Models\Tag;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Console\Command;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dev command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//         $this->prepareData();
//         $this->prepareManyToMany();

        $worker = Worker::find(1);
        $client = Client::find(2);

//        $worker->tags()->attach([1, 2]);
//        $client->tags()->attach([1, 3]);

        $tag = Tag::find(1);

        dd($tag->clients->toArray());
    }

    protected function  prepareData(): void
    {

        Client::create([
            'name' => 'Bob'
        ]);
        Client::create([
            'name' => 'Nill'
        ]);
        Client::create([
            'name' => 'Tagil'
        ]);

        $department1 = Department::create([
            'title' => 'IT Department',
        ]);
        $department2 = Department::create([
            'title' => 'Manage Department',
        ]);

        $position1 = Position::create([
            'title' => 'Developer',
            'department_id' => $department1->id,
        ]);
        $position2 = Position::create([
            'title' => 'Manager',
            'department_id' => $department2->id,
        ]);
        $position3 = Position::create([
            'title' => 'Designer',
            'department_id' => $department1->id,
        ]);

        $workerInfo1 = [
            'name' => 'Walter',
            'surname' => 'White',
            'position_id' => $position1->id,
            'email' => 'ww@gmail.com',
            'age' => '45',
            'description' => 'Say my name...',
            'is_married' => true,
        ];
        $workerInfo2 = [
            'name' => 'Gus',
            'surname' => 'Fring',
            'position_id' => $position2->id,
            'email' => 'callmegus@gmail.com',
            'age' => '43',
            'description' => 'Call me Gus',
            'is_married' => false,
        ];
        $workerInfo3 = [
            'name' => 'Saul',
            'surname' => 'Goodman',
            'position_id' => $position3->id,
            'email' => 'bettercallsaul@gmail.com',
            'age' => '40',
            'description' => 'Better Call Saul!!!',
            'is_married' => false,
        ];
        $workerInfo4 = [
            'name' => 'Mike',
            'surname' => 'Ehrmantraut',
            'position_id' => $position1->id,
            'email' => 'mike@gmail.com',
            'age' => '40',
            'description' => 'We had a good thing, you stupid son of a bitch!',
            'is_married' => false,
        ];
        $workerInfo5 = [
            'name' => 'Jesse',
            'surname' => 'Pinkman',
            'position_id' => $position2->id,
            'email' => 'YoooJesseMan@gmail.com',
            'age' => '40',
            'description' => 'Yeah Mr Bitch! Magnet science!',
            'is_married' => false,
        ];
        $workerInfo6 = [
            'name' => 'Tuco',
            'surname' => 'Salamanca',
            'position_id' => $position3->id,
            'email' => 'killyoubitch@gmail.com',
            'age' => '40',
            'description' => 'DAMN MAN, LOOK AT THAT, LOOK!!!',
            'is_married' => false,
        ];

        $worker1 = Worker::create($workerInfo1);
        $worker2 = Worker::create($workerInfo2);
        $worker3 = Worker::create($workerInfo3);
        $worker4 = Worker::create($workerInfo4);
        $worker5 = Worker::create($workerInfo5);
        $worker6 = Worker::create($workerInfo6);

        $profileInfo1 = [
            'worker_id' => $worker1->id,
            'city' => 'Albuquerque',
            'exp' => 20,
        ];
        $profileInfo2 = [
            'worker_id' => $worker2->id,
            'city' => 'Albuquerque',
            'exp' => 20,
        ];
        $profileInfo3 = [
            'worker_id' => $worker3->id,
            'city' => 'Albuquerque',
            'exp' => 7,
        ];
        $profileInfo4 = [
            'worker_id' => $worker4->id,
            'city' => 'Albuquerque',
            'exp' => 10,
        ];
        $profileInfo5 = [
            'worker_id' => $worker5->id,
            'city' => 'New-York City',
            'exp' => 5,
        ];
        $profileInfo6 = [
            'worker_id' => $worker6->id,
            'city' => 'Mexico',
            'exp' => 3,
        ];

        $worker1->profile()->create($profileInfo1);
        $worker2->profile()->create($profileInfo2);
        $worker3->profile()->create($profileInfo3);
        $worker4->profile()->create($profileInfo4);
        $worker5->profile()->create($profileInfo5);
        $worker6->profile()->create($profileInfo6);
    }

    public function prepareManyToMany(): void
    {
        $workerBackend  = Worker::find(1);
        $workerManager = Worker::find(2);
        $workerDesigner = Worker::find(3);
        $workerFrontend = Worker::find(4);
        $workerManager2 = Worker::find(5);
        $workerDesigner2 = Worker::find(6);

        $project1 = Project::create([
            'title' => "Shop",
        ]);
        $project2 = Project::create([
            'title' => "Landing",
        ]);

        $project1->workers()->attach([
            $workerBackend->id,
            $workerFrontend->id,
            $workerManager->id,
            $workerDesigner->id
        ]);

        $project2->workers()->attach([
            $workerBackend->id,
            $workerFrontend->id,
            $workerManager2->id,
            $workerDesigner2 ->id
        ]);

    }
}
