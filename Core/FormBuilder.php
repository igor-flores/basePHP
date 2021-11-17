<?php

class FormBuilder
{
    private $title, $size = 12, $method = 'post', $inputs = array(array('type', 'title', 'id', 'name', 'value'));
    public $form = '';

    function __construct($form = array()) 
    {
        $this->setAttributes($form);   
        $this->constructForm();
    }

    private function setAttributes($form)
    {
        $this->title = (isset($form['title']) && !empty($form['title'])) ? $form['title'] : '';
        $this->inputs = $form['inputs'];
        $this->action = $form['action'];
        $this->size =    (isset($form['size'])   && !empty($form['size']))   ? $form['size']   :  12;
        $this->method =  (isset($form['method']) && !empty($form['method'])) ? $form['method'] : 'post';
        $this->enctype = isset($form['enctype']) ? true : false;
        $this->btnSave = (isset($form['btnSave'])) ? $form['btnSave'] : NULL;
    }

    private function constructForm()
    {
        $this->initForm();
        $this->generateInputs();
        $this->generateSaveButton();
        $this->endForm();
    }

    private function initForm()
    {
        $this->form = "
            <div class='col-lg-{$this->size} col-sm-12'>
                <h1 class=\"text-center\"> {$this->title} </h1>
        ";
        $this->form .= "<form method=\"{$this->method}\" ";
        if($this->enctype) {
            $this->form .= "enctype=\"multipart/form-data\">";
        } else {
            $this->form .= ">";
        }
    }

    private function generateInputs()
    {
        foreach($this->inputs as $input) {
            if(empty($input['id'])){
                $input['id'] = $input['name'];
            }

            if($input['type'] == 'select') {
                $this->generateSelect($input);
            } elseif($input['type'] == 'radio') {
                $this->generateRadio($input);
            } else {
                $this->form .= "
                        <label for=\"{$input['id']}\" class=\"form-label\"> {$input['title']} </label>
                        <input type=\"{$input['type']}\" name=\"{$input['name']}\" class=\"form form-control\" id=\"{$input['id']}\"> <br/> \n
                ";
            }
        }
    }

    private function generateSelect($select)
    {
        $this->form .= "
                <label for=\"{$select['id']}\" class=\"form-label\"> {$select['title']} </label>
                <select name=\"{$select['name']}\" class=\"form form-select\" id=\"{$select['id']}\"> \n
        ";

        foreach($select['options'] as $option) {
            $this->form .= "<option value=\"{$option['value']}\">{$option['title']}</option>";
        }

        $this->form .= "</select> <br/> \n";
    }

    private function generateRadio($radio)
    {
        $this->form .= "
            <label class=\"form-label\"> {$radio['title']} </label>
        ";

        foreach($radio['options'] as $option) {
            $this->form .= "
                <div class=\"form-check\">
                    <input class=\"form-check-input\" type=\"radio\" name=\"{$radio['name']}\" id=\"{$option['id']}\">
                    <label class=\"form-check-label\" for=\"{$option['id']}\">
                        {$option['title']}
                    </label>
                </div>
            ";    
        }
    }

    private function generateSaveButton()
    {
        if(!empty($this->btnSave)) {
            $this->form .= "<button type=\"submit\" ";
            if(isset($this->btnSave['class']) && !empty($this->btnSave['class'])) {
                $this->form .= "class=\"btn {$this->btnSave['class']}\">";
            } else {
                $this->form .= "class=\"btn btn-light\">";
            }

            if(isset($this->btnSave['title']) && !empty($this->btnSave['title'])) {
                $this->form .= $this->btnSave['title'];
            } else {
                $this->form .= "Salvar";
            }

            $this->form .= "</button>";
        } else {
            $this->form .= "
                <button type=\"submit\" class=\"btn btn-light\">
                    Salvar 
                </button>
            ";
        }
    }

    private function endForm()
    {
        $this->form .= "
                </form>
            </div>    
        ";
    }

    function getForm(){
        return $this->form;
    }
}