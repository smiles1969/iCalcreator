<?php
/**
 * iCalcreator, a PHP rfc2445/rfc5545 solution.
 *
 * @copyright 2007-2017 Kjell-Inge Gustafsson, kigkonsult, All rights reserved
 * @link      http://kigkonsult.se/iCalcreator/index.php
 * @package   iCalcreator
 * @version   2.23.7
 * @license   Part 1. This software is for
 *                    individual evaluation use and evaluation result use only;
 *                    non assignable, non-transferable, non-distributable,
 *                    non-commercial and non-public rights, use and result use.
 *            Part 2. Creative Commons
 *                    Attribution-NonCommercial-NoDerivatives 4.0 International License
 *                    (http://creativecommons.org/licenses/by-nc-nd/4.0/)
 *            In case of conflict, Part 1 supercede Part 2.
 *
 * This file is a part of iCalcreator.
 */
namespace kigkonsult\iCalcreator\traits;
use kigkonsult\iCalcreator\util\util;
/**
 * URL property functions
 *
 * @author Kjell-Inge Gustafsson, kigkonsult <ical@kigkonsult.se>
 * @since 2.22.23 - 2017-02-05
 */
trait URLtrait {
/**
 * @var array component property URL value
 * @access protected
 */
  protected $url = null;
/**
 * Return formatted output for calendar component property url
 *
 * @return string
 * @uses calendarComponent::getConfig()
 * @uses util::createElement()
 * @uses util::createParams()
 */
  public function createUrl() {
    if( empty( $this->url ))
      return null;
    if( empty( $this->url[util::$LCvalue] ))
      return ( $this->getConfig( util::$ALLOWEMPTY )) ? util::createElement( util::$URL ) : null;
    return util::createElement( util::$URL,
                                util::createParams( $this->url[util::$LCparams] ),
                                $this->url[util::$LCvalue] );
  }
/**
 * Set calendar component property url
 *
 * @param string  $value
 * @param array   $params
 * @return bool
 * @uses calendarComponent::getConfig()
 * @uses util::setParams()
 */
  public function setUrl( $value, $params=null ) {
    static $URN = 'urn';
    if( ! empty( $value )) {
      if( ! filter_var( $value, FILTER_VALIDATE_URL ) && ( $URN != strtolower( substr( $value, 0, 3 ))))
        return false;
    }
    elseif( $this->getConfig( util::$ALLOWEMPTY ))
      $value = util::$EMPTYPROPERTY;
    else
      return false;
    $this->url = array( util::$LCvalue  => $value,
                        util::$LCparams => util::setParams( $params ));
    return true;
  }
}
