<?php

use Phinx\Seed\AbstractSeed;

class Usuarios extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'name'      => $faker->name,
                'password'  => password_hash('123', PASSWORD_DEFAULT),
                'email'     => $faker->email,
                'role'      => 'admin',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ];
        }

        $this->insert('usuarios', $data);
    }
}
