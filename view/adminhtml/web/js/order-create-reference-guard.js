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

/**
 * Plain script, not RequireJS/AMD, loaded as a static file (not inline —
 * this install's CSP blocks inline scripts without a nonce).
 *
 * The admin order-create page reloads the "billing_method" area (the
 * Payment Method panel, despite the name) on actions unrelated to payment —
 * address edits, item/qty updates, coupon apply, choosing a shipping rate —
 * re-rendering our reference field from the last-saved (still empty) value
 * and silently wiping anything typed. Several of these reloads can overlap
 * (this legacy page reuses one loadingAreas property across concurrent
 * AJAX calls), so watching for a single DOM mutation missed some of them in
 * testing. Polling instead self-heals regardless of how or when the field
 * got wiped, and a deliberate clear by the admin is respected because
 * savedValue itself becomes empty the moment they clear the box.
 */
(function () {
    'use strict';

    var fieldId = 'admin_payment_reference',
        savedValue = '';

    document.addEventListener('input', function (event) {
        if (event.target && event.target.id === fieldId) {
            savedValue = event.target.value;
        }
    });

    setInterval(function () {
        var field;

        if (!savedValue) {
            return;
        }

        field = document.getElementById(fieldId);

        if (field && !field.value) {
            field.value = savedValue;
        }
    }, 400);
})();
