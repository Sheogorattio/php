<?php
    include_once("vendor/autoload.php");
    use App\Button;
    use App\Text;
    use App\Label;
    use App\Control;
    function convertToHTML(Control $control): string
    {
        if ($control instanceof Button) {
            return sprintf(
                '<button style="background: %s; width: %.2fpx; height: %.2fpx;" name="%s" value="%s" %s>%s</button>',
                $control->getBackground(),
                $control->getWidth(),
                $control->getHeight(),
                $control->getName(),
                $control->getValue(),
                $control->getSubmitState() ? 'type="submit"' : '',
                $control->getValue()
            );
        } elseif ($control instanceof Text) {
            return sprintf(
                '<input type="text" style="background: %s; width: %.2fpx; height: %.2fpx;" name="%s" value="%s" placeholder="%s">',
                $control->getBackground(),
                $control->getWidth(),
                $control->getHeight(),
                $control->getName(),
                $control->getValue(),
                $control->getPlaceholder()
            );
        } elseif ($control instanceof Label) {
            return sprintf(
                '<label style="background: %s; width: %.2fpx; height: %.2fpx;" for="%s">%s</label>',
                $control->getBackground(),
                $control->getWidth(),
                $control->getHeight(),
                $control->getParentName(),
                $control->getParentName()
            );
        }
        return '';
    }
?>

<?php

    $button = new Button('red', 100, 50, 'submitBtn', 'Button1', true);
    $text = new Text('white', 200, 30, 'Label1', '', 'text1');
    $label = new Label('orange', 150, 20, $text);

    echo convertToHTML($button)."<br/>";
    echo convertToHTML($text);
    echo convertToHTML($label);
?>
