<?php
/**
 * Reset Password HTML email template
 *
 * @var \App\View\AppView $this
 * @var string $first_name email recipient's first name
 * @var string $last_name email recipient's last name
 * @var string $email email recipient's email address
 * @var string $nonce nonce used to reset the password
 * @var string[] $globalContentImages //for content Images
 */
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tailor | Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <?= $this->Html->meta('icon') ?>

    <!-- CSS here -->
    <?= $this->Html->css('/vendor/bootstrap/css/bootstrap.min.css') ?>


</head>

<div class="content" style="margin-left: 100px; margin-top: 40px">
    <!-- START CENTERED WHITE CONTAINER -->
    <table role="presentation" class="main">
        <!-- START MAIN CONTENT AREA -->
        <tr>
            <td class="wrapper">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <?= $this->Html->image('/img/Gemino/logo/logo-color.png', ['alt' => "lifestyle logo"]) ?>
                            <br>
                            <h3 style="margin-top: 30px;">Account- Password Reset</h3>
                            <br>
                            <p>Hi <?= h($first_name) ?>, </p>
                            <p>Thank you for your request to reset the password of your account on <b>Gemino</b>. </p>
                            <p></p>
                            <p>To reset your account password, click on the button below to access the password reset page: </p>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                                <tbody>
                                <tr>
                                    <td align="left">
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                            <tr>
                                                <td><a style="color: white" href="<?= $this->Url->build(['controller' => 'Auth', 'action' => 'resetPassword', $nonce], ['class' => 'btn btn-b-n','fullBase' => true]) ?>" target="_blank">Reset account password</a></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <p style="margin-top: 30px">or click on the following link: <br><br>
                                <?= $this->Html->link($this->Url->build(['controller' => 'Auth', 'action' => 'resetPassword', $nonce], ['fullBase' => true, 'style' => 'word-break:break-all'])) ?></p>
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
                    <br>
                    This email is addressed to <?= $first_name ?>  <?= $last_name ?> &lt;<?= $email ?>&gt;<br>
                    Please discard this email if it not meant for you.
                    <br>
                    <br>
                    Copyright &copy; <?= date("Y"); ?> Gemino
                </td>
            </tr>
        </table>
    </div>
    <!-- END FOOTER -->
</div>
