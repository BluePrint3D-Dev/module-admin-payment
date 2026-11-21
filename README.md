# BluePrint3D – Admin Payment for Magento 2 💳

![Magento 2.4.x](https://img.shields.io/badge/Magento-2.4.x-orange.svg)
![PHP 8.1–8.5](https://img.shields.io/badge/PHP-8.1--8.5-blue.svg)
![Licence](https://img.shields.io/badge/Licence-Free_EULA-lightgrey.svg)

A payment method that only appears when an admin is placing or editing an order in the Magento backend. It never shows on the storefront, in the REST checkout API or in GraphQL.

---

## 🛑 The Problem
Staff sometimes need to record an order as paid by a method that only makes sense internally: a bank transfer confirmed by phone, a card taken over the phone, a manual reconciliation. Magento has no admin-only payment option, and repurposing a core method like Purchase Order confuses anyone genuinely using it.

## 🛠️ The Solution
This module adds its own **Admin Payment** method, built on Magento's native `canUseCheckout` / `canUseInternal` flags:

- Unavailable for storefront checkout, the REST checkout API and GraphQL.
- Fully selectable when an admin creates or edits an order in **Sales > Orders**.
- Doesn't touch or override any core payment method.

## ✨ Features
- **Admin-only by design:** uses Magento's own payment method flags rather than hiding a method with a plugin.
- **Optional reference field:** a free-text "Transaction / Receipt Reference" for accounting. Not required, not validated.
- **Visible on the order:** the reference shows in the Payment Information panel on the admin order view and the customer's order view.
- **Zero interference:** no changes or plugins on any core payment method.

---

## 📦 Installation

```bash
composer require blueprint3d/module-admin-payment
bin/magento module:enable BluePrint3D_AdminPayment
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento cache:flush
```

## ⚙️ Configuration
1. Go to **Stores > Configuration > Sales > Payment Methods** and enable **Admin Payment**.
2. When creating or editing an order in the admin, choose **Admin Payment** and optionally enter a reference.

---

## 📖 Documentation
Full setup guide: [`Admin Payment Setup Guide.pdf`](Admin%20Payment%20Setup%20Guide.pdf).

## 📜 Licence & Support
**Copyright © 2026 BluePrint3D Ltd. All rights reserved.**

Free to use on personal and commercial stores. Resale, redistribution or sublicensing of this source code, modified or unmodified, for direct financial gain is prohibited. Full terms in [`LICENSE.txt`](LICENSE.txt).

- **Website:** [blueprint3d.dev](https://www.blueprint3d.dev/modules/admin-payment)
- **Support:** [support@blueprint3d.dev](mailto:support@blueprint3d.dev)
- **Company:** BluePrint3D Ltd, Company No. 13473806
