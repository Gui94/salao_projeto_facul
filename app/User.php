<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Pedido;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','sobrenome', 'email','password','telefone_residencial', 'telefone_celular','endereco'];

    
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pedidos() {
        return $this->belongsTo(Pedido::class);
    }



    
}
