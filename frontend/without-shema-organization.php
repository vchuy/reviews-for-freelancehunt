<?php

$i = -1;
foreach ($json['data'] as $address) {
    if (++$i == 5) break;



    ?>

    <div  class="clearfix hreview  review review-positive progect-id-<?php echo $address['id'] . "\n"; ?>">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="clearfix item">
                        <div class="pull-right">
                            <abbr class="dtreviewed label label-default opacity-75"
                                  title="<?php echo date("Y-m-d H:m:s", strtotime($address['attributes']['published_at'] . "\n")); ?>"
                                  style="border: none;">

                                <?php echo date("Y.m.d", strtotime($address['attributes']['published_at'] . "\n")); ?></abbr>


                        </div>
                        <i class="fa fa-thumbs-up with-tooltip text-green" title=""></i>

                        <span  class="fn "><?php echo $address['attributes']['project']['name'] . "\n"; ?></span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-lg-push-8 col-sm-6 col-sm-push-6">
            <div class="row">
                <div class="col-md-12 text-right" style="padding-top: 10px; padding-left: 0;">
                    <?php if (!empty($address['attributes']['grades']['quality'])) { ?>
                        <div><span
                                class="label label-review color-dark-gray"><?php echo esc_attr_e('Quality', 'huntrewievs') ?></span>
                            <span class="nowrap text-green">
<?php if (($address['attributes']['grades']['quality'] . "\n") == 10) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 9) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 8) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 7) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 6) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 5) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 4) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 3) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 2) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['quality'] . "\n") == 1) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } ?></span></div>
                    <?php } ?>
                    <?php if (!empty($address['attributes']['grades']['professionalism'])) { ?>
                        <div><span
                                class="label label-review color-dark-gray"><?php echo esc_attr_e('Professionalism', 'huntrewievs') ?></span>
                            <span class="nowrap text-green">
<?php if (($address['attributes']['grades']['professionalism'] . "\n") == 10) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 9) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 8) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 7) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 6) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 5) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 4) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 3) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 2) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['professionalism'] . "\n") == 1) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } ?></span></div>
                    <?php } ?>

                    <?php if (!empty($address['attributes']['grades']['cost'])) { ?>
                        <div><span
                                class="label label-review color-dark-gray"><?php echo esc_attr_e('Cost', 'huntrewievs') ?></span>
                            <span class="nowrap text-green">
<?php if (($address['attributes']['grades']['cost'] . "\n") == 10) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 9) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 8) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 7) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 6) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 5) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 4) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 3) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 2) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['cost'] . "\n") == 1) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } ?></span></div>
                    <?php } ?>

                    <?php if (!empty($address['attributes']['grades']['connectivity'])) { ?>
                        <div><span
                                class="label label-review color-dark-gray"><?php echo esc_attr_e('Communication', 'huntrewievs') ?></span>
                            <span class="nowrap text-green">
<?php if (($address['attributes']['grades']['connectivity'] . "\n") == 10) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 9) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 8) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 7) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 6) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 5) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 4) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 3) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 2) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['connectivity'] . "\n") == 1) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } ?></span></div>
                    <?php } ?>

                    <?php if (!empty($address['attributes']['grades']['schedule'])) { ?>
                        <div><span
                                class="label label-review color-dark-gray"><?php echo esc_attr_e('Timing', 'huntrewievs') ?></span>
                            <span class="nowrap text-green">
<?php if (($address['attributes']['grades']['schedule'] . "\n") == 10) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 9) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 8) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 7) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 6) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 5) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 4) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 3) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 2) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i>
<?php } elseif (($address['attributes']['grades']['schedule'] . "\n") == 1) { ?>
    <i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
        class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
<?php } ?></span></div>
                    <?php } ?>

                </div>


            </div>
            <br>
        </div>
        <div class="col-lg-8 col-lg-pull-4 col-sm-6 col-sm-pull-6">
            <p class="linkify-marker"><?php echo $address['attributes']['comment'] . "\n"; ?></p>
            <p class="text-dark-gray profile-<?php echo $address['attributes']['from']['id'] . "\n"; ?>">


                <img width="25" height="25"
                     class="vertical avatar img-rounded avatar-<?php echo $address['attributes']['from']['id'] . "\n"; ?>"
                     alt="<?php echo $address['attributes']['from']['first_name'] . "\n" . $address['attributes']['from']['last_name'] . "\n"; ?>"
                     src="<?php echo $address['attributes']['from']['avatar']['small']['url'] . "\n"; ?>">

                <span class="reviewer">

<span  class="profile_id-<?php echo $address['attributes']['from']['id'] . "\n"; ?>"><?php echo $address['attributes']['from']['first_name'] . "\n";
    echo $address['attributes']['from']['last_name'] . "\n"; ?>     </span></span>


            </p>

        </div>


    </div>


    <?php



}
