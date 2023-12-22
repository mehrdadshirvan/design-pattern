<?php

interface HtmlElement
{
    public function toHtml();

    public function getName();
}


class InputText implements HtmlElement
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function toHtml()
    {
        return "<input name='{$this->name}' />";
    }
}

abstract class HtmlDecorator implements HtmlElement
{
    protected $element;

    public function __construct(HtmlElement $htmlElement)
    {
        $this->element = $htmlElement;
    }

    abstract public function toHtml();

    public function getName()
    {
        return $this->element->getName();
    }

}


class LabelDecorator extends HtmlDecorator
{
    protected $label;

    public function setLabel($label)
    {
        $this->label = $label;
    }

    public function toHtml()
    {
        return "<label for='{$this->element->getName()}'>{$this->label}</label>" . $this->element->toHtml();
    }
}

class ErrorDecorator extends HtmlDecorator
{
    protected $error;

    public function setError($error)
    {
        $this->error = $error;
    }

    public function toHtml()
    {
        return $this->element->toHtml() . "<span>{$this->error}</span><br/>";
    }

}

$input = new InputText('first_name');
$input = new LabelDecorator($input);
$input->setLabel('First Name: ');
$input = new ErrorDecorator($input);
$input->setError('enter first name!');
echo $input->toHtml();
