<?php
defined('BASEPATH') or exit('No direct script access allowed');

$autoload['packages']   = array();
$autoload['libraries']  = array('session', 'form_validation', 'database', 'upload');
$autoload['drivers']    = array();
$autoload['helper']     = array('url', 'web_helper');
$autoload['config']     = array();
$autoload['language']   = array();
$autoload['model']      = array('ModelUser', 'ModelKelas', 'ModelMateri', 'ModelProgress', 'ModelQuiz');