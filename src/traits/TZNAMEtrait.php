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
 * TZNAME property functions
 *
 * @author Kjell-Inge Gustafsson, kigkonsult <ical@kigkonsult.se>
 * @since 2.22.23 - 2017-02-17
 */
trait TZNAMEtrait {
/**
 * @var array component property TZNAME value
 * @access protected
 */
  protected $tzname = null;
/**
 * Return formatted output for calendar component property tzname
 *
 * @return string
 * @uses util::createParams()
 * @uses util::createElement()
 * @uses util::strrep(
 * @uses calendarComponent::getConfig()
 */
  public function createTzname() {
    if( empty( $this->tzname ))
      return null;
    $output = null;
    $lang   = $this->getConfig( util::$LANGUAGE );
    foreach( $this->tzname as $tzx => $theName ) {
      if( ! empty( $theName[util::$LCvalue] ))
        $output .= util::createElement( util::$TZNAME,
                                        util::createParams( $theName[util::$LCparams],
                                                            array( util::$LANGUAGE ),
                                                            $lang ),
                                        util::strrep( $theName[util::$LCvalue] ));
      elseif( $this->getConfig( util::$ALLOWEMPTY ))
        $output .= util::createElement( util::$TZNAME );
    }
    return $output;
  }
/**
 * Set calendar component property tzname
 *
 * @param string   $value
 * @param array    $params
 * @param integer  $index
 * @return bool
 * @uses calendarComponent::getConfig()
 * @uses util::setMval()
 * @uses util::trimTrailNL()
 */
  public function setTzname( $value, $params=null, $index=null ) {
    if( empty( $value )) {
      if( $this->getConfig( util::$ALLOWEMPTY ))
        $value = util::$EMPTYPROPERTY;
      else
        return false;
    }
    util::setMval( $this->tzname,
                   util::trimTrailNL( $value ),
                   $params,
                   false,
                   $index );
    return true;
  }
}
