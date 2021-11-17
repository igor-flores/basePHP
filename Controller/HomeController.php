<?php


class HomeController
{
    function index()
    {
        $render = new Render();
        $render->setTitle('titulo');
        $form = new FormBuilder(
            array(
                'title' => 'Registre-se',
                'action' => '.',
                'size' => 6,
                'inputs' => array(
                    array(
                        'type' => 'text',
                        'title' => 'Nome',
                        'name' => 'nome'
                    ),
                    array(
                        'type' => 'email',
                        'title' => 'Email',
                        'name' => 'email'
                    ),
                    array(
                        'type' => 'password',
                        'title' => 'Senha',
                        'name' => 'senha'
                    )
                ),
                'btnSave' => array(
                    'title' => 'Registrar',
                    'class' => 'btn-outline-success'
                )
            )
        );
        
        $render->writeOnBody($form->getForm());
        $render->show();
        
    }

}