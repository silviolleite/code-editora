<?php
/**
 * Created by PhpStorm.
 * User: Silvio Leite
 * Date: 19/06/2018
 * Time: 09:52
 */
namespace App\Criteria;

trait CriteriaOnlyTrashedTrait {

    public function onlyTrashed(){
        $this->pushCriteria(FindOnlyTrashedCriteria::class);
        return $this;
    }
}
