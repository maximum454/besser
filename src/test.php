<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?IncludeTemplateLangFile(__FILE__);?>
<?
CModule::IncludeModule("iblock");
$db_props = CIBlockElement::GetProperty(1, 1, "sort", "asc", array());
$PROPS = array();
while($ar_props = $db_props->Fetch()) {
    $PROPS[$ar_props['CODE']] = $ar_props['VALUE'];
}
//print_r($PROPS);
$logo = CFile::GetPath($PROPS["LOGO"]);
$phone = $PROPS["PHONE"];
$email = $PROPS["EMAIL"];

$lat = $PROPS["LAT"];
$lng = $PROPS["LNG"];
$curPage = $APPLICATION->GetCurPage(false);
?>
<!doctype html>
<html lang="ru">
<head>
    <?$APPLICATION->ShowHead()?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?$APPLICATION->ShowTitle()?></title>
</head>
<body class="<? if ($curPage == '/'): ?>main-styler<?endif;?>">
<?$APPLICATION->ShowPanel();?>
<div class="wrp">
    <header class="b-header">
        <a href="<?=SITE_DIR?>" class="b-header__logo">
            <img src="<?=$logo?>" alt="Besser логотип">
        </a>

        <?$APPLICATION->IncludeComponent(
            "bitrix:menu",
            "main-menu-default",
            array(
                "ALLOW_MULTI_SELECT" => "N",
                "CHILD_MENU_TYPE" => "left",
                "DELAY" => "N",
                "MAX_LEVEL" => "1",
                "MENU_CACHE_GET_VARS" => array(
                ),
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "ROOT_MENU_TYPE" => "top",
                "USE_EXT" => "N",
                "COMPONENT_TEMPLATE" => "main-menu-default"
            ),
            false
        );?>

        <a href="#call" class="b-btn b-btn_header popap_box" data-body="call">Заказать звонок</a>
    </header>
    <div class="b-panel b-panel_inner">
        <ul class="b-panel__menu">
            <li class="b-panel__menu-item">
                <a href="/search/"><img src="<?=SITE_TEMPLATE_PATH?>/img/search-i.png" alt=""></a>
            </li>
            <li class="b-panel__menu-item">
                <a href="mailto:<?=$email?>"><img src="<?=SITE_TEMPLATE_PATH?>/img/email-i.png" alt=""></a>
            </li>
            <li class="b-panel__menu-item">
                <a href="/catalog/"><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-i.png" alt=""></a>
            </li>
        </ul>
    </div>

    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "page",
            "AREA_FILE_SUFFIX" => "slider",
            "EDIT_TEMPLATE" => ""
        )
    );?>
    <? if ($curPage == '/contacts/'): ?>
        <script>
            function initMap() {
                var uluru = {lat: <?=$lat?>, lng: <?=$lng?>};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    scrollwheel: true,
                    center: uluru,
                    styles: [
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#e9e9e9"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f5f5f5"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 29
                                },
                                {
                                    "weight": 0.2
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 18
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f5f5f5"
                                },
                                {
                                    "lightness": 21
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#dedede"
                                },
                                {
                                    "lightness": 21
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "visibility": "on"
                                },
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "saturation": 36
                                },
                                {
                                    "color": "#333333"
                                },
                                {
                                    "lightness": 40
                                }
                            ]
                        },
                        {
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f2f2f2"
                                },
                                {
                                    "lightness": 19
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#fefefe"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#fefefe"
                                },
                                {
                                    "lightness": 17
                                },
                                {
                                    "weight": 1.2
                                }
                            ]
                        }
                    ]
                });

                var image = '<?=SITE_TEMPLATE_PATH?>/img/ball.png'
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    icon: image,
                    anchor: new google.maps.Point(30, 30)
                });


                marker.addListener('click', function() {
                    if ($('#info-container').css('display') == 'block') {
                        $('#info-container').css('display', 'none');
                    } else {
                        $('#info-container').css('display', 'block');
                    }
                });





                google.maps.event.addDomListener(window, 'resize', function() {
                    map.setCenter(center);
                });
            };
        </script>
        <div id="map"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDuPrJY_idQHxGWfPmp4SQSAG6mWbJC-8&amp;callback=initMap"></script>
        <div id="info-container">
            <div class="container">
                <div class="cont-info">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/cont.jpg" alt="" class="img-responsive or-shadow">
                        </div>

                        <div class="col-md-6">
                            <div class="b-adr">
                                <div class="adr-elem">
                                    <div class="title loc-ico">НАШ АДРЕС</div>
                                    <div class="adr-elem-inner">
                                        <p>Республика Казахстан <br>
                                            010000, г. Астана <br>
                                            пр. Мәңгілік Ел, 23</p>
                                    </div>
                                </div>

                                <div class="adr-elem">
                                    <div class="title ph-ico">КОНТАКТНЫЕ ТЕЛЕФОНЫ</div>
                                    <div class="adr-elem-inner">
                                        <p>+7 702 611 11 35</p>
                                        <p>+7 777 772 17 71</p>
                                    </div>
                                </div>

                                <div class="adr-elem">
                                    <div class="title">МЫ В СОЦИАЛЬНЫХ СЕТЯХ</div>
                                    <div class="adr-elem-inner">
                                        <a href="#" class="s-link"><img src="img/fb.png" alt=""></a>
                                        <a href="#" class="s-link"><img src="img/inst.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?endif;?>

    <? if ( CSite::InDir('/catalog/')): ?>
    <?endif;?>

    <? if ($curPage !== '/contacts/' && $curPage !== '/'): ?>
    <div class="container">
        <div class="b-breadcrumb">
            <a class="b-breadcrumb__item" href="#"><?$APPLICATION->ShowTitle()?></a>
        </div>
        <div class="content-info">
    <?endif;?>

            #WORK_AREA#

    <? if ($curPage !== '/contacts/' && $curPage !== '/'): ?>
        </div>
    </div>
    <div class="wrp__buffer"></div>
    <?endif;?>
