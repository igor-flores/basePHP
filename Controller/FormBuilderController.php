<?php

class FormBuilderController
{
    public function index()
    {
        
        $render = new Render();
        $render->setTitle('FormBuilder::Construtor de formulários');
        
        $render->writeOnBody('
            <h2> class FormBuilder</h2>
            Métodos:
            <ul>
                <li> <code>__construct($form = array())</code> </li>
                <li> <code>getForm()</code> </li>
            </ul>
            
        ');
        $render->show();
    }

    public function example()
    {
        $render = new Render();
        $render->setTitle('titulo');
        $form = new FormBuilder(
            array(
                'title' => 'Registre-se',
                'action' => '.',
                'size' => 12,
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