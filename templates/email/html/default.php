<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 * @var string $content
 */

$content_split = explode("\n", $content);
$body = '';

foreach ($content_split as $line) :
    $body .= '<p> ' . h($line) . "</p>\n";
endforeach;

?>
<div class="content">
    <!-- START CENTERED WHITE CONTAINER -->
    <table role="presentation" class="main">
        <!-- START MAIN CONTENT AREA -->
        <tr>
            <td class="wrapper">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <?= $body ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- END MAIN CONTENT AREA -->
    </table>
    <!-- END CENTERED WHITE CONTAINER -->
    <!-- START FOOTER -->
    <div class="footer">
        <table role="presentation" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td class="content-block">
                    Copyright &copy; <?= date("Y"); ?> Monash FIT Industry Experience
                    <br> Don't like these emails? <?= $this->Html->link('Unsubscribe', ['/'], ['fullBase' => true]) ?>.
                </td>
            </tr>
        </table>
    </div>
    <!-- END FOOTER -->
</div>
