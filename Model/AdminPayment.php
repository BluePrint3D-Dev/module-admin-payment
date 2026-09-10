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

namespace BluePrint3D\AdminPayment\Model;

use Magento\Framework\DataObject;
use Magento\Payment\Model\Method\AbstractMethod;

/**
 * @method \Magento\Quote\Api\Data\PaymentMethodExtensionInterface getExtensionAttributes()
 */
class AdminPayment extends AbstractMethod
{
    public const PAYMENT_METHOD_ADMIN_PAYMENT_CODE = 'blueprint3d_adminpayment';

    /**
     * @var string
     */
    protected $_code = self::PAYMENT_METHOD_ADMIN_PAYMENT_CODE;

    /**
     * @var string
     */
    protected $_formBlockType = \BluePrint3D\AdminPayment\Block\Form\AdminPayment::class;

    /**
     * @var string
     */
    protected $_infoBlockType = \BluePrint3D\AdminPayment\Block\Info\AdminPayment::class;

    /**
     * @var bool
     */
    protected $_isOffline = true;

    /**
     * Never selectable on the storefront, in the REST checkout API, or in GraphQL.
     *
     * @var bool
     */
    protected $_canUseCheckout = false;

    /**
     * Selectable when creating or editing an order from the admin panel.
     *
     * @var bool
     */
    protected $_canUseInternal = true;

    /**
     * Reads the reference posted under additional_data and stores it on the payment.
     *
     * @param DataObject $data
     * @return $this
     */
    public function assignData(DataObject $data)
    {
        parent::assignData($data);

        // Magento\Quote\Model\Quote\Payment::convertPaymentData() only keeps
        // 'method', 'po_number', 'additional_data' and 'checks' as top-level keys —
        // any other posted payment[] field (ours included) ends up nested under
        // additional_data, not as a direct property on $data.
        $additionalData = (array)$data->getAdditionalData();
        if (isset($additionalData['reference'])) {
            $this->getInfoInstance()->setAdditionalInformation('reference', $additionalData['reference']);
        }

        return $this;
    }
}