</div>
<footer class="b-footer b-footer_inner">
    <?$APPLICATION->IncludeComponent(
        "bitrix:menu",
        "main-menu-default",
        array(
            "ALLOW_MULTI_SELECT" => "N",
            "CHILD_MENU_TYPE" => "left",
            "DELAY" => "N",
            "MAX_LEVEL" => "1",
            "MENU_CACHE_GET_VARS" => array(
                0 => "bottom",
                1 => "",
            ),
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_TYPE" => "N",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "ROOT_MENU_TYPE" => "bottom",
            "USE_EXT" => "N",
            "COMPONENT_TEMPLATE" => "main-menu-default"
        ),
        false
    );?>

    <a href="/contacts/" class="b-btn b-btn_footer">КАРТА ПРОЕЗДА</a>
</footer>
<div class="hidden">
    <div id="modalbox_call" class="b-modal">
        <?$APPLICATION->IncludeComponent(
            "bitrix:iblock.element.add.form",
            "call",
            array(
                "CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
                "CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
                "CUSTOM_TITLE_DETAIL_PICTURE" => "",
                "CUSTOM_TITLE_DETAIL_TEXT" => "",
                "CUSTOM_TITLE_IBLOCK_SECTION" => "",
                "CUSTOM_TITLE_NAME" => "",
                "CUSTOM_TITLE_PREVIEW_PICTURE" => "",
                "CUSTOM_TITLE_PREVIEW_TEXT" => "",
                "CUSTOM_TITLE_TAGS" => "",
                "DEFAULT_INPUT_SIZE" => "30",
                "DETAIL_TEXT_USE_HTML_EDITOR" => "N",
                "ELEMENT_ASSOC" => "CREATED_BY",
                "GROUPS" => array(
                    0 => "2",
                ),
                "IBLOCK_ID" => "3",
                "IBLOCK_TYPE" => "content",
                "LEVEL_LAST" => "Y",
                "LIST_URL" => "",
                "MAX_FILE_SIZE" => "0",
                "MAX_LEVELS" => "100000",
                "MAX_USER_ENTRIES" => "100000",
                "PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
                "PROPERTY_CODES" => array(
                    0 => "5",
                    1 => "6",
                    2 => "NAME",
                ),
                "PROPERTY_CODES_REQUIRED" => array(
                    0 => "5",
                    1 => "NAME",
                ),
                "RESIZE_IMAGES" => "N",
                "SEF_MODE" => "N",
                "STATUS" => "ANY",
                "STATUS_NEW" => "N",
                "USER_MESSAGE_ADD" => "",
                "USER_MESSAGE_EDIT" => "",
                "USE_CAPTCHA" => "N",
                "COMPONENT_TEMPLATE" => "call"
            ),
            false
        );?>
    </div>
</div>

<?$APPLICATION->SetAdditionalCSS("/bitrix/templates/".SITE_TEMPLATE_ID."/css/main.css");?>
<?$APPLICATION->AddHeadScript("/bitrix/templates/".SITE_TEMPLATE_ID."/js/main.js");?>
</body>
</html>
