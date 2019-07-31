<?php

namespace App\Observers;

use App\Categorias;
use App\Observers\Utils\UploadTrait;

class CategoriasObserver
{
    use UploadTrait;

    protected $field = 'foto';
    protected $path = 'img';

    public function creating(Categorias $model)
    {
        $this->createFile($model);
    }

    public function deleting(Categorias $model)
    {
        $this->removeFile($model->foto);
    }

    public function updating(Categorias $model)
    {
        $this->updateFile($model);
    }
}
