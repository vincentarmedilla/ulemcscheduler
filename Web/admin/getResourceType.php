<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$data = Array ( 
        array('1' => 'package1'),
        array('2' => 'package2'),
        array('3' => 'package3')
    );

    $datas = json_encode($data);
    echo str_replace("\"", "'", $datas);

