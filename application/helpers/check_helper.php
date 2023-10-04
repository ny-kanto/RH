<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
//function which treats the words
function traitWord ($word){
    $word=trim($word);
    //Remplacement des lettres invalide
    $word = strtr($word,  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');

     // Remplacement des -@#$$%^&*&*(())
    $word = preg_replace('/([^.a-z0-9]+)/i', '-', $word);
    return $word;

 }
 
//  function which treats the number
 function traitNumber($num){
    
    if(!is_numeric($num)){
        return "Un nombre ne doit pas contenir de lettre";
    }
    else if($num < 0){
        return "La valeur ne doit pas etre negative";
    }
    return $num;

}
//  function which treats date
function traitDate($date){
    $dateAujourdhui = date('Y-m-d');
    if($date <=  $dateAujourdhui){
        return "La date doit etre après aujourd\'hui";
    }
    return $date;
}