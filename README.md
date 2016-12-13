# Validators Zend Framework
Quem nunca teve a necessidade de validar CPF, CNPJ e data. Claro que a maioria, pois são informações muito comuns no dia a dia, o intuito deste reposiório é facilitar a validação no Zend Framework, oferecendo maior agilidade para o seu desenvolvimento.

Esta library, contempla:
   - CPF
   - CNPJ
   - Data (pt-br)

# Install

##### Composer

```
composer require diego-brocanelli/validators-zf dev-master
```
ou inserindo no arquivo composer.json e executando comando composer install.
```
{
    "require": {
        "diego-brocanelli/validators-zf":"dev-master"
    }
}
```

# Tests
```
php phpunit.phar tests/
```

# CPF Validator - Implementação na entity ZF .
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
                        'name' => 'DiegoBrocanelli\Validators\CPF' // Inserir a namespace.
                    ),
                ),
            ));
```

# CNPJ Validator - Implementação na entity ZF .
```
$inputFilter->add(array(
                'name'     => 'cnpj',
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
                            'min'      => 14,
                            'max'      => 14,
                        ),
                    ),
                    array(
                        'name' => 'DiegoBrocanelli\Validators\CNPJ' // Inserir a namespace.
                    ),
                ),
            ));
```
   
# To-do list  

* [X] CPF
* [X] CNPJ
* [ ] Date