<?php
/**
 * Group base class.
 *
 * @package    Perspective
 * @subpackage API
 * @author     Squiz Pty Ltd <products@squiz.net>
 * @copyright  2019 Squiz Pty Ltd (ABN 77 084 670 600)
 */

namespace PerspectiveAPI\Objects\Types;

use \PerspectiveAPI\Objects\AbstractObject as AbstractObject;
use \PerspectiveAPI\Objects\ReferenceTrait as ReferenceTrait;
use \PerspectiveAPI\Storage\Types\UserStore as UserStore;

/**
 * Group Class.
 */
class Group extends AbstractObject
{

    use ReferenceTrait;

    /**
     * The name of the group.
     *
     * @var string|null
     */
    protected $groupName = null;


    /**
     * Construct function for User Group.
     *
     * @param object $store     The store the user group record belongs to.
     * @param string $id        The id of the user group.
     * @param string $groupName Optional name of the group.
     *
     * @return void
     */
    public function __construct(UserStore $store, string $id, string $groupName=null)
    {
        $this->store = $store;
        $this->id    = $id;

        if ($groupName !== null) {
            $this->groupName = $groupName;
        }

    }//end __construct()


    /**
     * Returns all user entityids in a specified group.
     *
     * @return array
     */
    public function getMembers()
    {
        return \PerspectiveAPI\Connector::getGroupMembers($this->getID(), $this->store->getCode());

    }//end getMembers()


    /**
     * Gets the name of the user group.
     *
     * @return string
     */
    public function getName()
    {
        return $this->groupName;

    }//end getName()


    /**
     * Sets the name of the user group.
     *
     * @param string $name The name of the group.
     *
     * @return void
     */
    public function setName(string $name)
    {
        \PerspectiveAPI\Connector::setGroupName($this->getID(), $this->store->getCode(), $name);
        $this->groupName = $name;

    }//end setName()


}//end class
