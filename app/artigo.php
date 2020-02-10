<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artigo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario', 'titulo', 'link',
    ];

    static function store(){
        $data = [
            'id_usuario' => request('id_usuario'),
            'titulo' => request('titulo'), 
            'link' => request('link'),
            ];
            
            artigo::create($data);
    }
    /*
    public function delete(artigo $artigo){
        $artigo->delete();
    }
    */
}
