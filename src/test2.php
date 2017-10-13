<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @var string $strElementEdit */
/** @var string $strElementDelete */
/** @var array $arElementDeleteParams */
/** @var array $skuTemplate */
/** @var array $templateData */
global $APPLICATION;
?>
<section class="b-catalog">
    <div class="b-catalog__head">СКИДКА</div>
    <div class="b-catalog__inner">
        <div class="container-fluid">
            <div class="row">
                <? foreach ($arResult['ITEMS'] as $key => $arItem):
                    if($arItem[DISPLAY_PROPERTIES][DISCOUNT][VALUE] == 'Да'):
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
                        $strMainID = $this->GetEditAreaId($arItem['ID']);

                        $arItemIDs = array(
                            'ID' => $strMainID,
                            'PICT' => $strMainID . '_pict',
                            'SECOND_PICT' => $strMainID . '_secondpict',
                            'MAIN_PROPS' => $strMainID . '_main_props',

                            'QUANTITY' => $strMainID . '_quantity',
                            'QUANTITY_DOWN' => $strMainID . '_quant_down',
                            'QUANTITY_UP' => $strMainID . '_quant_up',
                            'QUANTITY_MEASURE' => $strMainID . '_quant_measure',
                            'BUY_LINK' => $strMainID . '_buy_link',
                            'BASKET_ACTIONS' => $strMainID . '_basket_actions',
                            'NOT_AVAILABLE_MESS' => $strMainID . '_not_avail',
                            'SUBSCRIBE_LINK' => $strMainID . '_subscribe',
                            'COMPARE_LINK' => $strMainID . '_compare_link',

                            'PRICE' => $strMainID . '_price',
                            'DSC_PERC' => $strMainID . '_dsc_perc',
                            'SECOND_DSC_PERC' => $strMainID . '_second_dsc_perc',

                            'PROP_DIV' => $strMainID . '_sku_tree',
                            'PROP' => $strMainID . '_prop_',
                            'DISPLAY_PROP_DIV' => $strMainID . '_sku_prop',
                            'BASKET_PROP_DIV' => $strMainID . '_basket_prop'
                        );

                        $strObName = 'ob' . preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
                        $productTitle = (
                        isset($arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']) && $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] != ''
                            ? $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
                            : $arItem['NAME']
                        );
                        $imgTitle = (
                        isset($arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']) && $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE'] != ''
                            ? $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']
                            : $arItem['NAME']
                        );

                        $minPrice = false;
                        if (isset($arItem['MIN_PRICE']) || isset($arItem['RATIO_PRICE']))
                            $minPrice = (isset($arItem['RATIO_PRICE']) ? $arItem['RATIO_PRICE'] : $arItem['MIN_PRICE']);
                        ?>

                        <div class="col-md-6 col-lg-4 col-sm-6 no-pad">
                            <div class="b-catalog__item" id="<?= $strMainID; ?>">
                                <div class="b-catalog__img">
                                    <img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" alt="<?= $imgTitle; ?>">
                                </div>
                                <div class="b-catalog__txt">
                                    <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" title="<?= $productTitle; ?>" class="b-catalog__name" style="display: block;"><?= $productTitle; ?></a>
                                    <div class="b-catalog__size"><?=$arItem['DISPLAY_PROPERTIES']['SIZE']['VALUE']?></div>
                                    <div class="b-catalog__city"><?=$arItem['DISPLAY_PROPERTIES']['COUNTRY']['VALUE']?></div>
                                    <div class="b-catalog__price" id="<?= $arItemIDs['PRICE']; ?>"><?=$arItem['DISPLAY_PROPERTIES']['PRICE']['VALUE']?> тенге/м2</div>
                                </div>
                            </div>
                        </div>
                    <?endif;?>
                <?endforeach;?>
                <?unset($arItem);?>
            </div>
        </div>
    </div>
</section>

<section class="b-catalog">
    <div class="b-catalog__head">НОВИНКИ</div>
    <div class="b-catalog__inner">
        <div class="container-fluid">
            <div class="row">
                <? foreach ($arResult['ITEMS'] as $key2 => $arItem2):
                    if($arItem2[DISPLAY_PROPERTIES][NEW][VALUE] == 'Да'):
                        $this->AddEditAction($arItem2['ID'], $arItem2['EDIT_LINK'], $strElementEdit);
                        $this->AddDeleteAction($arItem2['ID'], $arItem2['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
                        $strMainID = $this->GetEditAreaId($arItem2['ID']);

                        $arItem2IDs = array(
                            'ID' => $strMainID,
                            'PICT' => $strMainID . '_pict',
                            'SECOND_PICT' => $strMainID . '_secondpict',
                            'MAIN_PROPS' => $strMainID . '_main_props',

                            'QUANTITY' => $strMainID . '_quantity',
                            'QUANTITY_DOWN' => $strMainID . '_quant_down',
                            'QUANTITY_UP' => $strMainID . '_quant_up',
                            'QUANTITY_MEASURE' => $strMainID . '_quant_measure',
                            'BUY_LINK' => $strMainID . '_buy_link',
                            'BASKET_ACTIONS' => $strMainID . '_basket_actions',
                            'NOT_AVAILABLE_MESS' => $strMainID . '_not_avail',
                            'SUBSCRIBE_LINK' => $strMainID . '_subscribe',
                            'COMPARE_LINK' => $strMainID . '_compare_link',

                            'PRICE' => $strMainID . '_price',
                            'DSC_PERC' => $strMainID . '_dsc_perc',
                            'SECOND_DSC_PERC' => $strMainID . '_second_dsc_perc',

                            'PROP_DIV' => $strMainID . '_sku_tree',
                            'PROP' => $strMainID . '_prop_',
                            'DISPLAY_PROP_DIV' => $strMainID . '_sku_prop',
                            'BASKET_PROP_DIV' => $strMainID . '_basket_prop'
                        );

                        $strObName = 'ob' . preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
                        $productTitle = (
                        isset($arItem2['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']) && $arItem2['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] != ''
                            ? $arItem2['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
                            : $arItem2['NAME']
                        );
                        $imgTitle = (
                        isset($arItem2['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']) && $arItem2['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE'] != ''
                            ? $arItem2['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']
                            : $arItem2['NAME']
                        );

                        $minPrice = false;
                        if (isset($arItem2['MIN_PRICE']) || isset($arItem2['RATIO_PRICE']))
                            $minPrice = (isset($arItem2['RATIO_PRICE']) ? $arItem2['RATIO_PRICE'] : $arItem2['MIN_PRICE']);
                        ?>

                        <div class="col-md-6 col-lg-4 col-sm-6 no-pad">
                            <div class="b-catalog__item" id="<?= $strMainID; ?>">
                                <div class="b-catalog__img">
                                    <img src="<?= $arItem2['PREVIEW_PICTURE']['SRC']; ?>" alt="<?= $imgTitle; ?>">
                                </div>
                                <div class="b-catalog__txt">
                                    <a href="<?= $arItem2['DETAIL_PAGE_URL']; ?>" title="<?= $productTitle; ?>" class="b-catalog__name" style="display: block;"><?= $productTitle; ?></a>
                                    <div class="b-catalog__size"><?=$arItem2['DISPLAY_PROPERTIES']['SIZE']['VALUE']?></div>
                                    <div class="b-catalog__city"><?=$arItem2['DISPLAY_PROPERTIES']['COUNTRY']['VALUE']?></div>
                                    <div class="b-catalog__price" id="<?= $arItem2IDs['PRICE']; ?>"><?=$arItem2['DISPLAY_PROPERTIES']['PRICE']['VALUE']?> тенге/м2</div>
                                </div>
                            </div>
                        </div>
                    <?endif;?>
                <?endforeach;?>
            </div>
        </div>
    </div>
</section>

<section class="b-catalog">
    <div class="b-catalog__head">САМЫЕ ПОПУЛЯРНЫЕ</div>
    <div class="b-catalog__inner">
        <div class="container-fluid">
            <div class="row">
                <? foreach ($arResult['ITEMS'] as $key => $arItem3) {
                    $this->AddEditAction($arItem3['ID'], $arItem3['EDIT_LINK'], $strElementEdit);
                    $this->AddDeleteAction($arItem3['ID'], $arItem3['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
                    $strMainID = $this->GetEditAreaId($arItem3['ID']);

                    $arItem3IDs = array(
                        'ID' => $strMainID,
                        'PICT' => $strMainID . '_pict',
                        'SECOND_PICT' => $strMainID . '_secondpict',
                        'MAIN_PROPS' => $strMainID . '_main_props',

                        'QUANTITY' => $strMainID . '_quantity',
                        'QUANTITY_DOWN' => $strMainID . '_quant_down',
                        'QUANTITY_UP' => $strMainID . '_quant_up',
                        'QUANTITY_MEASURE' => $strMainID . '_quant_measure',
                        'BUY_LINK' => $strMainID . '_buy_link',
                        'BASKET_ACTIONS' => $strMainID . '_basket_actions',
                        'NOT_AVAILABLE_MESS' => $strMainID . '_not_avail',
                        'SUBSCRIBE_LINK' => $strMainID . '_subscribe',
                        'COMPARE_LINK' => $strMainID . '_compare_link',

                        'PRICE' => $strMainID . '_price',
                        'DSC_PERC' => $strMainID . '_dsc_perc',
                        'SECOND_DSC_PERC' => $strMainID . '_second_dsc_perc',

                        'PROP_DIV' => $strMainID . '_sku_tree',
                        'PROP' => $strMainID . '_prop_',
                        'DISPLAY_PROP_DIV' => $strMainID . '_sku_prop',
                        'BASKET_PROP_DIV' => $strMainID . '_basket_prop'
                    );

                    $strObName = 'ob' . preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
                    $productTitle = (
                    isset($arItem3['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']) && $arItem3['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] != ''
                        ? $arItem3['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
                        : $arItem3['NAME']
                    );
                    $imgTitle = (
                    isset($arItem3['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']) && $arItem3['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE'] != ''
                        ? $arItem3['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']
                        : $arItem3['NAME']
                    );

                    $minPrice = false;
                    if (isset($arItem3['MIN_PRICE']) || isset($arItem3['RATIO_PRICE']))
                        $minPrice = (isset($arItem3['RATIO_PRICE']) ? $arItem3['RATIO_PRICE'] : $arItem3['MIN_PRICE']);
                    ?>
                    <div class="col-md-6 col-lg-4 col-sm-6 no-pad">
                        <div class="b-catalog__item" id="<?= $strMainID; ?>">
                            <div class="b-catalog__img">
                                <img src="<?= $arItem3['PREVIEW_PICTURE']['SRC']; ?>" alt="<?= $imgTitle; ?>">
                            </div>
                            <div class="b-catalog__txt">
                                <a href="<?= $arItem3['DETAIL_PAGE_URL']; ?>" title="<?= $productTitle; ?>" class="b-catalog__name" style="display: block;"><?= $productTitle; ?></a>
                                <div class="b-catalog__size"><?=$arItem3['DISPLAY_PROPERTIES']['SIZE']['VALUE']?></div>
                                <div class="b-catalog__city"><?=$arItem3['DISPLAY_PROPERTIES']['COUNTRY']['VALUE']?></div>
                                <div class="b-catalog__price" id="<?= $arItem3IDs['PRICE']; ?>"><?=$arItem3['DISPLAY_PROPERTIES']['PRICE']['VALUE']?> тенге/м2</div>
                            </div>
                        </div>
                    </div>
                <?} ?>
            </div>
        </div>
    </div>
</section>