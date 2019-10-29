<?php
declare(strict_types=1);

namespace ContactUs\Block;

use View\AbstractBlock;

class ContactForm extends AbstractBlock
{
    protected function getTemplate(): string
    {
        return './../templates/contact_us.phtml';
    }
}
