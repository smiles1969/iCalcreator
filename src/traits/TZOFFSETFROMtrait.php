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
 * TZOFFSETFROM property functions
 *
 * @author Kjell-Inge Gustafsson, kigkonsult <ical@kigkonsult.se>
 * @since 2.22.23 - 2017-02-05
 */
trait TZOFFSETFROMtrait {
/**
 * @var array component property TZOFFSETFROM value
 * @access protected
 */
  protected $tzoffsetfrom = null;
/**
 * Return formatted output for calendar component property tzoffsetfrom
 *
 * @return string
 * @uses calendarComponent::getConfig()
 * @uses util::createElement()
 * @uses util::createParams()
 */
  public function createTzoffsetfrom() {
    if( empty( $this->tzoffsetfrom ))
      return null;
    if( empty( $this->tzoffsetfrom[util::$LCvalue] ))
      return ( $this->getConfig( util::$ALLOWEMPTY )) ? util::createElement( util::$TZOFFSETFROM ) : null;
    return util::createElement( util::$TZOFFSETFROM,
                                util::createParams( $this->tzoffsetfrom[util::$LCparams] ),
                                $this->tzoffsetfrom[util::$LCvalue] );
  }
/**
 * Set calendar component property tzoffsetfrom
 *
 * @param string  $value
 * @param array   $params
 * @return bool
 * @uses calendarComponent::getConfig()
 * @uses util::setParams()
 */
  public function setTzoffsetfrom( $value, $params=null ) {
    if( empty( $value )) {
      if( $this->getConfig( util::$ALLOWEMPTY ))
        $value = util::$EMPTYPROPERTY;
      else
        return false;
    }
    $this->tzoffsetfrom = array( util::$LCvalue  => $value,
                                 util::$LCparams => util::setParams( $params ));
    return true;
  }
}
