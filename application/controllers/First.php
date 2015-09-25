<?php

/**
 * Our First page. Shows the first author (picture, name and quote).
 * 
 * controllers/First.php
 *
 * ------------------------------------------------------------------------
 */
class First extends Application {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        
        // build the author (name, quote, and image) to pass on to our view
        $record = $this->quotes->first();
        $author = array('who' => $record['who'], 'mug' => $record['mug'], 'what' => $record['what']);

        $this->data = array_merge($this->data, $author);

        $this->render();
    }

    // called by route "sleep" 
    function zzz() {
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        
        // build Bob Monkhouse (name, quote, and image) to pass on to our view
        $record = $this->quotes->get('1');
        $author = array('who' => $record['who'], 'mug' => $record['mug'], 'what' => $record['what']);

        $this->data = array_merge($this->data, $author);

        $this->render();
    }
}
