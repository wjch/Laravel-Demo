<?php
class Paper extends Eloquent{

    protected $tabel ="comments";


    public function user()
    {
        return $this->belongsTo('User', 'id');
    }

}