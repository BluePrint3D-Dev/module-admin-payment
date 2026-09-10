<?php
/**
 * Copyright (c) 2026 BluePrint3D Ltd. All rights reserved.
 *
 * This software is provided free of charge for personal or commercial use.
 * Resale, redistribution, or sublicensing of this source code, modified or
 * unmodified, for direct financial gain is strictly prohibited.
 *
 * @author    BluePrint3D Ltd <support@blueprint3d.dev>
 * @copyright 2026 BluePrint3D Ltd (Company No. 13473806)
 * @license   Custom Proprietary EULA (See LICENSE.txt)
 */

namespace BluePrint3D\AdminPayment\Block\Form;

class AdminPayment extends \Magento\Payment\Block\Form
{
    /**
     * @var string
     */
    protected $_template = 'BluePrint3D_AdminPayment::form/adminpayment.phtml';

    /**
     * Existing reference value, when editing an order that already has one.
     *
     * @return string
     */
    public function getReference()
    {
        return (string)$this->getMethod()->getInfoInstance()->getAdditionalInformation('reference');
    }
}
