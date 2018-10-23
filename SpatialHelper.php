<?php
/**
 * MIT licence
 * Version 1.0.0
 * Sjaak Priester, Amsterdam 21-06-2014 ... 21-11-2015.
 *
 * ActiveRecord with spatial attributes in Yii 2.0 framework
 *
 * @link https://github.com/sjaakp/yii2-spatial
 */

namespace sjaakp\spatial;

/**
 * Class SpatialHelper
 * @package sjaakp\spatial
 *
 * Uses geoPHP to handle conversions. Previous code was
 * based on the older GeoJSON specification
 *
 * @link http://geojson.org/geojson-spec.html
 * @link http://dev.mysql.com/doc/refman/5.6/en/gis-data-formats.html#gis-wkt-format
 *
 */
use yii\helpers\Json;
use geoPHP;

abstract class SpatialHelper { // declare abstract, we don't want instances (trick from Zend)

    /**
     * @param $wkt
     * @return mixed
     */
    public static function wktToGeom($wkt)
    {
        $json = self::wktToJson();
        return json_decode($json);
    }

    /**
     * @param $geom
     * @return mixed
     */
    public static function geomToWkt($geom)
    {
        $json = json_encode($geom);
        return self::jsonToWkt($json);
    }

    /**
     * See:
     * https://github.com/phayes/geoPHP/wiki/Example-format-converter
     */

    /**
     * @param $wkt
     * @return mixed
     */
    public static function wktToJson($wkt)
    {
        $geom = geoPHP::load($wkt,'wkt');
        return $geom->out('json');
    }

    /**
     * @param $json
     * @return mixed
     */
    public static function jsonToWkt($json)
    {
        $geom = geoPHP::load($json,'json');
        return $geom->out('wkt');
    }

    /**
     * @param $wkt
     * @return mixed
     */
    public static function wktToKml($wkt)
    {
        $geom = geoPHP::load($wkt,'wkt');
        return $geom->out('kml');
    }

    /**
     * @param $wkt
     * @return mixed
     */
    public static function wktToAaddress($wkt)
    {
        $geom = geoPHP::load($wkt,'wkt');
        return $geom->out('google_geocode');
    }

    /**
     * @param $wkt
     * @return mixed
     */
    public static function wktToGpx($wkt)
    {
        $geom = geoPHP::load($wkt,'wkt');
        return $geom->out('gpx');
    }

    /**
     * @param $wkt
     * @return mixed
     */
    public static function wktToGeorss($wkt)
    {
        $geom = geoPHP::load($wkt,'wkt');
        return $geom->out('georss');
    }

    /**
     * @param $json
     * @return mixed
     */
    public static function jsonToKml($json) {
        $geom = geoPHP::load($json,'json');
        return $geom->out('kml');
    }

    /**
     * @param $json
     * @return mixed
     */
    public static function jsonToAddress($json)
    {
        $geom = geoPHP::load($json,'json');
        return $geom->out('google_geocode');
    }

    /**
     * @param $json
     * @return mixed
     */
    public static function jsonToGpx($json)
    {
        $geom = geoPHP::load($json,'json');
        return $geom->out('gpx');
    }

    /**
     * @param $wkt
     * @return mixed
     */
    public static function jsonToGeorss($wkt) {
        $geom = geoPHP::load($json,'json');
        return $geom->out('georss');
    }

    /**
     * @param $kml
     * @return mixed
     */
    public static function kmlToWkt($kml)
    {
        $geom = geoPHP::load($kml,'kml');
        return $geom->out('wkt');
    }

    /**
     * @param $kml
     * @return mixed
     */
    public static function kmlToJson($kml)
    {
        $geom = geoPHP::load($kml,'kml');
        return $geom->out('json');
    }

    /**
     * @param $kml
     * @return mixed
     */
    public static function kmlToAddress($kml)
    {
        $geom = geoPHP::load($kml,'kml');
        return $geom->out('google_geocode');
    }

    /**
     * @param $kml
     * @return mixed
     */
    public static function kmlToGpx($kml)
    {
        $geom = geoPHP::load($kml,'kml');
        return $geom->out('gpx');
    }

    /**
     * @param $kml
     * @return mixed
     */
    public static function kmlToGeorss($kml)
    {
        $geom = geoPHP::load($kml,'kml');
        return $geom->out('georss');
    }

    /**
     * @param $gpx
     * @return mixed
     */
    public static function gpxToWkt($gpx)
    {
        $geom = geoPHP::load($gpx,'gpx');
        return $geom->out('wkt');
    }

    /**
     * @param $gpx
     * @return mixed
     */
    public static function gpxToJson($gpx)
    {
        $geom = geoPHP::load($gpx,'gpx');
        return $geom->out('json');
    }

    /**
     * @param $gpx
     * @return mixed
     */
    public static function gpxToKml($gpx)
    {
        $geom = geoPHP::load($gpx,'gpx');
        return $geom->out('kml');
    }

    /**
     * @param $gpx
     * @return mixed
     */
    public static function gpxToGeorss($gpx)
    {
        $geom = geoPHP::load($gpx,'gpx');
        return $geom->out('georss');
    }

    /**
     * @param $gpx
     * @return mixed
     */
    public static function gpxToAddress($gpx)
    {
        $geom = geoPHP::load($gpx,'gpx');
        return $geom->out('google_geocode');
    }

    /**
     * @param $georss
     * @return mixed
     */
    public static function georssToWkt($georss)
    {
        $geom = geoPHP::load($georss,'georss');
        return $geom->out('wkt');
    }

    /**
     * @param $georss
     * @return mixed
     */
    public static function georssToJson($georss)
    {
        $geom = geoPHP::load($georss,'georss');
        return $geom->out('json');
    }

    /**
     * @param $georss
     * @return mixed
     */
    public static function georssToKml($georss)
    {
        $geom = geoPHP::load($georss,'georss');
        return $geom->out('kml');
    }

    /**
     * @param $georss
     * @return mixed
     */
    public static function georssToGpx($georss)
    {
        $geom = geoPHP::load($georss,'georss');
        return $geom->out('gpx');
    }

    /**
     * @param $georss
     * @return mixed
     */
    public static function georssToAddress($georss)
    {
        $geom = geoPHP::load($georss,'georss');
        return $geom->out('google_geocode');
    }

    /**
     * @param $address
     * @return mixed
     */
    public static function addressToWkt($address)
    {
        $geom = geoPHP::load($address,'google_geocode');
        return $geom->out('wkt');
    }

    /**
     * @param $address
     * @return mixed
     */
    public static function addressToJson($address)
    {
        $geom = geoPHP::load($address,'google_geocode');
        return $geom->out('json');
    }

    /**
     * @param $address
     * @return mixed
     */
    public static function addressToKml($address)
    {
        $geom = geoPHP::load($address,'google_geocode');
        return $geom->out('kml');
    }

    /**
     * @param $address
     * @return mixed
     */
    public static function addressToGpx($address)
    {
        $geom = geoPHP::load($address,'google_geocode');
        return $geom->out('gpx');
    }

    /**
     * @param $address
     * @return mixed
     */
    public static function addressToGeorss($address)
    {
        $geom = geoPHP::load($address,'google_geocode');
        return $geom->out('georss');
    }
}