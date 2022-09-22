<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class TransactionDetails
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class TransactionDetails extends AbstractEntity
{
    /**
     * @var string
     */
    public $financial_institution;
}
