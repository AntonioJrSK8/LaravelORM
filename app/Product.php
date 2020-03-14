<?php

namespace App;

use App\Scopes\AtivoScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /* lista branca para inserção */
    protected $fillable = ['title', 'description', 'ativo'];

    /* lista de campo calculado que são apenas virtual e podemos usar para retorno */
    protected $appends = ['resumo_title'];

    /* lista de campos ocultos */
    protected $hidden = ['title'];

    /**
     * rotina usado para criação de eventos disparados pelos modelos
     */
    protected $dispatchesEvents = [
        'created' => \App\Events\ProductsCreated::class,
        'creating' => \App\Events\ProductsCreating::class,
    ];


    protected static function boot()
    {
        parent::boot();
        /* Exemplo de como usar o scope simples
        //static::addGlobalScope('isAtivo', function(Builder $bilder){
        //        $bilder->where('ativo', 0);
        //});

        /* exemplode como usar o scope usando outra class */
        static::addGlobalScope(new AtivoScope);

    }

    /*Metodos Accessors */
    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }

    public function getResumoTitleAttribute($value)
    {
        if (asset($this->attributes['title'][3])) {
            return mb_substr($this->attributes['title'], 0, 3) . '...';
        }
        return strtoupper($value);
    }

    /*metodo Mutators*/
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtoupper($value);
    }
}
