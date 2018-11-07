<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'todo', 'ready'
    ];

    /**
     * Retorna el usuario como array
     * 
     * @return array
     */
    public function toArray(){
        return [
            'todo'=> $this->todo,
            'ready'=> $this->ready,
            'id' =>$this->id
        ];
    }
}
