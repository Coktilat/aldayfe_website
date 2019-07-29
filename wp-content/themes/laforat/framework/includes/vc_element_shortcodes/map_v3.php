<?php
vc_map(array(
    "name" => 'Google Maps V3',
    "base" => "maps",
    "category" => __('laforat', 'laforat'),
	"icon" => "tb-icon-for-vc",
    "description" => __('Google Maps API V3', 'laforat'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __('API Key', 'laforat'),
            "param_name" => "api",
            "value" => '',
            "description" => __('Enter you api key of map, get key from (https://console.developers.google.com)', 'laforat')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Address', 'laforat'),
            "param_name" => "address",
            "value" => 'New York, United States',
            "description" => __('Enter address of Map', 'laforat')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Coordinate', 'laforat'),
            "param_name" => "coordinate",
            "value" => '',
            "description" => __('Enter coordinate of Map, format input (latitude, longitude)', 'laforat')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Click Show Info window', 'laforat'),
            "param_name" => "infoclick",
            "value" => array(
                __("Yes, please", 'laforat') => true
            ),
            "group" => __("Marker", 'laforat'),
            "description" => __('Click a marker and show info window (Default Show).', 'laforat')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Marker Coordinate', 'laforat'),
            "param_name" => "markercoordinate",
            "value" => '',
            "group" => __("Marker", 'laforat'),
            "description" => __('Enter marker coordinate of Map, format input (latitude, longitude)', 'laforat')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Marker Title', 'laforat'),
            "param_name" => "markertitle",
            "value" => '',
            "group" => __("Marker", 'laforat'),
            "description" => __('Enter Title Info windows for marker', 'laforat')
        ),
        array(
            "type" => "textarea",
            "heading" => __('Marker Description', 'laforat'),
            "param_name" => "markerdesc",
            "value" => '',
            "group" => __("Marker", 'laforat'),
            "description" => __('Enter Description Info windows for marker', 'laforat')
        ),
        array(
            "type" => "attach_image",
            "heading" => __('Marker Icon', 'laforat'),
            "param_name" => "markericon",
            "value" => '',
            "group" => __("Marker", 'laforat'),
            "description" => __('Select image icon for marker', 'laforat')
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => __('Marker List', 'laforat'),
            "param_name" => "markerlist",
            "value" => '',
            "group" => __("Multiple Marker", 'laforat'),
            "description" => __('[{"coordinate":"41.058846,-73.539423","icon":"","title":"title demo 1","desc":"desc demo 1"},{"coordinate":"40.975699,-73.717636","icon":"","title":"title demo 2","desc":"desc demo 2"},{"coordinate":"41.082606,-73.469718","icon":"","title":"title demo 3","desc":"desc demo 3"}]', 'laforat')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Info Window Max Width', 'laforat'),
            "param_name" => "infowidth",
            "value" => '200',
            "group" => __("Marker", 'laforat'),
            "description" => __('Set max width for info window', 'laforat')
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Map Type", 'laforat'),
            "param_name" => "type",
            "value" => array(
                "ROADMAP" => "ROADMAP",
                "HYBRID" => "HYBRID",
                "SATELLITE" => "SATELLITE",
                "TERRAIN" => "TERRAIN"
            ),
            "description" => __('Select the map type.', 'laforat')
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style Template", 'laforat'),
            "param_name" => "style",
            "value" => array(
                "Default" => "",
                "Subtle Grayscale" => "Subtle-Grayscale",
                "Shades of Grey" => "Shades-of-Grey",
                "Blue water" => "Blue-water",
                "Pale Dawn" => "Pale-Dawn",
                "Blue Essence" => "Blue-Essence",
                "Apple Maps-esque" => "Apple-Maps-esque",
            ),
            "group" => __("Map Style", 'laforat'),
            "description" => 'Select your heading size for title.'
        ),
        array(
            "type" => "textfield",
            "heading" => __('Zoom', 'laforat'),
            "param_name" => "zoom",
            "value" => '13',
            "description" => __('zoom level of map, default is 13', 'laforat')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Width', 'laforat'),
            "param_name" => "width",
            "value" => 'auto',
            "description" => __('Width of map without pixel, default is auto', 'laforat')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Height', 'laforat'),
            "param_name" => "height",
            "value" => '350px',
            "description" => __('Height of map without pixel, default is 350px', 'laforat')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Scroll Wheel', 'laforat'),
            "param_name" => "scrollwheel",
            "value" => array(
                __("Yes, please", 'laforat') => true
            ),
            "group" => __("Controls", 'laforat'),
            "description" => __('If false, disables scrollwheel zooming on the map. The scrollwheel is disable by default.', 'laforat')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Pan Control', 'laforat'),
            "param_name" => "pancontrol",
            "value" => array(
                __("Yes, please", 'laforat') => true
            ),
            "group" => __("Controls", 'laforat'),
            "description" => __('Show or hide Pan control.', 'laforat')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Zoom Control', 'laforat'),
            "param_name" => "zoomcontrol",
            "value" => array(
                __("Yes, please", 'laforat') => true
            ),
            "group" => __("Controls", 'laforat'),
            "description" => __('Show or hide Zoom Control.', 'laforat')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Scale Control', 'laforat'),
            "param_name" => "scalecontrol",
            "value" => array(
                __("Yes, please", 'laforat') => true
            ),
            "group" => __("Controls", 'laforat'),
            "description" => __('Show or hide Scale Control.', 'laforat')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Map Type Control', 'laforat'),
            "param_name" => "maptypecontrol",
            "value" => array(
                __("Yes, please", 'laforat') => true
            ),
            "group" => __("Controls", 'laforat'),
            "description" => __('Show or hide Map Type Control.', 'laforat')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Street View Control', 'laforat'),
            "param_name" => "streetviewcontrol",
            "value" => array(
                __("Yes, please", 'laforat') => true
            ),
            "group" => __("Controls", 'laforat'),
            "description" => __('Show or hide Street View Control.', 'laforat')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Over View Map Control', 'laforat'),
            "param_name" => "overviewmapcontrol",
            "value" => array(
                __("Yes, please", 'laforat') => true
            ),
            "group" => __("Controls", 'laforat'),
            "description" => __('Show or hide Over View Map Control.', 'laforat')
        )
    )
));