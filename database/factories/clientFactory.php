<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'nom' => $faker->name(5, true),
        'prenom' => $faker->name(5,true),
        'cni' => $faker->sentence(),
        'date_naissance'=>$faker->date(),
        'lieu_naissance'=>$faker->sentence(),
        'profession'=>$faker->sentence(5),
        'sexe'=>$faker->randomElement(["male", "female"]),
        'photo'=>'https://via.placeholder.com/150',
        'mdp'=>'123456',
        'telephone'=>$faker->numberBetween(457,800),
        'email'=>$faker->email(),
        'solde'=>$faker->numberBetween(457,800),
    ];
});

