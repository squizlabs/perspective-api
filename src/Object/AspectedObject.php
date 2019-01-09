<?php
/**
 * Object base class.
 *
 * @package    Perspective
 * @subpackage API
 * @author     Squiz Pty Ltd <products@squiz.net>
 * @copyright  2019 Squiz Pty Ltd (ABN 77 084 670 600)
 */

namespace PerspectiveAPI\Object;

use \PerspectiveAPI\Object\Object as Object;

/**
 * DataRecord Class.
 */
abstract class AspectedObject extends Object
{


    /**
     * The aspect to query data record properties.
     *
     * @var array
     */
    protected $aspect = null;


    /**
     * Set aspect to query properties with.
     *
     * @param array $aspect The property aspect.
     *
     * @return void
     */
    abstract public function setAspect(array $aspect=null);


    /**
     * Get aspect to query properties with.
     *
     * @return array
     */
    abstract public function getAspect();


}//end class
