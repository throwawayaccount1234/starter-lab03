<?php

/**
 * Our Bingo page. Shows an anonymous author (picture, name and quote).
 * 
 * controllers/Bingo.php
 *
 * ------------------------------------------------------------------------
 */
class Bingo extends Application {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        
        // build author Socrates (name, quote, and image) to pass on to our view
        $record = $this->quotes->get('5');
        $author = array('who' => $record['who'], 'mug' => $record['mug'], 'what' => $record['what']);

        $this->data = array_merge($this->data, $author);

        $this->render();
    }
}