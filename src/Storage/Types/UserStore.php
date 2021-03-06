<?php
/**
 * UserStore class.
 *
 * @package    Perspective
 * @subpackage API
 * @author     Squiz Pty Ltd <products@squiz.net>
 * @copyright  2019 Squiz Pty Ltd (ABN 77 084 670 600)
 */

namespace PerspectiveAPI\Storage\Types;

use \PerspectiveAPI\Storage\Types\Store as Store;

/**
 * UserStore Class.
 */
class UserStore extends Store
{


    /**
     * Creates a user and assign it to user groups. Returns created user object.
     *
     * @param string $username  The username of user.
     * @param string $firstName User first name.
     * @param string $lastName  User last name.
     * @param string $type      User type code.
     *                          TODO: this is a palceholder until user types are implemented.
     * @param array  $groups    Optional. Parent user groups to assign the new user to. If left empty, user will be
     *                          created under root user group.
     *
     * @return object
     */
    public function createUser(
        string $username,
        string $firstName,
        string $lastName,
        string $type=null,
        array $groups=[]
    ) {
        $id = \PerspectiveAPI\Connector::createUser($this->code, $username, $firstName, $lastName, $type, $groups);
        if ($id !== null) {
            return new \PerspectiveAPI\Objects\Types\User($this, $id, $username, $firstName, $lastName);
        }

        throw new \Exception('Failed to create a new user');

    }//end createUser()


    /**
     * Gets the user object.
     *
     * @param string $id The ID of the user.
     *
     * @return null|object
     */
    public function getUser(string $id)
    {
        $user = \PerspectiveAPI\Connector::getUser($this->code, $id);
        if ($user !== null) {
            return new \PerspectiveAPI\Objects\Types\User(
                $this,
                $user['id'],
                $user['username'],
                $user['firstName'],
                $user['lastName']
            );
        }

        return null;

    }//end getUser()


    /**
     * Gets the user type object by username.
     *
     * @param string $username The username of user.
     *
     * @return null|object
     * @throws InvalidDataException When username is empty.
     */
    public function getUserByUsername(string $username)
    {
        $user = \PerspectiveAPI\Connector::getUserByUsername($this->code, $username);
        if ($user !== null) {
            return new \PerspectiveAPI\Objects\Types\User(
                $this,
                $user['id'],
                $user['username'],
                $user['firstName'],
                $user['lastName']
            );
        }

        return null;

    }//end getUserByUsername()


    /**
     * Creates a user group and assign it to user groups. Returns created user group object.
     *
     * @param string $groupName The name of user group.
     * @param string $type      User type code.
     *                          TODO: this is a palceholder until user types are implemented.
     * @param array  $groups    Optional. Parent user groups to assign the new user to. If left empty, user will be
     *                          created under root user group.
     *
     * @return object
     */
    public function createGroup(
        string $groupName,
        string $type=null,
        array $groups=[]
    ) {
        $id = \PerspectiveAPI\Connector::createGroup($this->code, $groupName, $type, $groups);
        if ($id !== null) {
            return new \PerspectiveAPI\Objects\Types\Group($this, $id, $groupName);
        }

        throw new \Exception('Failed to create a new user group');

    }//end createUser()


    /**
     * Gets the user group object.
     *
     * @param string $id The ID of the group.
     *
     * @return null|object
     */
    public function getGroup(string $id)
    {
        $group = \PerspectiveAPI\Connector::getGroup($this->code, $id);
        if ($group !== null) {
            return new \PerspectiveAPI\Objects\Types\Group(
                $this,
                $group['id'],
                $group['groupName']
            );
        }

        return null;

    }//end getGroup()


}//end class
