<?php
/**
 * Created by PhpStorm.
 * User: Silvio Leite
 * Date: 19/06/2018
 * Time: 09:52
 */
namespace App\Criteria;

trait CriteriaTrashedTrait {

    public function onlyTrashed(){
        $this->pushCriteria(FindOnlyTrashedCriteria::class);
        return $this;
    }

    public function withTrashed(){
        $this->pushCriteria(FindWithTrashedCriteria::class);
        return $this;
    }
}
