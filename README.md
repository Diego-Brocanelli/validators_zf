# Validators Zend Framework
Quem nunca teve a necessidade de validar CPF, CNPJ e data. Claro que a maioria, pois são informações muito comuns no dia a dia, o intuito deste reposiório é facilitar a validação no Zend Framework, tranzendo com isso mais agilidade em seu desenvolvimento.

Esta library, contempla:
   - CPF
   - CNPJ
   - Data (pt-br)

# Intall
##### Composer
Packagists
```
composer require 
```
Na raiz do projeto, execute o comando.
```
composer install
```

# Tests
```
php phpunit.phar tests/
```

# Implementação na entity ZF.
```
$inputFilter->add(array(
                'name'     => 'cpf',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 11,
                            'max'      => 11,
                        ),
                    ),
                    array(
                        'name' => 'DiegoBrocanelli\Validators\CPF' // basta somente inserir a namespace.
                    ),
                ),
            ));
```
   
# To-do list  

* [X] CPF
* [] CNPJ
* [] Date