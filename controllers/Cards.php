<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cards extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
     
    }
    
    
    function index()//Cards
    {

        $data['title'] = 'نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
        $data['metakeyword'] = 'نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
        $data['metadiscription'] = '  نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
        $this->load->view('gam3ia_omomia/card_v', $data);
    }
    
    
    }