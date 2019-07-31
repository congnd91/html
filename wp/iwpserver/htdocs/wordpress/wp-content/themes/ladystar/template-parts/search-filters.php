<?php
$filterStatus = $_SESSION['filterStatus'] ?? 0;
if ($filterStatus == 0) {
    $hideOrShow = 'display:none';
} else {
    $hideOrShow = 'display:block';
}

$service_categories = get_terms([
    'taxonomy' => 'service_categories',
    'hide_empty' => false,
]);

$services = get_terms([
    'taxonomy' => 'services',
    'hide_empty' => false,
]);

$locations = get_terms([
    'taxonomy' => 'locations',
    'hide_empty' => false
]);

$selected_category = $_GET['category'] ?? '';
$selected_location = $_GET['location'] ?? '';
$selected_price = $_GET['price'] ?? '';
$selected_age = $_GET['age'] ?? '';
$selected_weight = $_GET['weight'] ?? '';
$selected_hair = $_GET['hair'] ?? '';
$_GET['services'] = $_GET['services'] ?? '';
$selected_services = ($_GET['services'] != '')?explode(',', $_GET['services']):[];
?>

<section class="container search-filters">
    <form id="filter-models" action="#" class="sw_search_primary">
    <div class="sort-models-header">
        <header class="col-sm-12 col-md-12">

                <div class="row-NO-ROW">
                    <div class="col-md-2 filter-label nobg <?php if ($selected_category != '') { echo 'selected'; } ?>" data-key="category"><?php _e('CATEGORY', 'ladystar'); ?></div>
                    <div class="col-md-1 filter-label nobg <?php if ($selected_location != '') { echo 'selected'; } ?>" data-key="location"><?php _e('LOCATION', 'ladystar'); ?></div>
                    <div class="col-md-1 filter-label nobg <?php if ($selected_price != '') { echo 'selected'; } ?>" data-key="price"><?php _e('PRICE', 'ladystar'); ?></div>
                    <div class="col-md-1 filter-label nobg <?php if ($selected_age != '') { echo 'selected'; } ?>" data-key="age"><?php _e('AGE', 'ladystar'); ?></div>
                    <div class="col-md-1 filter-label nobg <?php if ($selected_weight != '') { echo 'selected'; } ?>" data-key="weight"><?php _e('WEIGHT', 'ladystar'); ?></div>
                    <div class="col-md-1 filter-label nobg <?php if ($selected_hair != '') { echo 'selected'; } ?>" data-key="hair"><?php _e('HAIR', 'ladystar'); ?></div>
                    <div class="col-md-4 filter-label nobg <?php if (!empty($selected_services)) { echo 'selected'; } ?>" data-key="services"><?php _e('SERVICES', 'ladystar'); ?></div>
                    <a href="<?php echo pll_get_page_url('ads'); ?>" class="filter-close"><?php _e('Close', 'ladystar');?></a>
                </div>

        </header>
        <div class="mobile-filter-header">
            <a href="#"><i class="fa fa-search"></i> <?php _e('SEARCH', 'ladystar'); ?></a>
        </div>
        <div class="filter-container">
            <div class="row">
                <div class="col-sm-12 col-md-2 fixedmargin">
                    <h4><?php _e('CATEGORY', 'ladystar'); ?></h4>
                    <div class="options">
                        <?php foreach ($service_categories as $key => $value): ?>
                        <div class="filter-entry <?php if ($value->term_id == $selected_category): ?>selected<?php endif; ?>"><a href="#" data-key="category" data-value="<?=$value->term_id;?>"><?=$value->name; ?></a></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-1 fixedmargin">
                    <h4><?php _e('LOCATION', 'ladystar'); ?></h4>
                    <div class="options">
                        <?php foreach ($locations as $key => $value): ?>
                            <div class="filter-entry <?php if ($value->term_id == $selected_location): ?>selected<?php endif; ?>"><a href="#" data-key="location" data-value="<?=$value->term_id;?>"><?=$value->name; ?></a></div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-sm-12 col-md-1 fixedmargin">
                    <h4><?php _e('PRICE', 'ladystar'); ?></h4>
                    <div class="options">
                        <div class="filter-entry <?php if ($selected_price == '80-120'): ?>selected<?php endif; ?>"><a href="#" data-key="price" data-value="80-120"><?php _e('80lv - 120lv', 'ladystar'); ?></a></div>
                        <div class="filter-entry <?php if ($selected_price == '120-200'): ?>selected<?php endif; ?>"><a href="#" data-key="price" data-value="120-200"><?php _e('120lv-200lv', 'ladystar'); ?></a></div>
                        <div class="filter-entry <?php if ($selected_price == '200-10000'): ?>selected<?php endif; ?>"><a href="#" data-key="price" data-value="200-10000"><?php _e('200lv+', 'ladystar'); ?></a></div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-1 fixedmargin">
                    <h4><?php _e('AGE', 'ladystar'); ?></h4>
                    <div class="options">
                        <div class="filter-entry <?php if ($selected_age == '18-20'): ?>selected<?php endif; ?>"><a href="#" data-key="age" data-value="18-20">18-20<?php _e('years old', 'ladystar'); ?></a></div>
                        <div class="filter-entry <?php if ($selected_age == '21-24'): ?>selected<?php endif; ?>"><a href="#" data-key="age" data-value="21-24">21-24<?php _e('years old', 'ladystar'); ?></a></div>
                        <div class="filter-entry <?php if ($selected_age == '25-30'): ?>selected<?php endif; ?>"><a href="#" data-key="age" data-value="25-30">25-30<?php _e('years old', 'ladystar'); ?></a></div>
                        <div class="filter-entry <?php if ($selected_age == '30-100'): ?>selected<?php endif; ?>"><a href="#" data-key="age" data-value="30-100">30<?php _e('years old', 'ladystar'); ?>+</a></div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-1 fixedmargin">
                    <h4><?php _e('WEIGHT', 'ladystar'); ?></h4>
                    <div class="options">
                        <div class="filter-entry <?php if ($selected_weight == '0-50'): ?>selected<?php endif; ?>"><a href="#" data-key="weight" data-value="0-50"><?php _e('Up to 50kg', 'ladystar'); ?></a></div>
                        <div class="filter-entry <?php if ($selected_weight == '50-60'): ?>selected<?php endif; ?>"><a href="#" data-key="weight" data-value="50-60"><?php _e('50kg - 60kg', 'ladystar'); ?></a></div>
                        <div class="filter-entry <?php if ($selected_weight == '60-200'): ?>selected<?php endif; ?>"><a href="#" data-key="weight" data-value="60-200"><?php _e('60+ kg', 'ladystar'); ?></a></div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-1 fixedmargin">
                    <h4><?php _e('HAIR', 'ladystar'); ?></h4>
                    <div class="options">
                        <div class="filter-entry <?php if ($selected_hair == 'red'): ?>selected<?php endif; ?>"><a href="#" data-key="hair" data-value="red"><?php _e('Red', 'ladystar'); ?></a></div>
                        <div class="filter-entry <?php if ($selected_hair == 'blonde'): ?>selected<?php endif; ?>"><a href="#" data-key="hair" data-value="blonde"><?php _e('Blonde', 'ladystar'); ?></a></div>
                        <div class="filter-entry <?php if ($selected_hair == 'brown'): ?>selected<?php endif; ?>"><a href="#" data-key="hair" data-value="brown"><?php _e('Brown', 'ladystar'); ?></a></div>
                        <div class="filter-entry <?php if ($selected_hair == 'black'): ?>selected<?php endif; ?>"><a href="#" data-key="hair" data-value="black"><?php _e('Black', 'ladystar'); ?></a></div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 fixedmargin">
                    <div class="options">
                        <div class="row">
                            <div class="col-md-6">
                                <?php for ($i=0;$i<ceil(count($services)/2);$i++): ?>
                                    <div class="filter-entry <?php if (in_array($services[$i]->term_id, $selected_services)):?>selected<?php endif;?>"><a href="#" data-key="services" data-value="<?=$services[$i]->term_id;?>"><?=$services[$i]->name; ?></a></div>
                                <?php endfor; ?>
                            </div>
                            <div class="col-md-6">
                                <?php for ($i=ceil(count($services)/2);$i<count($services);$i++): ?>
                                    <div class="filter-entry <?php if (in_array($services[$i]->term_id, $selected_services)):?>selected<?php endif;?>"><a href="#" data-key="services" data-value="<?=$services[$i]->term_id;?>"><?=$services[$i]->name; ?></a></div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <a href="/ads/" class="filter-reset"><?php _e('Reset', 'ladystar'); ?></a>
                </div>
            </div>
            <button class="filter-submit" type="button"><?php _e('SEARCH', 'ladystar'); ?></button>
        </div>

    </div>
    </form>
</section>