<?php

use App\Models\Person;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'ANDRES JUNIOR APARCANA TASAYCO',
            'email' => 'aaparcana@autonoma.edu.pe',
            'idUserType' => 3,
            'idStatus' => 1,
            'password' => Hash::make('secret')
        ]);

        $person = new Person;

        $person->nombre = 'ANDRES JUNIOR';
        $person->apellidoPaterno = 'APARCANA';
        $person->apellidoMaterno = 'TASAYCO';
        $person->telefono = 987654321;
        $person->direccion = 'afasfas asff ff';
        $person->correo = 'aaparcana@autonoma.edu.pe';
        $person->imagen = '';
        $person->numero = 75321569; // ID CARD number
        $person->idDocumentType = 1; // ID CARD type

        $user->person()->save($person);
    }
}
