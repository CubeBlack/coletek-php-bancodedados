<?php
include_once "app/config.php";
include_once "autoload.php";

echo "Sistema basico de testes unitarios\n\n";

function executar_teste_por_instancia_e_metodo($instance, $methodName){
    echo "{$methodName}()\n";

    $instance->$methodName(); 
    
    echo "--\n";
}

function executar_teste_por_nome_da_classe(string $test_class_name){
    
    $test_file = "app/tests/${test_class_name}.php";
        
    echo "Executar: ${test_file}\n";
    
    include_once "app/tests/${test_class_name}.php";
    $instance = new $test_class_name();

    $reflectionClass = new ReflectionClass($instance);
    $metodos = $reflectionClass->getMethods(ReflectionMethod::IS_PUBLIC);
    
    foreach ($metodos as $metodo) {
        $methodName = $metodo->getName();
        executar_teste_por_instancia_e_metodo($instance, $methodName);
    }
}

function listar_e_executar_testes(){
    
    $test_list_str = file_get_contents('app/test_list.json');
    $test_list_arr = json_decode($test_list_str);
    
    foreach ($test_list_arr as $test_class_name) {
        executar_teste_por_nome_da_classe($test_class_name);
    }
}

listar_e_executar_testes();



