<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client extends Model
{
    use SoftDeletes;
    protected $fillable = ['nom', 'prenom','solde','photo', 'cni','date_naissance','lieu_naissance','profession','sexe','telephone','email','mdp'];
}
