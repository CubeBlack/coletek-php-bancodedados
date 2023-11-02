<?php
class Fake{
    static function makeName(){
        $firstNames = ['John', 'Jane', 'Michael', 'Emily', 'David', 'Sarah'];
        $lastNames = ['Smith', 'Johnson', 'Williams', 'Brown', 'Jones', 'Davis'];
    
        $randomFirstName = $firstNames[array_rand($firstNames)];
        $randomLastName = $lastNames[array_rand($lastNames)];
    
        return $randomFirstName . ' ' . $randomLastName;
    }

    static function makeEmail(){
        $firstNames = ['John', 'Jane', 'Michael', 'Emily', 'David', 'Sarah'];
        $lastNames = ['Smith', 'Johnson', 'Williams', 'Brown', 'Jones', 'Davis'];
        $host = ['hotmail.com', 'gmail.com', 'uol.com.br'];
    
        $randomFirstName = $firstNames[array_rand($firstNames)];
        $randomLastName = $lastNames[array_rand($lastNames)];
        $host = $host[array_rand($host)];
    
        return "{$randomFirstName}{$randomLastName}@{$host}";
    }
}