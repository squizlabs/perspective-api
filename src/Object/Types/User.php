<?php
/**
 * User base class.
 *
 * @package    Perspective
 * @subpackage API
 * @author     Squiz Pty Ltd <products@squiz.net>
 * @copyright  2019 Squiz Pty Ltd (ABN 77 084 670 600)
 */

namespace PerspectiveAPI\Object\Types;

use \PerspectiveAPI\Object\Object as Object;
use \PerspectiveAPI\Object\ReferenceInterface as ReferenceInterface;

/**
 * User Class.
 */
abstract class User extends Object implements ReferenceInterface
{


    /**
     * Get username.
     *
     * @return string
     */
    abstract public function getUsername();


    /**
     * Get first name.
     *
     * @return string
     */
    abstract public function getFirstName();


    /**
     * Get last name.
     *
     * @return string
     */
    abstract public function getLastName();


    /**
     * Set first name
     *
     * @param string $firstName The first name of the user.
     *
     * @return void
     */
    abstract public function setFirstName(string $firstName);


    /**
     * Set last name
     *
     * @param string $lastName The last name of the user.
     *
     * @return void
     */
    abstract public function setLastName(string $lastName);


    /**
     * Assign an user to parent groups.
     *
     * @param mixed $groupid Parent user groups to assign the user to.
     *
     * @return void
     */
    abstract public function addToGroup($groupid);


    /**
     * Remove an user from specified parent groups.
     *
     * @param mixed $groupid Parent user groups to remove the user from.
     *
     * @return void
     */
    abstract public function removeFromGroup($groupid);


    /**
     * Returns all parent group entityids for a specified user.
     *
     * @return array
     */
    abstract public function getGroups();


}//end class
