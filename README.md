<h1>BluePrint3D - Admin Payment for Magento 2 💳</h1>

<p>
    <a href="#"><img src="https://img.shields.io/badge/Magento-2.4.x-orange.svg" alt="Magento Version" /></a>
    <a href="#"><img src="https://img.shields.io/badge/PHP-8.1%20|%208.2%20|%208.3-blue.svg" alt="PHP Version" /></a>
    <a href="#"><img src="https://img.shields.io/badge/License-Proprietary-lightgrey.svg" alt="License" /></a>
</p>

<p>A Magento 2 module that adds a payment method which only ever appears when an admin is placing or editing an order in the backend — it never shows up on the storefront, in the REST checkout API, or in GraphQL.</p>

<hr />

<h2>🛑 The Problem</h2>
<p>Sometimes store staff need to record an order as paid by a method that only makes sense internally — a bank transfer confirmed by phone, a card payment taken over the phone, a manual reconciliation — without exposing anything resembling it as a choice to customers at checkout. Repurposing a core payment method like Purchase Order for this risks confusing anyone genuinely using that method, and there's no built-in "admin only" payment option in Magento.</p>

<h2>🛠️ The Solution</h2>
<p>This module adds its own <strong>Admin Payment</strong> method, built on Magento's native <code>canUseCheckout</code> / <code>canUseInternal</code> distinction:</p>
<ul>
    <li>It reports itself as unavailable for storefront checkout, the REST checkout API, and GraphQL.</li>
    <li>It remains fully selectable when an admin creates or edits an order in <strong>Sales &gt; Orders</strong>.</li>
    <li>It doesn't touch or override any core payment method — existing methods like Purchase Order keep working exactly as before.</li>
</ul>

<h2>✨ Features</h2>
<ul>
    <li><strong>Admin-Only by Design:</strong> Uses Magento's own payment method flags rather than hiding a method with a plugin.</li>
    <li><strong>Optional Reference Field:</strong> A free-text "Transaction / Receipt Reference" field for accounting purposes — not required, not validated.</li>
    <li><strong>Visible on the Order:</strong> The reference (if entered) is shown in the Payment Information panel on both the admin order view and the customer's order view.</li>
    <li><strong>Zero Interference:</strong> Doesn't modify or plugin any core Magento payment method.</li>
</ul>

<hr />

<h2>📦 Installation</h2>

<p><strong>1. Install via Composer</strong></p>
<pre><code>composer require blueprint3d/module-admin-payment</code></pre>

<p><strong>2. Enable the module</strong></p>
<pre><code>php bin/magento module:enable BluePrint3D_AdminPayment</code></pre>

<p><strong>3. Run setup upgrade</strong></p>
<pre><code>php bin/magento setup:upgrade</code></pre>

<p><strong>4. Compile and flush cache</strong></p>
<pre><code>php bin/magento setup:di:compile
php bin/magento cache:flush</code></pre>

<hr />

<h2>👨‍💻 Usage</h2>
<p>Enable <strong>Admin Payment</strong> under <strong>Stores &gt; Configuration &gt; Sales &gt; Payment Methods</strong>. When creating or editing an order from the admin panel, select <strong>Admin Payment</strong> and optionally enter a reference. It will never appear as an option on the storefront.</p>

<hr />

<h2>📜 License</h2>
<p><strong>Copyright &copy; 2026 BluePrint3D Ltd. All rights reserved.</strong></p>

<p>This software is provided free of charge for personal or commercial use. However, the resale, redistribution, or sublicensing of this source code, modified or unmodified, for direct financial gain is strictly prohibited.</p>

<p>Please see the <code>LICENSE.txt</code> file for full terms and conditions.</p>

<p>
    <strong>Owned by:</strong> BluePrint3D Ltd (Company Registration Number: 13473806)<br />
    <strong>Email:</strong> <a href="mailto:support@blueprint3d.dev">support@blueprint3d.dev</a>
</p>
