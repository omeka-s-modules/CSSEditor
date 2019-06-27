<?php

namespace CSSEditor\Form;

use Zend\Form\Form;

class CssForm extends Form
{
    public function init()
    {
        $this->add([
          'name' => 'css',
          'type' => 'Textarea'
        ]);
    }
}}