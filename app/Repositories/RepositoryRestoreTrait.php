<?php
/**
 * Created by PhpStorm.
 * User: Silvio Leite
 * Date: 19/06/2018
 * Time: 10:21
 */

namespace App\Repositories;

trait RepositoryRestoreTrait {

    public function restore($id){
        $this->applyScope();

        $temporarySkipPresenter = $this->skipPresenter;
        $this->skipPresenter(true);

        $model = $this->find($id);

        $this->skipPresenter($temporarySkipPresenter);
        $this->resetModel();

        $model->restore();
    }
}